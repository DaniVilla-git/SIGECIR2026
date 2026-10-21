<?php

namespace App\Http\Controllers;

use App\Services\DashService;

class DashboardController extends Controller
{
    private DashService $dash_service;

    public function __construct(DashService $dash_service)
    {
        $this->dash_service = $dash_service;
    }

    public function index()
    {
        $totalUsuarios = $this->dash_service->TotalUsuarios();

        $totalProfesionales = $this->dash_service->TotalProfesionales();

        $citasHoy = $this->dash_service->TotalCitasHoy();

        $citasDelDia = $this->dash_service->CitasDelDia();

        $proximasCitas = $this->dash_service->ProximasCitas();

        $datosCitasPorMes = $this->dash_service->CitasPorMes();

        return view('dashboard.index', compact(
            'totalUsuarios',
            'totalProfesionales',
            'citasHoy',
            'citasDelDia',
            'proximasCitas',
            'datosCitasPorMes'
        ));
    }
}
