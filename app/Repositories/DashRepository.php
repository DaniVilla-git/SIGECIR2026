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

    // CITAS DEL DÍA CON USUARIOS Y PROFESIONALES
    public function CitasDelDia()
    {
        return DB::table('citas as c')

            ->leftJoin('usuarios as u', 'c.id_usuario', '=', 'u.id')

            ->leftJoin('profesionales as p', 'c.id_profesional', '=', 'p.id')

            ->select(
                'c.*',

                'u.primer_nombre as usuario_primer_nombre',
                'u.segundo_nombre as usuario_segundo_nombre',
                'u.primer_apellido as usuario_primer_apellido',
                'u.segundo_apellido as usuario_segundo_apellido',

                'p.nombre_profesional as profesional_nombre',
            )

            ->whereDate('c.fecha_cita', Carbon::today())

            ->orderBy('c.hora_inicio', 'asc')

            ->get();
    }

    // PRÓXIMAS CITAS CON USUARIOS Y PROFESIONALES
    public function ProximasCitas()
    {
        return DB::table('citas as c')

            ->leftJoin('usuarios as u', 'c.id_usuario', '=', 'u.id')

            ->leftJoin('profesionales as p', 'c.id_profesional', '=', 'p.id')

            ->select(
                'c.*',

                'u.primer_nombre as usuario_primer_nombre',
                'u.segundo_nombre as usuario_segundo_nombre',
                'u.primer_apellido as usuario_primer_apellido',
                'u.segundo_apellido as usuario_segundo_apellido',

                'p.nombre_profesional as profesional_nombre'
            )

            ->whereDate('c.fecha_cita', '>=', Carbon::today())

            ->whereIn('c.estado_cita', ['Pendiente', 'Confirmada'])

            ->orderBy('c.fecha_cita', 'asc')

            ->orderBy('c.hora_inicio', 'asc')

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
