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
        if (isset($datos['numero_documento'])) {
            $datos['documento_identidad'] = $datos['numero_documento'];
        }

        unset($datos['numero_documento']);
        unset($datos['_token']);

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

    public function actualizar($id, array $datos)
    {
        if (isset($datos['numero_documento'])) {
            $datos['documento_identidad'] = $datos['numero_documento'];
        }

        unset($datos['numero_documento']);
        unset($datos['_token']);
        unset($datos['_method']);

        $usuario = usuarios::findOrFail($id);

        $usuario->update($datos);

        return $usuario;
    }

}
