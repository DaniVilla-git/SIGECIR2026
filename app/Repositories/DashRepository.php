<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashRepository
{
    public function TotalUsuarios()
    {
        return DB::table('usuarios')->count();
    }

    public function TotalProfesionales()
    {
        return DB::table('profesionales')->count();
    }

    public function TotalCitasHoy()
    {
        return DB::table('citas')
            ->whereDate('fecha_cita', Carbon::today())
            ->count();
    }

    public function CitasDelDia()
    {
        return DB::table('citas')
            ->whereDate('fecha_cita', Carbon::today())
            ->orderBy('hora_inicio', 'asc')
            ->get();
    }

    public function ProximasCitas()
    {
        return DB::table('citas')
            ->whereDate('fecha_cita', '>=', Carbon::today())
            ->whereIn('estado_cita', ['Pendiente', 'Confirmada'])
            ->orderBy('fecha_cita', 'asc')
            ->orderBy('hora_inicio', 'asc')
            ->limit(5)
            ->get();
    }

    public function CitasPorMes()
    {
        $citasPorMes = DB::table('citas')
            ->selectRaw('MONTH(fecha_cita) AS mes, COUNT(*) AS total')
            ->whereYear('fecha_cita', now()->year)
            ->groupByRaw('MONTH(fecha_cita)')
            ->orderByRaw('MONTH(fecha_cita)')
            ->get()
            ->keyBy('mes');

        $meses = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre',
        ];

        $datos = [];

        foreach ($meses as $numero => $nombre) {
            $datos[] = [
                'mes' => $nombre,
                'total' => $citasPorMes->has($numero)
                    ? (int) $citasPorMes[$numero]->total
                    : 0,
            ];
        }

        return $datos;
    }
}