<?php

    namespace App\Services;
    use App\Repositories\Horario_profesionalRepository;

    class Horario_profesionalService {
        
        private Horario_profesionalRepository $Horario_profesionalRepository;

        public function __construct(Horario_profesionalRepository $Horario_profesionalRepository)
        {
            $this->Horario_profesionalRepository = $Horario_profesionalRepository ;
        }

        public function listartodo()
        {
            return $this->Horario_profesionalRepository->listartodo();
        }

        public function guardar(array $datos)
        {
            $this->Horario_profesionalRepository->guardar($datos);
        }


        public function eliminar(int $id)
        {
            $this->Horario_profesionalRepository->eliminar($id);
        } 

        public function edit(int $id)
        {
            return $this->Horario_profesionalRepository->edit($id);
        }

        public function actualizar(int $id, array $datos)
        {
            $this->Horario_profesionalRepository->actualizar($id,$datos);
        }
    }