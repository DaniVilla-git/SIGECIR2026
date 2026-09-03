<?php

namespace App\Repositories;

use App\Models\servicios;

class ServiciosRepository {
    
public function listarTodo()
{
    return servicios::all();
    
}

public function guardar(array $datos){
    servicios::create($datos);
}

public function eliminar(int $id){
    servicios::destroy($id);
}

public function edit(int $id){
    return servicios::findOrFail($id);
}

public function actualizar(int $id, array $datos){
    $servicios = servicios::findOrFail($id);
    $servicios->update($datos);
}
    
}






?>