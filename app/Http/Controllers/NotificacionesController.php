<?php

namespace App\Http\Controllers;

use App\Models\notificaciones;
use App\Models\usuarios;
use App\Services\notificacionesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $datos = $request->validate([
            'titulo_notificacion' => 'required',
            'mensaje_notificacion' => 'required',
            'tipo_notificacion' => 'required',
            'fecha_notificacion' => 'required|date',
            'id_usuario' => 'required|exists:usuarios,id',
        ]);

        // Buscar el usuario seleccionado
        $usuario = usuarios::findOrFail($datos['id_usuario']);

        // Guardar la notificación
        $this->notificacionesService->guardar($datos);

        // Verificar que el usuario tenga correo
        if (empty($usuario->correo_usuario)) {
            return redirect()
                ->route('notificaciones.index')
                ->with('success', 'Notificación guardada, pero el usuario no tiene un correo registrado.');
        }

        // Enviar correo
        try {
            Mail::raw($datos['mensaje_notificacion'], function ($message) use ($usuario, $datos) {
                $message->to($usuario->correo_usuario)
                        ->subject($datos['titulo_notificacion']);
            });

            return redirect()
                ->route('notificaciones.index')
                ->with('success', 'Notificación guardada y correo enviado correctamente.');

        } catch (\Throwable $e) {
            return redirect()
                ->route('notificaciones.index')
                ->with('success', 'La notificación se guardó, pero no se pudo enviar el correo. Revisa la configuración del correo.');
        }
    }



    
    public function show(notificaciones $notificaciones)
    {
        //
    }

    
    public function edit($id)
    {
        $notificaciones = notificaciones::findOrFail($id);

        $usuarios = usuarios::all();

        return view('notificaciones.update', compact(
            'notificaciones',
            'usuarios'
        ));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->validate([
            'titulo_notificacion' => 'required',
            'mensaje_notificacion' => 'required',
            'tipo_notificacion' => 'required',
            'fecha_notificacion' => 'required|date',
            'id_usuario' => 'required|exists:usuarios,id_usuario',
        ]);

        $this->notificacionesService->actualizar($id, $datos);

        return redirect()->route('notificaciones.index')
            ->with('actualizar', 'Notificación actualizada correctamente.');
    }

    
    public function destroy(int $id)
    {
        $this->notificacionesService->eliminar($id);
        return redirect()->route('notificaciones.index') ->with('success', 'Notificación eliminada correctamente');
    }
}
