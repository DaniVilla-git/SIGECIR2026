<?php

namespace App\Repositories;

use App\Models\mensajes;

class mensajesRepository
{
    public function listartodo()
    {
        return mensajes::all();
    }

    public function guardar(array $datos)
    {
        mensajes::create($datos);
    }

    public function eliminar(int $id)
    {
        mensajes::destroy($id);
    }

    public function edit(int $id)
    {
        return mensajes::findOrFail($id);
    }

    public function actualizar(int $id, array $datos)
    {
        $mensaje = mensajes::findOrFail($id);

        $mensaje->mensaje = $datos['mensaje'];
        $mensaje->tipo_emisor = $datos['tipo_emisor'];
        $mensaje->fecha_mensaje = $datos['fecha_mensaje'];
        $mensaje->id_cita = $datos['id_cita'];
        $mensaje->id_profesional = $datos['id_profesional'];
        $mensaje->id_usuario = $datos['id_usuario'];
        $mensaje->save();
    }
}