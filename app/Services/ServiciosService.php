<?php 

namespace App\Services;

use App\Repositories\ServiciosRepository;

<<<<<<< HEAD
class ServiciosService{

    private ServiciosRepository $serviciosRepository;

    public function __construct (ServiciosRepository $serviciosRepository){

     $this->serviciosRepository = $serviciosRepository;

=======

class ServiciosService{

    private ServiciosRepository $serviciosrepository;

    public function __construct(ServiciosRepository $serviciosrepository)
    {
        $this->serviciosrepository = $serviciosrepository;
>>>>>>> Dev2-A
    }

    public function listarTodo(){

<<<<<<< HEAD
     return $this->serviciosRepository->listarTodo();
    }

    public function guardar(array $datos){
        $this->serviciosRepository->guardar($datos);
=======
    return $this->serviciosrepository->listarTodo();
    }

    public function guardar(array $datos){
        $this->serviciosrepository->guardar($datos);
>>>>>>> Dev2-A
        
    }

    public function eliminar (int $id){
<<<<<<< HEAD
        $this->serviciosRepository->eliminar($id);
    }

    public function edit(int $id){
        return $this->serviciosRepository->edit($id);
=======
        $this->serviciosrepository->eliminar($id);
    }

    public function edit(int $id){
        return $this->serviciosrepository->edit($id);
>>>>>>> Dev2-A
    
    }

    public function actualizar(int $id, array $datos){
<<<<<<< HEAD
        $this->serviciosRepository->actualizar($id,$datos);
    }

}


=======
        $this->serviciosrepository->actualizar($id,$datos);
    }

}
>>>>>>> Dev2-A
