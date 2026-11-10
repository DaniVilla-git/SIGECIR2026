<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use App\Models\profesionales;
use App\Models\citas;
use App\Services\mensajesService;
use Illuminate\Http\Request;

class MensajesController extends Controller
{
    private mensajesService $mensajesService;

    public function __construct(mensajesService $mensajesService)
    {
        $this->mensajesService = $mensajesService;
    }

    public function index()
    {
        $mensajes = $this->mensajesService->listartodo();

        return view('mensajes.index', compact('mensajes'));
    }

    public function create()
    {
        $usuarios = usuarios::all();
        $profesionales = profesionales::all();
        $citas = citas::all();

        return view('mensajes.create', compact(
            'usuarios',
            'profesionales',
            'citas'
        ));
    }

    public function store(Request $request)
    {
        $this->mensajesService->guardar($request->all());

        return redirect()
            ->route('mensajes.index')
            ->with('success', 'Mensaje creado correctamente');
    }

    public function edit(int $id)
    {
        $mensaje = $this->mensajesService->edit($id);

        $usuarios = usuarios::all();
        $profesionales = profesionales::all();
        $citas = citas::all();

        return view('mensajes.update', compact(
            'mensaje',
            'usuarios',
            'profesionales',
            'citas'
        ));
    }

    public function update($id, Request $request)
    {
        $this->mensajesService->actualizar($id, $request->all());

        return redirect()
            ->route('mensajes.index')
            ->with('success', 'Mensaje actualizado correctamente');
    }

    public function destroy(int $id)
    {
        $this->mensajesService->eliminar($id);

        return redirect()->route('mensajes.index');
    }
}