<?php 

namespace App\Services;

use App\Repositories\ServiciosRepository;

class ServiciosService{

    private ServiciosRepository $serviciosRepository;

    public function __construct (ServiciosRepository $serviciosRepository){

     $this->serviciosRepository = $serviciosRepository;

    }

    public function listarTodo(){

     return $this->serviciosRepository->listarTodo();
    }

    public function guardar(array $datos){
        $this->serviciosRepository->guardar($datos);
        
    }

    public function eliminar (int $id){
        $this->serviciosRepository->eliminar($id);
    }

    public function edit(int $id){
        return $this->serviciosRepository->edit($id);
    
    }

    public function actualizar(int $id, array $datos){
        $this->serviciosRepository->actualizar($id,$datos);
    }

}


