@extends('layouts.app')

@section('title', 'Dashboard')

@section('page-title', 'Panel de control')

@section('content')

<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">
                ¡Bienvenido Administrador!
            </h2>
            <p class="mt-1 text-sm text-slate-500">
                Aquí puedes gestionar y supervisar
                las actividades
            </p>
        </div>
        <div class="text-[13px] text-[#8492a6]">
            <i class="fa-regular fa-calendar mr-1"></i>
            {{ now()->locale('es')->translatedFormat('d \d\e F \d\e Y') }}
        </div>
    </div>

    {{-- Tarjetas estadísticas --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">

        <x-stat-card
            label="Total de usuarios"
            :value="number_format($totalUsuarios)"
            change="Registrados en el sistema"
            trend="up"
            icon="usuario"
        />

        <x-stat-card
            label="Total de profesionales"
            :value="number_format($totalProfesionales)"
            change="Profesionales registrados"
            trend="up"
            icon="profesional"
        />

        <x-stat-card
            label="Citas de hoy"
            :value="number_format($citasHoy)"
            change="Citas programadas para hoy"
            trend="up"
            icon="cita"
        />

    </div>

    {{-- Gráfico de citas por mes --}}
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

        <x-card
            title="Citas por mes"
            subtitle="Resumen mensual de citas"
            class="xl:col-span-2"
        >
            <div class="relative h-72">
                <canvas
                    id="citasChart"
                    role="img"
                    aria-label="Gráfico de citas por mes">
                </canvas>
            </div>
        </x-card>

        {{-- Próximas citas --}}
        <x-card
            title="Próximas citas"
            subtitle="Citas programadas próximamente"
        >
            <div class="space-y-4">

                @forelse ($proximasCitas as $cita)

                    <div class="flex items-start gap-3 border-b
                                border-slate-100 pb-4 last:border-0">

                        <div class="flex h-10 w-10 shrink-0
                                    items-center justify-center
                                    rounded-lg bg-primary-50
                                    text-primary-600">
                            @include(
                                'layouts.partials.icons',
                                ['icon' => 'calendar']
                            )
                        </div>

                        <div class="min-w-0 flex-1">
                            <p class="truncate text-sm font-semibold
                                      text-slate-800">
                                {{ data_get($cita, 'usuario.name',
                                    data_get($cita, 'nombre_usuario',
                                    data_get($cita, 'nombre', 'Cita programada'))) }}
                            </p>

                            <p class="mt-1 text-xs text-slate-500">
                                @php
                                    $fechaCita = data_get($cita, 'fecha')
                                        ?? data_get($cita, 'fecha_cita');
                                @endphp

                                @if ($fechaCita)
                                    {{ \Carbon\Carbon::parse($fechaCita)->format('d/m/Y H:i') }}
                                @else
                                    Fecha por confirmar
                                @endif
                            </p>

                            @if (data_get($cita, 'profesional.name')
                                ?? data_get($cita, 'nombre_profesional'))
                                <p class="mt-1 text-xs text-slate-500">
                                    Profesional:
                                    {{ data_get($cita, 'profesional.name')
                                        ?? data_get($cita, 'nombre_profesional') }}
                                </p>
                            @endif
                        </div>

                    </div>

                @empty

                    <div class="py-8 text-center">
                        <p class="text-sm text-slate-500">
                            No hay próximas citas registradas.
                        </p>
                    </div>

                @endforelse

            </div>
        </x-card>

    </div>

    {{-- Citas del día --}}
    <div>
        <x-card
            title="Citas del día"
            subtitle="Listado de las citas programadas para hoy"
            :padding="false"
        >

            <x-table :headers="[
                'Usuario',
                'Profesional',
                'Hora',
                'Estado'
            ]">

                @forelse ($citasDelDia as $cita)

                    <tr class="transition hover:bg-slate-50">

                        <td class="px-5 py-4 text-sm font-medium
                                   text-slate-700">
                            {{ data_get($cita, 'usuario.name')
                                ?? data_get($cita, 'nombre_usuario')
                                ?? data_get($cita, 'nombre', 'No disponible') }}
                        </td>

                        <td class="px-5 py-4 text-sm text-slate-500">
                            {{ data_get($cita, 'profesional.name')
                                ?? data_get($cita, 'nombre_profesional')
                                ?? 'No asignado' }}
                        </td>

                        <td class="whitespace-nowrap px-5 py-4
                                   text-sm text-slate-500">
                            @php
                                $fecha = data_get($cita, 'fecha')
                                    ?? data_get($cita, 'fecha_cita');
                            @endphp

                            @if ($fecha)
                                {{ \Carbon\Carbon::parse($fecha)->format('h:i A') }}
                            @else
                                No disponible
                            @endif
                        </td>

                        <td class="px-5 py-4 text-sm">
                            @php
                                $estado = data_get($cita, 'estado')
                                    ?? data_get($cita, 'status')
                                    ?? 'Pendiente';
                            @endphp

                            <span class="inline-flex items-center rounded-full
                                         bg-primary-50 px-2.5 py-1
                                         text-xs font-medium text-primary-700">
                                {{ ucfirst((string) $estado) }}
                            </span>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4"
                            class="px-5 py-10 text-center text-sm
                                   text-slate-400">
                            No hay citas programadas para hoy.
                        </td>
                    </tr>

                @endforelse

            </x-table>

        </x-card>
    </div>

</div>

@endsection

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    const canvas = document.getElementById('citasChart');

    if (!canvas || typeof Chart === 'undefined') {
        return;
    }

    // Datos enviados por DashboardController
    const datosCitas = @json($datosCitasPorMes);

    let etiquetas = [];
    let valores = [];

    /*
     * Se admiten dos formatos:
     *
     * 1. Una colección de registros con mes y total.
     * 2. Un arreglo asociativo con el mes como clave y
     *    el total de citas como valor.
     *
     * Ajusta las claves si tu servicio utiliza otros nombres.
     */

    if (Array.isArray(datosCitas)) {

        etiquetas = datosCitas.map(item =>
            item.mes ?? item.nombre_mes ?? item.month ?? 'Mes'
        );

        valores = datosCitas.map(item =>
            Number(item.total ?? item.total_citas ?? item.cantidad ?? 0)
        );

    } else if (
        datosCitas !== null &&
        typeof datosCitas === 'object'
    ) {

        etiquetas = Object.keys(datosCitas);

        valores = Object.values(datosCitas).map(item => {
            if (typeof item === 'object' && item !== null) {
                return Number(
                    item.total ??
                    item.total_citas ??
                    item.cantidad ??
                    0
                );
            }

            return Number(item ?? 0);
        });

    }

    new Chart(canvas, {
        type: 'line',

        data: {
            labels: etiquetas,

            datasets: [{
                label: 'Cantidad de citas',
                data: valores,
                borderColor: '#4f46e5',
                backgroundColor: 'rgba(79, 70, 229, 0.10)',
                borderWidth: 3,
                fill: true,
                tension: 0.35,
                pointRadius: 4,
                pointHoverRadius: 6,
                pointBackgroundColor: '#4f46e5'
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    display: false
                },

                tooltip: {
                    enabled: true
                }
            },

            scales: {
                y: {
                    beginAtZero: true,

                    ticks: {
                        precision: 0
                    },

                    grid: {
                        color: '#f1f5f9'
                    }
                },

                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

});
</script>

@endpush