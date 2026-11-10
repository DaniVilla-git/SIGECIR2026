<?php

namespace App\Repositories;

use App\Models\usuarios;

class usuarioRepository {

    public function listarTodo()
    {
        return usuarios::all();
    }

    public function guardar(array $datos)
    {
        usuarios::create($datos);
    }

    public function eliminar(int $id)
    {
        usuarios::destroy($id);
    }

    public function edit(int $id)
    {
        return usuarios::findOrFail($id);
    }

    public function actualizar(int $id, array $datos)
    {
        $usuario = usuarios::findOrFail($id);

        // CONSERVAR EL USUARIO DE REGISTRO
        // SI EL FORMULARIO ENVÍA EL CAMPO VACÍO
        if (
            !isset($datos['usuario_registro']) ||
            trim((string) $datos['usuario_registro']) === ''
        ) {
            unset($datos['usuario_registro']);
        }

        // ACTUALIZAR LOS DATOS
        $usuario->update($datos);

        return $usuario;
    }

}
