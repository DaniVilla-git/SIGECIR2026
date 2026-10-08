<?php

namespace App\Services;

use App\Repositories\mensajesRepository;

class mensajesService
{
    private mensajesRepository $mensajesRepository;

         public function __construct(mensajesRepository $mensajesRepository)
    {
        $this->mensajesRepository = $mensajesRepository;
    }

        public function listartodo()
    {
        return $this->mensajesRepository->listartodo();
    }

        public function guardar(array $datos)
    {
        $this->mensajesRepository->guardar($datos);
    }

            public function eliminar(int $id)
    {
        $this->mensajesRepository->eliminar($id);
    }

         public function edit(int $id)
    {
        return $this->mensajesRepository->edit($id);
    }

         public function actualizar(int $id, array $datos)
    {
        $this->mensajesRepository->actualizar($id, $datos);
    }
}