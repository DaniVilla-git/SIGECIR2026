<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiciosRequest;
use App\Services\ProfesionalService;
use App\Services\ServiciosService;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{

    private ServiciosService $ServiciosService;
    private ProfesionalService $profesionalService;

    public function __construct(ServiciosService $ServiciosService, ProfesionalService $profesionalService)
    {
        $this->ServiciosService = $ServiciosService;
        $this->profesionalService = $profesionalService;
    }

    public function index()
    {
        $servicios = $this->ServiciosService->listartodo();
        return view('Servicios.index', compact('servicios'));
        
    }
    
    public function create()
    {
        $profesionales = $this->profesionalService->listartodo();
        return view('Servicios.create', compact('profesionales'));
    }

    public function store(ServiciosRequest $request)
    {
        $this->ServiciosService->guardar($request->validated());
        return redirect()->route('servicios.index');
    }

    public function show()
    {
        //
    }

    public function edit(int $id)
    {
        $servicios = $this->ServiciosService->edit($id);
        $profesionales = $this->profesionalService->listartodo();
        return view('Servicios.update', compact('servicios', 'profesionales'));
    }

    public function update(int $id, ServiciosRequest $request)
    {
        $this->ServiciosService->actualizar($id, $request->all());
        return redirect()->route('servicios.index');
    }

    public function destroy(int $id)
    {
        $this->ServiciosService->eliminar($id);
        return redirect()->route('servicios.index');
    }
}
