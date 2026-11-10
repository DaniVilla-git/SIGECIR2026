<?php 

namespace App\Services;

use App\Repositories\notificacionesRepository;

class notificacionesService {

    private  notificacionesRepository $notificacionesRepository;

    public function __construct (notificacionesRepository $notificacionesRepository){

     $this->notificacionesRepository = $notificacionesRepository;

    }

    public function listarTodo(){

     return $this->notificacionesRepository->listarTodo();
    }

    public function guardar(array $datos){
        $this->notificacionesRepository->guardar($datos);
        
    }

    public function eliminar (int $id){
        $this->notificacionesRepository->eliminar($id);
    }

    public function edit(int $id){
        return $this->notificacionesRepository->edit($id);
    
    }

    public function actualizar(int $id, array $datos){
        $this->notificacionesRepository->actualizar($id,$datos);
    }

}


