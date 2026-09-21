<?php 

namespace App\Services;

use App\Repositories\ServiciosRepository;


class ServiciosService{

    private ServiciosRepository $serviciosrepository;

    public function __construct(ServiciosRepository $serviciosrepository)
    {
        $this->serviciosrepository = $serviciosrepository;
    }

    public function listarTodo(){

    return $this->serviciosrepository->listarTodo();
    }

    public function guardar(array $datos){
        $this->serviciosrepository->guardar($datos);
        
    }

    public function eliminar (int $id){
        $this->serviciosrepository->eliminar($id);
    }

    public function edit(int $id){
        return $this->serviciosrepository->edit($id);
    
    }

    public function actualizar(int $id, array $datos){
        $this->serviciosrepository->actualizar($id,$datos);
    }

}