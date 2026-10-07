<?php

namespace App\Repositories;

use App\Models\notificaciones;

class notificacionesRepository {
    
public function listarTodo()
{
    return notificaciones::all();
    
}

public function guardar(array $datos){
    notificaciones::create($datos);
}

public function eliminar(int $id){
    notificaciones::destroy($id);
}

public function edit(int $id){
    return notificaciones::findOrFail($id);
}

public function actualizar(int $id, array $datos){
    $usuario = notificaciones::findOrFail($id);
    $usuario->update($datos);
}
    
}






?>