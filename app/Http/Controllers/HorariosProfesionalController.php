<?php

namespace App\Http\Controllers;

use App\Models\horarios_profesional;
use App\Services\Horario_profesionalService;
use Illuminate\Http\Request;

class HorariosProfesionalController extends Controller
{
    private Horario_profesionalService $Horario_profesionalService;

    public function __construct(Horario_profesionalService $Horario_profesionalService)
    {
        $this->Horario_profesionalService = $Horario_profesionalService;
    }

    public function index()
    {
        $horario_profesional = $this->Horario_profesionalService->listartodo();
        return view('Horario_profesional.index', compact('horario_profesional'));
    }


    public function create()
    {
        $horario_profesional = $this->Horario_profesionalService->listartodo();
        return view('Horario_profesional.create', compact('horario_profesional'));
    }


    public function store(Request $request)
    {
        $this->Horario_profesionalService->guardar($request->all());
        return redirect()->route('horario_profesional.index');
    }


    public function show()
    {
        //
    }


    public function edit(int $id)
    {
        $horario_profesional = $this->Horario_profesionalService->edit($id);
        return view('Horario_profesional.update', compact('horario_profesional'));
    }


    public function update($id, Request $request)
    {
        $horario_profesional = $this->Horario_profesionalService->actualizar($id, $request->all());
        return redirect()->route('profesionales.index')->with('se creo el producto');
    }


    public function destroy(int $id)
    {
        $this->Horario_profesionalService->eliminar($id);
        return redirect()->route('profesionales.index');
    }
}