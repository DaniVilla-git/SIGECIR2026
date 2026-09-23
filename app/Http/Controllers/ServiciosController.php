<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\servicios;
use App\Models\Profesionales;
use App\Services\ServiciosService;
use Illuminate\Http\Request;



class ServiciosController extends Controller
{
    private ServiciosService $ServiciosService;

    public function __construct(ServiciosService $ServiciosService)
    {
        $this->ServiciosService = $ServiciosService;
=======
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
>>>>>>> Dev2-A
    }

    public function index()
    {
<<<<<<< HEAD
        $servicios = $this->ServiciosService->listarTodo();
        return view('Servicios.index', compact('servicios'));
    }

    public function create()
    {
    $profesionales = profesionales::all();

    return view('servicios.create', compact('profesionales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->ServiciosService->guardar($request->all());
        return redirect()->route('servicios.index')->with('success', 'Servicio creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(servicios $servicios)
=======
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
>>>>>>> Dev2-A
    {
        //
    }

<<<<<<< HEAD
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(servicios $servicios)
    {
        $servicios = $this->ServiciosService->edit($servicios->id);
        return view('Servicios.update', compact('servicios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, servicios $servicios)
    {
        $servicios = $this->ServiciosService->actualizar($servicios->id, $request->all());
        return redirect()->route('servicios.index')->with('success', 'Servicio actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(servicios $servicios)
    {
        //
=======
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
>>>>>>> Dev2-A
    }
}
