<?php 

namespace App\Services;

use App\Repositories\usuarioRepository;

class UsuarioService {

    private usuarioRepository $usuariorepository;

    public function __construct (usuarioRepository $usuariorepository){

     $this->usuariorepository = $usuariorepository;

    }

    public function listarTodo(){

     return $this->usuariorepository->listarTodo();
    }

    public function guardar(array $datos){
        $this->usuariorepository->guardar($datos);
        
    }

    public function eliminar (int $id){
        $this->usuariorepository->eliminar($id);
    }

    public function edit(int $id){
        return $this->usuariorepository->edit($id);
    
    }

    public function actualizar(int $id, array $datos){
        $this->usuariorepository->actualizar($id,$datos);
    }

}


