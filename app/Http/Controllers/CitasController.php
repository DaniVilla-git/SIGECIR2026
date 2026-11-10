<?php

namespace App\Http\Controllers;

use App\Models\citas;
use App\Models\usuarios;
use App\Models\profesionales;
use App\Models\servicios;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class CitasController extends Controller
{
    // HORARIOS PERMITIDOS
    private function horariosPermitidos()
    {
        return [
            '08:00', '08:30',
            '09:00', '09:30',
            '10:00', '10:30',
            '11:00', '11:30',
            '14:00', '14:30',
            '15:00', '15:30',
            '16:00', '16:30',
            '17:00', '17:30',
        ];
    }

    // LISTAR CITAS
    public function index()
    {
        $citas = citas::with([
            'usuario',
            'profesional',
            'servicio'
        ])->get();

        return view('citas.index', compact('citas'));
    }

    // FORMULARIO CREAR
    public function create()
    {
        $usuarios = usuarios::all();
        $profesionales = profesionales::all();
        $servicios = servicios::all();

        return view('citas.create', compact(
            'usuarios',
            'profesionales',
            'servicios'
        ));
    }

    // GUARDAR CITA
    public function store(Request $request)
    {
        $datos = $request->validate([
            'modalidad_cita' => 'required|string|max:255',
            'consultorio' => 'required|string|max:255',
            'fecha_cita' => 'required|date_format:Y-m-d',
            'hora_inicio' => [
                'required',
                'date_format:H:i',
                Rule::in($this->horariosPermitidos())
            ],
            'estado_cita' => 'required|string|max:255',
            'observaciones_cita' => 'nullable|string',
            'fecha_creacion_cita' => 'required|date',
            'id_usuario' => 'required|exists:usuarios,id',
            'id_profesional' => 'required|exists:profesionales,id',
            'id_servicios' => 'required|exists:servicios,id',
        ]);

        // CALCULAR HORA DE FINALIZACIÓN
        $datos['hora_fin'] = Carbon::createFromFormat(
            'H:i',
            $datos['hora_inicio']
        )->addMinutes(30)->format('H:i');

        // VERIFICAR SI EL HORARIO ESTÁ OCUPADO
        if ($datos['estado_cita'] != 'Cancelada') {

            $ocupada = citas::whereDate('fecha_cita', $datos['fecha_cita'])
                ->where('id_servicios', $datos['id_servicios'])
                ->where('estado_cita', '!=', 'Cancelada')
                ->where('hora_inicio', '<', $datos['hora_fin'])
                ->where('hora_fin', '>', $datos['hora_inicio'])
                ->exists();

            if ($ocupada) {
                return back()
                    ->withErrors([
                        'hora_inicio' => 'Este horario ya está ocupado para el servicio seleccionado.'
                    ])
                    ->withInput();
            }
        }

        // GUARDAR CITA
        $cita = citas::create($datos);

        // ENVIAR CORREO SEGÚN EL ESTADO
        $this->enviarCorreoEstado($cita);

        return redirect()
            ->route('citas.index')
            ->with('success', 'Cita creada correctamente.');
    }

    // MOSTRAR CITA
    public function show(citas $citas)
    {
        $citas->load([
            'usuario',
            'profesional',
            'servicio'
        ]);

        return view('citas.show', compact('citas'));
    }

    // FORMULARIO EDITAR
    public function edit(int $id)
    {
        $citas = citas::findOrFail($id);

        $usuarios = usuarios::all();
        $profesionales = profesionales::all();
        $servicios = servicios::all();

        return view('citas.update', compact(
            'citas',
            'usuarios',
            'profesionales',
            'servicios'
        ));
    }

    // ACTUALIZAR CITA
    public function update(Request $request, int $id)
    {
        $cita = citas::findOrFail($id);

        $datos = $request->validate([
            'modalidad_cita' => 'required|string|max:255',
            'consultorio' => 'required|string|max:255',
            'fecha_cita' => 'required|date_format:Y-m-d',
            'hora_inicio' => [
                'required',
                'date_format:H:i',
                Rule::in($this->horariosPermitidos())
            ],
            'estado_cita' => 'required|string|max:255',
            'observaciones_cita' => 'nullable|string',
            'fecha_creacion_cita' => 'required|date',
            'id_usuario' => 'required|exists:usuarios,id',
            'id_profesional' => 'required|exists:profesionales,id',
            'id_servicios' => 'required|exists:servicios,id',
        ]);

        // CALCULAR HORA DE FINALIZACIÓN
        $datos['hora_fin'] = Carbon::createFromFormat(
            'H:i',
            $datos['hora_inicio']
        )->addMinutes(30)->format('H:i');

        // VERIFICAR DISPONIBILIDAD, EXCLUYENDO LA CITA ACTUAL
        if ($datos['estado_cita'] != 'Cancelada') {

            $ocupada = citas::whereDate('fecha_cita', $datos['fecha_cita'])
                ->where('id_servicios', $datos['id_servicios'])
                ->where('estado_cita', '!=', 'Cancelada')
                ->where('id', '!=', $cita->id)
                ->where('hora_inicio', '<', $datos['hora_fin'])
                ->where('hora_fin', '>', $datos['hora_inicio'])
                ->exists();

            if ($ocupada) {
                return back()
                    ->withErrors([
                        'hora_inicio' => 'Este horario ya está ocupado para el servicio seleccionado.'
                    ])
                    ->withInput();
            }
        }

        // GUARDAR EL ESTADO ANTERIOR
        $estadoAnterior = $cita->estado_cita;

        // ACTUALIZAR CITA
        $cita->update($datos);

        // ENVIAR CORREO SOLAMENTE SI CAMBIÓ EL ESTADO
        if ($estadoAnterior != $cita->estado_cita) {
            $this->enviarCorreoEstado($cita);
        }

        return redirect()
            ->route('citas.index')
            ->with('actualizar', 'Cita actualizada correctamente.');
    }

    // ENVIAR CORREO SEGÚN EL ESTADO DE LA CITA
    private function enviarCorreoEstado(citas $cita)
    {
        $cita->load('usuario');

        if (!$cita->usuario || empty($cita->usuario->correo_usuario)) {
            return;
        }

        $nombre = $cita->usuario->primer_nombre . ' ' .
                  $cita->usuario->primer_apellido;

        $fecha = Carbon::parse($cita->fecha_cita)->format('d/m/Y');

        $mensaje = '';
        $asunto = '';

        switch ($cita->estado_cita) {

            case 'Pendiente':

                $asunto = 'Tu cita está pendiente - RENUEVA IPS';

                // CREAR ENLACE TEMPORAL PARA CONFIRMAR
                $enlace = URL::temporarySignedRoute(
                    'citas.confirmar.formulario',
                    now()->addHours(48),
                    ['id' => $cita->id]
                );

                $mensaje = "Hola {$nombre}.\n\n" .
                    "Tu cita en RENUEVA IPS ha sido registrada y se encuentra PENDIENTE.\n\n" .
                    "Detalles de tu cita:\n" .
                    "Fecha: {$fecha}\n" .
                    "Hora: {$cita->hora_inicio} a {$cita->hora_fin}\n" .
                    "Modalidad: {$cita->modalidad_cita}\n" .
                    "Consultorio: {$cita->consultorio}\n\n" .
                    "Para confirmar tu asistencia, ingresa al siguiente enlace:\n\n" .
                    "{$enlace}\n\n" .
                    "Este enlace estará disponible durante 48 horas.\n\n" .
                    "Gracias por confiar en RENUEVA IPS.\n" .
                    "Equipo SIGECIR";

                break;

            case 'Confirmada':

                $asunto = 'Tu cita ha sido confirmada - RENUEVA IPS';

                $mensaje = "Hola {$nombre}.\n\n" .
                    "¡Tu cita en RENUEVA IPS ha sido CONFIRMADA!\n\n" .
                    "Fecha: {$fecha}\n" .
                    "Hora: {$cita->hora_inicio} a {$cita->hora_fin}\n" .
                    "Modalidad: {$cita->modalidad_cita}\n" .
                    "Consultorio: {$cita->consultorio}\n\n" .
                    "Te esperamos. Recuerda asistir puntualmente.\n\n" .
                    "Gracias por confiar en nosotros.\n" .
                    "Equipo SIGECIR";

                break;

            case 'Atendida':

                $asunto = 'Información sobre tu cita - RENUEVA IPS';

                $mensaje = "Hola {$nombre}.\n\n" .
                    "Te informamos que tu cita en RENUEVA IPS ha sido registrada como ATENDIDA.\n\n" .
                    "Agradecemos tu asistencia y la confianza depositada en nuestros servicios.\n\n" .
                    "¡Estamos para cuidar de ti!\n" .
                    "Equipo SIGECIR";

                break;

            case 'Cancelada':

                $asunto = 'Tu cita ha sido cancelada - RENUEVA IPS';

                $mensaje = "Hola {$nombre}.\n\n" .
                    "Te informamos que tu cita en RENUEVA IPS ha sido CANCELADA.\n\n" .
                    "Fecha de la cita: {$fecha}\n" .
                    "Si deseas recibir atención, puedes solicitar una nueva cita.\n\n" .
                    "Gracias por tu comprensión.\n" .
                    "Equipo SIGECIR";

                break;

            case 'Inasistencia':

                $asunto = 'Notificación de inasistencia - RENUEVA IPS';

                $mensaje = "Hola {$nombre}.\n\n" .
                    "Te informamos que tu cita ha sido registrada con estado INASISTENCIA, debido a que no se registró tu asistencia.\n\n" .
                    "Si necesitas continuar con tu atención, puedes solicitar una nueva cita.\n\n" .
                    "Gracias por tu comprensión.\n" .
                    "Equipo SIGECIR";

                break;

            default:
                return;
        }

        // ENVIAR CORREO
        Mail::raw($mensaje, function ($message) use ($cita, $asunto) {

            $message->to($cita->usuario->correo_usuario)
                ->subject($asunto);

        });
    }

    // MOSTRAR PÁGINA DE CONFIRMACIÓN DESDE EL CORREO
    public function mostrarConfirmacion($id)
    {
        $cita = citas::with([
            'usuario',
            'profesional',
            'servicio'
        ])->findOrFail($id);

        return view('citas.confirmar-correo', compact('cita'));
    }

    // CONFIRMAR CITA DESDE EL CORREO
    
    public function confirmarDesdeCorreo(Request $request, $id)
    {
        $cita = citas::findOrFail($id);

        // CARGAR RELACIONES
        $cita->load([
            'usuario',
            'profesional',
            'servicio'
        ]);

        // CANCELAR CITA DESDE EL CORREO
        if ($request->accion == 'cancelar') {

            if (!in_array($cita->estado_cita, ['Pendiente', 'Confirmada'])) {

                return view('citas.confirmar-correo', compact('cita'))
                    ->with('error', 'Esta cita no se puede cancelar. Su estado actual es: ' . $cita->estado_cita);
            }

            // CAMBIAR ESTADO
            $cita->estado_cita = 'Cancelada';
            $cita->save();

            // ENVIAR CORREO DE ACTUALIZACIÓN
            $this->enviarCorreoEstado($cita);

            return view('citas.confirmar-correo', compact('cita'))
                ->with('mensaje', 'Tu cita ha sido cancelada correctamente.');
        }

        // VERIFICAR QUE LA CITA SIGA PENDIENTE
        if ($cita->estado_cita != 'Pendiente') {

            return view('citas.confirmar-correo', compact('cita'))
                ->with('mensaje', 'Esta cita ya no se encuentra pendiente. Su estado actual es: ' . $cita->estado_cita);
        }

        // CAMBIAR ESTADO A CONFIRMADA
        $cita->estado_cita = 'Confirmada';
        $cita->save();

        // ENVIAR CORREO DE CONFIRMACIÓN
        $this->enviarCorreoEstado($cita);

        // MOSTRAR RESULTADO
        return view('citas.confirmar-correo', compact('cita'))
            ->with('mensaje', '¡Tu cita ha sido confirmada correctamente!');
    }


    // ELIMINAR CITA
    public function destroy($id)
    {
        try {
            $cita = citas::findOrFail($id);

            $cita->delete();

            return redirect()
                ->route('citas.index')
                ->with('success', 'Cita eliminada correctamente.');

        } catch (\Exception $e) {

            return redirect()
                ->route('citas.index')
                ->with('error', 'No se pudo eliminar la cita: ' . $e->getMessage());
        }
    }

    // CONSULTAR DISPONIBILIDAD
    public function disponibilidad(Request $request)
    {
        $request->validate([
            'mes' => 'required|date_format:Y-m',
            'id_servicios' => 'required|exists:servicios,id',
            'fecha' => 'nullable|date_format:Y-m-d',
            'id_cita' => 'nullable|integer|exists:citas,id',
        ]);

        $inicio = Carbon::createFromFormat('Y-m', $request->mes)
            ->startOfMonth();

        $fin = $inicio->copy()->endOfMonth();

        $horarios = $this->horariosPermitidos();

        // FECHAS COMPLETAMENTE OCUPADAS
        $fechasOcupadas = citas::select('fecha_cita')
            ->whereBetween('fecha_cita', [
                $inicio->format('Y-m-d'),
                $fin->format('Y-m-d')
            ])
            ->where('id_servicios', $request->id_servicios)
            ->where('estado_cita', '!=', 'Cancelada')
            ->whereIn('hora_inicio', $horarios)

            // EXCLUIR LA CITA QUE SE ESTÁ EDITANDO
            ->when($request->filled('id_cita'), function ($consulta) use ($request) {
                $consulta->where('id', '!=', $request->id_cita);
            })

            ->groupBy('fecha_cita')
            ->havingRaw('COUNT(DISTINCT hora_inicio) >= 16')
            ->pluck('fecha_cita')
            ->map(function ($fecha) {
                return Carbon::parse($fecha)->format('Y-m-d');
            })
            ->toArray();

        // HORARIOS OCUPADOS DE LA FECHA SELECCIONADA
        $horasOcupadas = [];

        if ($request->filled('fecha')) {

            $horasOcupadas = citas::whereDate(
                    'fecha_cita',
                    $request->fecha
                )
                ->where('id_servicios', $request->id_servicios)
                ->where('estado_cita', '!=', 'Cancelada')

                // EXCLUIR LA CITA ACTUAL AL EDITAR
                ->when($request->filled('id_cita'), function ($consulta) use ($request) {
                    $consulta->where('id', '!=', $request->id_cita);
                })

                ->pluck('hora_inicio')
                ->map(function ($hora) {
                    return substr($hora, 0, 5);
                })
                ->toArray();
        }

        return response()->json([
            'fechas_ocupadas' => $fechasOcupadas,
            'horas_ocupadas' => $horasOcupadas
        ]);
    }
}
