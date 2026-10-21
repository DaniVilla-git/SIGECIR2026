<?php

namespace App\Http\Controllers;

use App\Models\notificaciones;
use App\Models\usuarios;
use App\Services\notificacionesService;
use Illuminate\Http\Request;

class NotificacionesController extends Controller
{
    private notificacionesService $notificacionesService;

    public function __construct(notificacionesService $NotificacionService) { $this->notificacionesService = $NotificacionService; }
    
    public function index()
    {
        $notificaciones = $this->notificacionesService->listarTodo(); 
        return view('notificaciones.index', compact('notificaciones'));
    }

    
    public function create()
    {
    $usuarios = usuarios::all();

    return view('notificaciones.create', compact('usuarios'));
    }

    
    public function store(Request $request)
    {
        $datos = $request->all();

        $this->notificacionesService->guardar($datos);

        return redirect()
            ->route('notificaciones.index')
            ->with('success', 'Notificación guardada correctamente.');
    }

    
    public function show(notificaciones $notificaciones)
    {
        //
    }

    
    public function edit(int $id)
    {
        $notificaciones = $this->notificacionesService->edit($id); 
        return view('notificaciones.update', compact('notificaciones'));
    }

    
    public function update(int $id, Request $request)
    {
        $this->notificacionesService->actualizar($id, $request->all()); return redirect()->route('notificaciones.index') ->with('success', 'Notificación actualizada correctamente');
    }

    
    public function destroy(int $id)
    {
        $this->notificacionesService->eliminar($id);
        return redirect()->route('notificaciones.index') ->with('success', 'Notificación eliminada correctamente');
    }
}
