<?php

    namespace App\Services;
    use App\Repositories\ProfesionalRepository;

    class ProfesionalService {
        
        private ProfesionalRepository $profesionalrepository;

        public function __construct(ProfesionalRepository $profesionalrepository)
        {
            $this->profesionalrepository = $profesionalrepository ;
        }

        public function listartodo()
        {
            return $this->profesionalrepository->listartodo();
        }

        public function guardar(array $datos)
        {
            $this->profesionalrepository->guardar($datos);
        }


        public function eliminar(int $id)
        {
            $this->profesionalrepository->eliminar($id);
        } 

        public function edit(int $id)
        {
            return $this->profesionalrepository->edit($id);
        }

        public function actualizar(int $id, array $datos)
        {
            $this->profesionalrepository->actualizar($id,$datos);
        }
    }