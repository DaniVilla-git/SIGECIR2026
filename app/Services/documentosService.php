<?php 

namespace App\Services;

use App\Repositories\documentosRepository;

class documentosService {

    private  documentosRepository $documentosRepository;

    public function __construct (documentosRepository $documentosRepository){

     $this->documentosRepository = $documentosRepository;

    }

    public function listarTodo(){

     return $this->documentosRepository->listarTodo();
    }

    public function guardar(array $datos){
        $this->documentosRepository->guardar($datos);
        
    }

    public function eliminar (int $id){
        $this->documentosRepository->eliminar($id);
    }

    public function edit(int $id){
        return $this->documentosRepository->edit($id);
    
    }

    public function actualizar(int $id, array $datos){
        $this->documentosRepository->actualizar($id,$datos);
    }

}


