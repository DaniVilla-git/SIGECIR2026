<?php

namespace App\Services;

use App\Repositories\DashRepository;

class DashService
{
    private DashRepository $dash_repository;

    public function __construct(DashRepository $dash_repository)
    {
        $this->dash_repository = $dash_repository;
    }

    public function TotalUsuarios()
    {
        return $this->dash_repository->TotalUsuarios();
    }

    public function TotalProfesionales()
    {
        return $this->dash_repository->TotalProfesionales();
    }

    public function TotalCitasHoy()
    {
        return $this->dash_repository->TotalCitasHoy();
    }

    public function CitasDelDia()
    {
        return $this->dash_repository->CitasDelDia();
    }

    public function ProximasCitas()
    {
        return $this->dash_repository->ProximasCitas();
    }

    public function CitasPorMes()
    {
        return $this->dash_repository->CitasPorMes();
    }

    
}