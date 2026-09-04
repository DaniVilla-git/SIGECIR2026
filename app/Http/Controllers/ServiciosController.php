<?php

namespace App\Http\Controllers;

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
    }

    public function index()
    {
        $servicios = $this->ServiciosService->listarTodo();
        return view('Servicios.index', compact('servicios'));
    }

   public function create()
    {
        $servicios = $this->ServiciosService->listartodo();
        return view('Servicios.create', compact('servicios'));
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
    {
        //
    }

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
    }
}
