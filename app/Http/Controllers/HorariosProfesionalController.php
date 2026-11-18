<?php

namespace App\Http\Controllers;

use App\Http\Requests\Horario_ProfesionalRequest;
use App\Services\horario_profesionalService;
use App\Services\ProfesionalService;
use App\Models\horarios_profesional;
use App\Models\citas;
use App\Models\profesionales;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HorariosProfesionalController extends Controller
{
    private horario_profesionalService $Horario_profesionalService;

    private ProfesionalService $profesionalservice;

    public function __construct(
        horario_profesionalService $Horario_profesionalService,
        ProfesionalService $profesionalservice
    ) {
        $this->Horario_profesionalService = $Horario_profesionalService;
        $this->profesionalservice = $profesionalservice;
    }

    public function index(Request $request)
    {
        // Listado de profesionales para el filtro
        $profesionales = $this->profesionalservice->listartodo();

        // Mes seleccionado
        $mes = $request->input('mes', now()->format('Y-m'));

        try {
            $fechaMes = Carbon::createFromFormat('Y-m', $mes)->startOfMonth();
        } catch (\Exception $e) {
            $fechaMes = now()->startOfMonth();
            $mes = $fechaMes->format('Y-m');
        }

        // Profesional seleccionado
        $idProfesional = $request->input('profesional');

        // Fecha seleccionada
        $fechaSeleccionada = $request->input(
            'fecha',
            $fechaMes->format('Y-m-d')
        );

        // Fechas que ocupa el calendario
        $inicioCalendario = $fechaMes->copy()
            ->startOfWeek(Carbon::MONDAY);

        $finCalendario = $fechaMes->copy()
            ->endOfMonth()
            ->endOfWeek(Carbon::SUNDAY);

        $calendario = collect();

        // Consultar horarios y citas únicamente si hay profesional seleccionado
        if ($idProfesional) {

            $horarios = horarios_profesional::where(
                'id_profesional',
                $idProfesional
            )
            ->whereBetween('dia_semana', [
                $inicioCalendario->format('Y-m-d'),
                $finCalendario->format('Y-m-d')
            ])
            ->get()
            ->groupBy(function ($horario) {
                return Carbon::parse($horario->dia_semana)->format('Y-m-d');
            });

            $citas = citas::where('id_profesional', $idProfesional)
                ->whereBetween('fecha_cita', [
                    $inicioCalendario->format('Y-m-d'),
                    $finCalendario->format('Y-m-d')
                ])
                ->whereRaw("LOWER(TRIM(estado_cita)) != ?", ['cancelada'])
                ->get()
                ->groupBy(function ($cita) {
                    return Carbon::parse($cita->fecha_cita)->format('Y-m-d');
                });

            // Construir los días del calendario
            $fechaActual = $inicioCalendario->copy();

            while ($fechaActual->lte($finCalendario)) {

                $fecha = $fechaActual->format('Y-m-d');

                $horariosDia = $horarios->get($fecha, collect());
                $citasDia = $citas->get($fecha, collect());

                if ($horariosDia->isEmpty()) {
                    $estado = 'sin_horario';
                } elseif ($citasDia->isNotEmpty()) {
                    $estado = 'ocupado';
                } else {
                    $estado = 'disponible';
                }

                $calendario->push([
                    'fecha' => $fecha,
                    'numero' => $fechaActual->day,
                    'es_mes_actual' => $fechaActual->month === $fechaMes->month,
                    'estado' => $estado,
                    'horarios' => $horariosDia,
                    'citas' => $citasDia
                ]);

                $fechaActual->addDay();
            }
        }

        // Información del día seleccionado
        $horariosSeleccionados = collect();
        $citasSeleccionadas = collect();

        if ($idProfesional && $fechaSeleccionada) {

            $horariosSeleccionados = horarios_profesional::where(
                'id_profesional',
                $idProfesional
            )
            ->whereDate('dia_semana', $fechaSeleccionada)
            ->get();

            $citasSeleccionadas = citas::where(
                'id_profesional',
                $idProfesional
            )
            ->whereDate('fecha_cita', $fechaSeleccionada)
            ->whereRaw("LOWER(TRIM(estado_cita)) != ?", ['cancelada'])
            ->orderBy('hora_inicio')
            ->get();
        }

        return view('Horario_profesional.index', compact(
            'profesionales',
            'idProfesional',
            'mes',
            'fechaMes',
            'fechaSeleccionada',
            'calendario',
            'horariosSeleccionados',
            'citasSeleccionadas'
        ));
    }

    public function create()
    {
        $profesionales = $this->profesionalservice->listartodo();

        return view('Horario_profesional.create', compact('profesionales'));
    }

    public function store(Horario_ProfesionalRequest $request)
    {
        $datos = $request->validated();

        $this->Horario_profesionalService->guardar($datos);

        return redirect()
            ->route('horario_profesional.index')
            ->with('success', 'Horario profesional registrado correctamente.');
    }

    public function show()
    {
        //
    }

    public function edit(int $id)
    {
        $horario_profesional = $this->Horario_profesionalService->edit($id);

        $profesionales = $this->profesionalservice->listartodo();

        return view(
            'Horario_profesional.update',
            compact('horario_profesional', 'profesionales')
        );
    }

    public function update(int $id, Horario_ProfesionalRequest $request)
    {
        $datos = $request->validated();

        $this->Horario_profesionalService->actualizar($id, $datos);

        return redirect()
            ->route('horario_profesional.index')
            ->with('actualizar', 'Horario profesional actualizado correctamente.');
    }

    public function destroy(int $id)
    {
        $this->Horario_profesionalService->eliminar($id);

        return redirect()
            ->route('horario_profesional.index')
            ->with('eliminar', 'Horario profesional eliminado correctamente.');
    }
} 
