<?php

namespace App\Http\Controllers;

use App\Http\Requests\Horario_profesionalRequest;
use App\Models\horarios_profesional;
<<<<<<< HEAD
use App\Services\Horario_profesionalService;
=======
use App\Services\horario_profesionalService;
use App\Services\ProfesionalService;
>>>>>>> Dev2-A
use Illuminate\Http\Request;

class HorariosProfesionalController extends Controller
{
    private Horario_profesionalService $Horario_profesionalService;
    private ProfesionalService $profesionalservice;

    public function __construct(Horario_profesionalService $Horario_profesionalService, ProfesionalService $profesionalservice)
    {
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

    public function store(Horario_profesionalRequest $request)
    {
        $this->Horario_profesionalService->guardar($request->validated());
        return redirect()->route('horario_profesional.index');
    }

    public function show()
    {
        //
    }

    public function edit(int $id)
    {
        $horario_profesional = $this->Horario_profesionalService->edit($id);
        $profesionales = $this->profesionalservice->listartodo();
        return view('Horario_profesional.update', compact('horario_profesional', 'profesionales'));
    }

    public function update(int $id, Horario_profesionalRequest $request)
    {
        $this->Horario_profesionalService->actualizar($id, $request->all());
        return redirect()->route('horario_profesional.index');
    }

    public function destroy(int $id)
    {
        $this->Horario_profesionalService->eliminar($id);
        return redirect()->route('horario_profesional.index');
    }
}