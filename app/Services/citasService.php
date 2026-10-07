<?php 

namespace App\Services;

use App\Repositories\citasRepository;

class UsuarioService {

    private citasRepository $citasRepository;
    public function __construct (citasRepository $citasRepository
){

     $this->citasRepository = $citasRepository;

    }

    public function listarTodo(){

     return $this->citasRepository->listarTodo();
    }

    public function guardar(array $datos){
        $this->citasRepository->guardar($datos);
        
    }

    public function eliminar (int $id){
        $this->citasRepository->eliminar($id);
    }

    public function edit(int $id){
        return $this->citasRepository->edit($id);
    
    }

    public function actualizar(int $id, array $datos){
        $this->citasRepository->actualizar($id,$datos);
    }

}


