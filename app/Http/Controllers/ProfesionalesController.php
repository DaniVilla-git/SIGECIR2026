<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfesionalRequest;
use App\Models\citas;
use App\Models\profesionales;
use App\Models\horarios_profesional;
use App\Models\documentos;
use App\Services\ProfesionalService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfesionalesController extends Controller
{
    private ProfesionalService $profesionalservice;

    public function __construct(ProfesionalService $profesionalservice)
    {
        $this->profesionalservice = $profesionalservice;
    }

    public function index()
    {
        $profesionales = $this->profesionalservice->listartodo();
        return view('Profesionales.index', compact('profesionales'));
    }

    public function create()
    {
        $profesionales = $this->profesionalservice->listartodo();
        return view('Profesionales.create', compact('profesionales'));
    }

    public function store(ProfesionalRequest $request)
    {
        $datos = $request->validated();

        if ($request->hasFile('firma')) {

            $nombreFirma = time() . '_' . $request->file('firma')->getClientOriginalName();

            $request->file('firma')->move(
                public_path('firmas'),
                $nombreFirma
            );

            $datos['firma'] = 'firmas/' . $nombreFirma;
        }

        $this->profesionalservice->guardar($datos);

        return redirect()
            ->route('profesionales.index')
            ->with('success', 'Profesional y cuenta de acceso creados correctamente.');
    }

    public function show()
    {
        //
    }

    public function edit(int $id)
    {
        $profesionales = $this->profesionalservice->edit($id);
        return view('Profesionales.update', compact('profesionales'));
    }

    public function update($id, Request $request)
    {
        $profesionales = $this->profesionalservice->actualizar($id, $request->all());
        return redirect()->route('profesionales.index')->with('se creo el producto');
    }

    public function destroy(int $id)
    {
        try {

            $this->profesionalservice->eliminar($id);

            return redirect()
                ->route('profesionales.index')
                ->with('success', 'Profesional eliminado correctamente.');

        } catch (QueryException $e) {

            $codigoError = $e->errorInfo[1] ?? null;

            // Error cuando existen registros relacionados
            if (in_array($codigoError, [1451, 1217])) {

                return redirect()
                    ->route('profesionales.index')
                    ->with('error', 'No se puede eliminar este profesional porque tiene citas, horarios u otra información relacionada en el sistema.');
            }

            throw $e;
        }
    }

    // DASHBOARD DEL PROFESIONAL
    public function dashboard()
    {
        $profesional = profesionales::where('id_user', auth()->id())
            ->firstOrFail();

        $consultaCitas = citas::where('id_profesional', $profesional->id);

        $citasHoy = (clone $consultaCitas)
            ->whereDate('fecha_cita', today())
            ->count();

        $pendientes = (clone $consultaCitas)
            ->whereIn('estado_cita', ['Pendiente', 'pendiente'])
            ->count();

        $atendidas = (clone $consultaCitas)
            ->whereIn('estado_cita', ['Atendida', 'atendida'])
            ->count();

        $canceladas = (clone $consultaCitas)
            ->whereIn('estado_cita', ['Cancelada', 'cancelada'])
            ->count();

        $citas = citas::with(['usuario', 'servicio'])
            ->where('id_profesional', $profesional->id)
            ->whereDate('fecha_cita', today())
            ->orderBy('hora_inicio', 'asc')
            ->get();

        return view('Profesionales.dashboard', compact(
            'profesional',
            'citas',
            'citasHoy',
            'pendientes',
            'atendidas',
            'canceladas'
        ));
    }

    // PACIENTES DEL PROFESIONAL
    public function pacientes()
    {
        $profesional = profesionales::where('id_user', auth()->id())
            ->firstOrFail();

        $citas = citas::with([
            'usuario',
            'servicio',
            'documentos'
        ])
            ->where('id_profesional', $profesional->id)
            ->whereHas('usuario')
            ->orderByDesc('fecha_cita')
            ->get();

        return view('Profesionales.pacientes', compact('citas'));
    }

    // VER DOCUMENTO ADJUNTO DEL PACIENTE
    public function verDocumento($id)
    {
        $profesional = profesionales::where('id_user', auth()->id())
            ->firstOrFail();

        $documento = documentos::where('id', $id)
            ->whereHas('cita', function ($consulta) use ($profesional) {
                $consulta->where('id_profesional', $profesional->id);
            })
            ->firstOrFail();

        abort_unless(
            Storage::disk('public')->exists($documento->ruta_documento),
            404,
            'El documento no está disponible.'
        );

        return Storage::disk('public')->response(
            $documento->ruta_documento
        );
    }

    // AGENDA DEL PROFESIONAL
    public function agenda()
    {
        $profesional = profesionales::where('id_user', auth()->id())
            ->firstOrFail();

        $citas = citas::with(['usuario', 'servicio'])
            ->where('id_profesional', $profesional->id)
            ->orderBy('fecha_cita', 'desc')
            ->orderBy('hora_inicio', 'asc')
            ->get();

        return view('Profesionales.agenda', compact('citas'));
    }

    // NOTIFICACIONES DEL PROFESIONAL
    public function notificaciones()
    {
        $profesional = profesionales::where('id_user', auth()->id())
            ->firstOrFail();

        $notificaciones = $profesional->notificaciones()
            ->orderBy('notificacion_profesional.created_at', 'desc')
            ->get();

        return view('Profesionales.notificaciones', compact(
            'profesional',
            'notificaciones'
        ));
    }

    // HORARIO DEL PROFESIONAL
    public function horario()
    {
        // Buscar el profesional que inició sesión
        $profesional = profesionales::where('id_user', auth()->id())
            ->firstOrFail();

        // Consultar los horarios asignados por el administrador
        $horarios = horarios_profesional::where(
            'id_profesional',
            $profesional->id
        )
        ->orderByRaw("
            CASE LOWER(dia_semana)
                WHEN 'lunes' THEN 1
                WHEN 'martes' THEN 2
                WHEN 'miércoles' THEN 3
                WHEN 'miercoles' THEN 3
                WHEN 'jueves' THEN 4
                WHEN 'viernes' THEN 5
                WHEN 'sábado' THEN 6
                WHEN 'sabado' THEN 6
                WHEN 'domingo' THEN 7
                ELSE 8
            END
        ")
        ->orderBy('hora_inicio')
        ->get();

        return view('Profesionales.horario', compact(
            'profesional',
            'horarios'
        ));
    }
}
