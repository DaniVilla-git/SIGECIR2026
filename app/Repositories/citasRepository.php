<?php

namespace App\Repositories;

use App\Models\citas;

class citasRepository {
    
public function listarTodo()
{
    return citas::all();
    
}

public function guardar(array $datos){
    citas::create($datos);
}

public function eliminar(int $id){
    citas::destroy($id);
}

public function edit(int $id){
    return citas::findOrFail($id);
}

public function actualizar(int $id, array $datos){
    $citas = citas::findOrFail($id);
    $citas->update($datos);
}
    
}






?>