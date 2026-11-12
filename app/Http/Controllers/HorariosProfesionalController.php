<?php

namespace App\Http\Controllers;

use App\Http\Requests\Horario_ProfesionalRequest;
use App\Services\horario_profesionalService;
use App\Services\ProfesionalService;

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

    public function index()
    {
        $horario_profesional = $this->Horario_profesionalService->listartodo();

        return view('Horario_profesional.index', compact('horario_profesional'));
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
