<?php

namespace App\Http\Controllers;

use App\Models\notificaciones;
use App\Models\usuarios;
use App\Models\profesionales;
use App\Services\notificacionesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class NotificacionesController extends Controller
{
    private notificacionesService $notificacionesService;

    public function __construct(notificacionesService $NotificacionService)
    {
        $this->notificacionesService = $NotificacionService;
    }

    // LISTAR NOTIFICACIONES
    public function index()
    {
        $notificaciones = $this->notificacionesService->listarTodo();

        return view('notificaciones.index', compact('notificaciones'));
    }

    // FORMULARIO DE CREACIÓN
    public function create()
    {
        $usuarios = usuarios::all();

        $profesionales = profesionales::all();

        return view('notificaciones.create', compact(
            'usuarios',
            'profesionales'
        ));
    }

    // GUARDAR NOTIFICACIÓN
    public function store(Request $request)
    {
        $datos = $request->validate([

            'titulo_notificacion' => 'required|string|max:255',

            'mensaje_notificacion' => 'required|string',

            'tipo_notificacion' => 'required|string|max:255',

            'fecha_notificacion' => 'required|date',

            'destinatario_tipo' => 'required|in:usuario,profesional',

            'id_usuario' => 'required_if:destinatario_tipo,usuario|nullable|exists:usuarios,id',

            'id_profesional' => 'required_if:destinatario_tipo,profesional|nullable|exists:profesionales,id',

        ]);

        try {

            DB::transaction(function () use ($datos, $request) {

                // DATOS DE LA NOTIFICACIÓN
                $datosNotificacion = [
                    'titulo_notificacion' => $datos['titulo_notificacion'],
                    'mensaje_notificacion' => $datos['mensaje_notificacion'],
                    'tipo_notificacion' => $datos['tipo_notificacion'],
                    'fecha_notificacion' => $datos['fecha_notificacion'],
                    'id_usuario' => $datos['destinatario_tipo'] === 'usuario'
                        ? $datos['id_usuario']
                        : null,
                ];

                // CREAR NOTIFICACIÓN
                $notificacion = notificaciones::create($datosNotificacion);

                // SI EL DESTINATARIO ES UN PROFESIONAL
                if ($datos['destinatario_tipo'] === 'profesional') {

                    $profesional = profesionales::findOrFail(
                        $datos['id_profesional']
                    );

                    // GUARDAR RELACIÓN CON EL PROFESIONAL
                    $notificacion->profesionales()->attach(
                        $profesional->id,
                        [
                            'leida' => false,
                            'fecha_lectura' => null
                        ]
                    );

                    // ENVIAR CORREO AL PROFESIONAL
                    if (!empty($profesional->correo)) {

                        Mail::raw(
                            $datos['mensaje_notificacion'],
                            function ($message) use ($profesional, $datos) {

                                $message->to($profesional->correo)
                                    ->subject($datos['titulo_notificacion']);

                            }
                        );
                    }

                } else {

                    // SI EL DESTINATARIO ES UN USUARIO
                    $usuario = usuarios::findOrFail(
                        $datos['id_usuario']
                    );

                    // ENVIAR CORREO AL USUARIO
                    if (!empty($usuario->correo_usuario)) {

                        Mail::raw(
                            $datos['mensaje_notificacion'],
                            function ($message) use ($usuario, $datos) {

                                $message->to($usuario->correo_usuario)
                                    ->subject($datos['titulo_notificacion']);

                            }
                        );
                    }
                }

            });

            return redirect()
                ->route('notificaciones.index')
                ->with('success', 'Notificación guardada y procesada correctamente.');

        } catch (\Throwable $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'No se pudo guardar la notificación. Verifica los datos y la configuración del correo.');
        }
    }

    // MOSTRAR NOTIFICACIÓN
    public function show(notificaciones $notificaciones)
    {
        return view('notificaciones.show', compact('notificaciones'));
    }

    // FORMULARIO DE EDICIÓN
    public function edit($id)
    {
        $notificaciones = notificaciones::findOrFail($id);

        $usuarios = usuarios::all();

        $profesionales = profesionales::all();

        return view('notificaciones.update', compact(
            'notificaciones',
            'usuarios',
            'profesionales'
        ));
    }

    // ACTUALIZAR NOTIFICACIÓN
    public function update(Request $request, $id)
    {
        $datos = $request->validate([

            'titulo_notificacion' => 'required|string|max:255',

            'mensaje_notificacion' => 'required|string',

            'tipo_notificacion' => 'required|string|max:255',

            'fecha_notificacion' => 'required|date',

            'id_usuario' => 'required|exists:usuarios,id',

        ]);

        $this->notificacionesService->actualizar($id, $datos);

        return redirect()
            ->route('notificaciones.index')
            ->with('actualizar', 'Notificación actualizada correctamente.');
    }

    // ELIMINAR NOTIFICACIÓN
    public function destroy(int $id)
    {
        $this->notificacionesService->eliminar($id);

        return redirect()
            ->route('notificaciones.index')
            ->with('success', 'Notificación eliminada correctamente.');
    }
}
