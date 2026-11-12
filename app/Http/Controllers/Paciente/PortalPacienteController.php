<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use App\Models\citas;
use App\Models\servicios;
use App\Models\documentos;
use App\Models\usuarios;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class PortalPacienteController extends Controller
{
    // PORTAL PRINCIPAL
    public function index(Request $request)
    {
        abort_unless($request->user()->hasRole('Paciente'), 403);

        return view('paciente.inicio');
    }

    // CONSULTAR MIS CITAS
    public function misCitas(Request $request)
    {
        abort_unless($request->user()->hasRole('Paciente'), 403);

        $idUsuario = $request->user()->id_usuario;

        $citas = citas::with([
            'usuario',
            'profesional',
            'servicio'
        ])
        ->where('id_usuario', $idUsuario)
        ->orderByDesc('fecha_cita')
        ->get();

        // CONSULTAR DOCUMENTOS DE LAS CITAS DEL PACIENTE
        $documentos = documentos::where('id_usuario', $idUsuario)
            ->whereIn('id_cita', $citas->pluck('id'))
            ->get()
            ->groupBy('id_cita');

        // ASOCIAR DOCUMENTOS A CADA CITA
        foreach ($citas as $cita) {
            $cita->setRelation(
                'documentos',
                $documentos->get($cita->id, collect())
            );
        }

        return view('paciente.mis-citas', compact('citas'));
    }

    // MOSTRAR FORMULARIO PARA SOLICITAR CITA
    public function crearCita(Request $request)
    {
        abort_unless($request->user()->hasRole('Paciente'), 403);

        $servicios = servicios::with('profesionales')
            ->orderBy('nombre_servicio')
            ->get();

        return view('paciente.solicitar-cita', compact('servicios'));
    }

    // GUARDAR SOLICITUD DE CITA
    public function guardarCita(Request $request)
    {
        abort_unless($request->user()->hasRole('Paciente'), 403);

        // VALIDAR DATOS
        $datos = $request->validate([

            'id_servicios' => [
                'required',
                'exists:servicios,id'
            ],

            'modalidad_cita' => [
                'required',
                Rule::in(['Presencial', 'Virtual'])
            ],

            'fecha_cita' => [
                'required',
                'date',
                'after_or_equal:today'
            ],

            'hora_inicio' => [
                'required',
                Rule::in([
                    '08:00', '08:30',
                    '09:00', '09:30',
                    '10:00', '10:30',
                    '11:00', '11:30',
                    '14:00', '14:30',
                    '15:00', '15:30',
                    '16:00', '16:30',
                    '17:00', '17:30'
                ])
            ],

            'observaciones_cita' => [
                'nullable',
                'string'
            ],

            'orden_medica' => [
                'required',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:10240'
            ],

        ]);

        // BUSCAR EL SERVICIO Y SU PROFESIONAL
        $servicio = servicios::with('profesionales')
            ->findOrFail($datos['id_servicios']);

        $profesional = $servicio->profesionales;

        if (!$profesional) {
            return back()
                ->withInput()
                ->withErrors([
                    'id_servicios' => 'El servicio seleccionado no tiene un profesional asignado.'
                ]);
        }

        // CALCULAR HORA FINAL
        $horaInicio = $datos['hora_inicio'];

        $horaFin = date(
            'H:i',
            strtotime($horaInicio . ' +30 minutes')
        );

        // COMPROBAR DISPONIBILIDAD DEL PROFESIONAL
        $ocupada = citas::where('id_profesional', $profesional->id)
            ->where('fecha_cita', $datos['fecha_cita'])
            ->whereNotIn('estado_cita', ['Cancelada'])
            ->where('hora_inicio', '<', $horaFin)
            ->where('hora_fin', '>', $horaInicio)
            ->exists();

        if ($ocupada) {
            return back()
                ->withInput()
                ->withErrors([
                    'hora_inicio' => 'El horario seleccionado ya está ocupado. Por favor, seleccione otro.'
                ]);
        }

        // OBTENER EL PACIENTE AUTENTICADO
        $idUsuario = $request->user()->id_usuario;

        if (!$idUsuario) {
            abort(403, 'La cuenta no tiene un paciente asociado.');
        }

        // CREAR LA CITA
        $cita = new citas();

        $cita->modalidad_cita = $datos['modalidad_cita'];
        $cita->consultorio = $profesional->consultorio;
        $cita->fecha_cita = $datos['fecha_cita'];
        $cita->hora_inicio = $horaInicio;
        $cita->hora_fin = $horaFin;
        $cita->estado_cita = 'Pendiente';
        $cita->observaciones_cita = $datos['observaciones_cita'] ?? null;
        $cita->fecha_creacion_cita = now()->toDateString();
        $cita->id_usuario = $idUsuario;
        $cita->id_profesional = $profesional->id;
        $cita->id_servicios = $servicio->id;

        // GUARDAR LA CITA Y LA ORDEN MÉDICA
        DB::transaction(function () use ($cita, $request, $idUsuario) {

            $cita->save();

            if ($request->hasFile('orden_medica')) {

                $archivo = $request->file('orden_medica');

                $ruta = $archivo->store('documentos', 'public');

                // REGISTRAR EL DOCUMENTO
                $documento = new documentos();

                $documento->nombre_documento = 'Orden médica';
                $documento->tipo_documento = 'Orden médica';
                $documento->ruta_documento = $ruta;
                $documento->fecha_documento = now()->toDateString();
                $documento->estado_documento = 'Pendiente';
                $documento->observacion_documento = 'Orden médica adjuntada al solicitar la cita.';
                $documento->id_usuario = $idUsuario;
                $documento->id_cita = $cita->id;

                $documento->save();
            }

        });

        // REDIRECCIONAR A MIS CITAS
        return redirect()
            ->route('paciente.mis-citas')
            ->with('success', 'Tu solicitud de cita fue registrada correctamente. Está pendiente de aprobación.');
    }

    // VISUALIZAR DOCUMENTO DEL PACIENTE
    public function verDocumento(Request $request, $id)
    {
        abort_unless($request->user()->hasRole('Paciente'), 403);

        $idUsuario = $request->user()->id_usuario;

        // BUSCAR ÚNICAMENTE DOCUMENTOS DEL PACIENTE
        $documento = documentos::where('id', $id)
            ->where('id_usuario', $idUsuario)
            ->firstOrFail();

        // VERIFICAR QUE LA CITA TAMBIÉN SEA DEL PACIENTE
        $cita = citas::where('id', $documento->id_cita)
            ->where('id_usuario', $idUsuario)
            ->firstOrFail();

        $ruta = storage_path('app/public/' . $documento->ruta_documento);

        abort_unless(file_exists($ruta), 404, 'El archivo no está disponible.');

        return response()->file($ruta);
    }

    // MOSTRAR FORMULARIO DE MIS DATOS
    public function editarPerfil(Request $request)
    {
        abort_unless($request->user()->hasRole('Paciente'), 403);

        $idUsuario = $request->user()->id_usuario;

        if (!$idUsuario) {
            abort(403, 'La cuenta no tiene un paciente asociado.');
        }

        $paciente = usuarios::findOrFail($idUsuario);

        return view('Paciente.editar-perfil', compact('paciente'));
    }

    // ACTUALIZAR CORREO Y TELÉFONO
    // ACTUALIZAR CORREO Y TELÉFONO
    public function actualizarPerfil(Request $request)
    {
        abort_unless($request->user()->hasRole('Paciente'), 403);

        $idUsuario = $request->user()->id_usuario;

        if (!$idUsuario) {
            abort(403, 'La cuenta no tiene un paciente asociado.');
        }

        $paciente = usuarios::findOrFail($idUsuario);

        $datos = $request->validate([
            'correo_usuario' => [
                'required',
                'email',
                'max:255',
                Rule::unique('usuarios', 'correo_usuario')
                    ->ignore($paciente->id, 'id')
            ],

            'telefono_usuario' => [
                'required',
                'string',
                'max:20'
            ],
        ]);

        // ACTUALIZAR SOLAMENTE CORREO Y TELÉFONO
        $paciente->correo_usuario = $datos['correo_usuario'];
        $paciente->telefono_usuario = $datos['telefono_usuario'];

        $paciente->save();

        return redirect()
            ->route('paciente.paciente.perfil.edit')
            ->with('success', 'Tus datos de contacto fueron actualizados correctamente.');
    }
}

