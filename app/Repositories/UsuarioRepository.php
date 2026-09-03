<?php

namespace App\Repositories;

use App\Models\usuarios;

class usuarioRepository {
    
public function listarTodo()
{
    return usuarios::all();
    
}

public function guardar(array $datos){
    usuarios::create($datos);
}

public function eliminar(int $id){
    usuarios::destroy($id);
}

public function edit(int $id){
    return usuarios::findOrFail($id);
}

public function actualizar(int $id, array $datos){
    $usuario = usuarios::findOrFail($id);
    $usuario->update($datos);
}
    
}






?>