<?php

namespace App\Repositories;

use App\Models\documentos;

class documentosRepository {
    
public function listarTodo()
{
    return documentos::all();
    
}

public function guardar(array $datos){
    documentos::create($datos);
}

public function eliminar(int $id){
    documentos::destroy($id);
}

public function edit(int $id){
    return documentos::findOrFail($id);
}

public function actualizar(int $id, array $datos){
    $usuario = documentos::findOrFail($id);
    $usuario->update($datos);
}
    
}

?>