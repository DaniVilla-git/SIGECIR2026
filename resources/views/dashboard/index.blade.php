@extends('layouts.app')

@section('title', 'Panel administrativo')

@section('content')

<div class="space-y-8">

    {{-- ENCABEZADO DE BIENVENIDA --}}
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#063d69] via-[#0875bd] to-[#20a4a7] p-7 text-white shadow-xl sm:p-9">

        <div class="relative z-10 flex flex-col justify-between gap-6 sm:flex-row sm:items-center">

            <div>
                <span class="inline-flex items-center gap-2 rounded-full bg-white/15 px-4 py-2 text-xs font-semibold tracking-wide text-white">
                    <i class="fa-solid fa-shield-heart"></i>
                    PANEL DE ADMINISTRACIÓN
                </span>

                <h2 class="mt-5 text-3xl font-extrabold tracking-tight sm:text-4xl">
                    ¡Bienvenido, Administrador!
                </h2>

                <p class="mt-3 max-w-xl text-sm leading-6 text-blue-50 sm:text-base">
                    Gestiona y supervisa las actividades de SIGECIR desde un solo lugar.
                </p>
            </div>

            <div class="flex shrink-0 items-center gap-3 rounded-2xl border border-white/20 bg-white/10 p-4 backdrop-blur-sm">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white text-[#0875bd]">
                    @include('layouts.partials.icons', [
                        'icon' => 'horario'
                    ])
                </div>

                <div>
                    <p class="text-xs text-blue-100">Fecha de hoy</p>
                    <p class="font-bold">
                        {{ now()->locale('es')->translatedFormat('d \d\e F \d\e Y') }}
                    </p>
                </div>
            </div>

        </div>

        {{-- Decoración --}}
        <div class="pointer-events-none absolute -right-12 -top-20 h-64 w-64 rounded-full border-[35px] border-white/10"></div>
        <div class="pointer-events-none absolute -bottom-28 right-40 h-64 w-64 rounded-full bg-white/5"></div>

    </div>


    {{-- TARJETAS ESTADÍSTICAS --}}
    <div>
        <div class="mb-5">
            <h3 class="text-xl font-bold text-slate-800">
                Resumen general
            </h3>
            <p class="mt-1 text-sm text-slate-500">
                Consulta el estado actual de la información registrada en SIGECIR.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3">

            {{-- TOTAL DE USUARIOS --}}
            <div class="group relative overflow-hidden rounded-2xl border border-slate-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-sky-50"></div>

                <div class="relative flex items-start justify-between">
                    <div>
                        <p class="text-sm font-semibold text-slate-500">
                            Total de usuarios
                        </p>

                        <h3 class="mt-3 text-3xl font-extrabold text-[#063d69]">
                            {{ number_format($totalUsuarios) }}
                        </h3>

                        <p class="mt-2 text-sm text-slate-500">
                            Usuarios registrados en el sistema
                        </p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-sky-100 text-[#0875bd]">
                        @include('layouts.partials.icons', ['icon' => 'usuario'])
                    </div>
                </div>

                <div class="relative mt-5 border-t border-slate-100 pt-3">
                    <span class="text-xs font-semibold text-[#0875bd]">
                        <i class="fa-solid fa-circle-check mr-1"></i>
                        Registro de usuarios
                    </span>
                </div>
            </div>

            {{-- TOTAL DE PROFESIONALES --}}
            <div class="group relative overflow-hidden rounded-2xl border border-slate-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-teal-50"></div>

                <div class="relative flex items-start justify-between">
                    <div>
                        <p class="text-sm font-semibold text-slate-500">
                            Total de profesionales
                        </p>

                        <h3 class="mt-3 text-3xl font-extrabold text-[#063d69]">
                            {{ number_format($totalProfesionales) }}
                        </h3>

                        <p class="mt-2 text-sm text-slate-500">
                            Profesionales registrados
                        </p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-teal-100 text-teal-700">
                        @include('layouts.partials.icons', ['icon' => 'profesional'])
                    </div>
                </div>

                <div class="relative mt-5 border-t border-slate-100 pt-3">
                    <span class="text-xs font-semibold text-teal-700">
                        <i class="fa-solid fa-user-doctor mr-1"></i>
                        Equipo profesional
                    </span>
                </div>
            </div>

            {{-- CITAS DE HOY --}}
            <div class="group relative overflow-hidden rounded-2xl border border-slate-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-indigo-50"></div>

                <div class="relative flex items-start justify-between">
                    <div>
                        <p class="text-sm font-semibold text-slate-500">
                            Citas de hoy
                        </p>

                        <h3 class="mt-3 text-3xl font-extrabold text-[#063d69]">
                            {{ number_format($citasHoy) }}
                        </h3>

                        <p class="mt-2 text-sm text-slate-500">
                            Citas programadas para hoy
                        </p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-100 text-indigo-700">
                        @include('layouts.partials.icons', ['icon' => 'cita'])
                    </div>
                </div>

                <div class="relative mt-5 border-t border-slate-100 pt-3">
                    <span class="text-xs font-semibold text-indigo-700">
                        <i class="fa-solid fa-calendar-check mr-1"></i>
                        Agenda del día
                    </span>
                </div>
            </div>

        </div>
    </div>


    {{-- GRÁFICO Y PRÓXIMAS CITAS --}}
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

        {{-- GRÁFICO --}}
        <div class="xl:col-span-2">
            <x-card
                title="Citas por mes"
                subtitle="Comportamiento mensual de las citas registradas"
            >
                <div class="relative h-80">
                    <canvas
                        id="citasChart"
                        role="img"
                        aria-label="Gráfico de citas por mes">
                    </canvas>
                </div>
            </x-card>
        </div>


        {{-- PRÓXIMAS CITAS --}}
        <div>
            <x-card
                title="Próximas citas"
                subtitle="Agenda de citas programadas"
            >

                <div class="space-y-4">

                    @forelse ($proximasCitas as $cita)

                        <div class="group flex items-start gap-3 rounded-xl border border-slate-100 p-3 transition duration-200 hover:border-blue-200 hover:bg-blue-50/50">

                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-700 transition group-hover:bg-blue-600 group-hover:text-white">
                                <span class="hidden h-4 w-4 text-slate-400 sm:block">
                                    @include('layouts.partials.icons', ['icon' => 'cita'])
                                </span>
                            </div>

                            <div class="min-w-0 flex-1">

                                <p class="truncate text-sm font-bold text-slate-800">
                                    {{ data_get($cita, 'usuario.name',
                                        data_get($cita, 'nombre_usuario',
                                        data_get($cita, 'nombre', 'Cita programada'))) }}
                                </p>

                                <p class="mt-1 text-xs text-slate-500">
                                    @php
                                        $fechaCita = data_get($cita, 'fecha')
                                            ?? data_get($cita, 'fecha_cita');
                                    @endphp

                                    <i class="fa-regular fa-clock mr-1 text-blue-500"></i>

                                    @if ($fechaCita)
                                        {{ \Carbon\Carbon::parse($fechaCita)->format('d/m/Y H:i') }}
                                    @else
                                        Fecha por confirmar
                                    @endif
                                </p>

                                @if (data_get($cita, 'profesional.name')
                                    ?? data_get($cita, 'nombre_profesional'))

                                    <p class="mt-1 truncate text-xs text-slate-500">
                                        <i class="fa-solid fa-user-doctor mr-1 text-blue-500"></i>
                                        Profesional:
                                        {{ data_get($cita, 'profesional.name')
                                            ?? data_get($cita, 'nombre_profesional') }}
                                    </p>

                                @endif

                            </div>

                        </div>

                    @empty

                        <div class="py-10 text-center">

                            <div class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-full bg-slate-100 text-slate-400">
                                <i class="fa-regular fa-calendar-xmark text-2xl"></i>
                            </div>

                            <p class="text-sm font-semibold text-slate-600">
                                No hay próximas citas
                            </p>

                            <p class="mt-1 text-xs text-slate-400">
                                Las nuevas citas aparecerán aquí.
                            </p>

                        </div>

                    @endforelse

                </div>

            </x-card>
        </div>

    </div>


    {{-- CITAS DEL DÍA --}}
    <div>

        <x-card
            title="Citas del día"
            subtitle="Consulta las citas programadas para hoy"
            :padding="false"
        >

            <x-table :headers="[
                'Usuario',
                'Profesional',
                'Hora',
                'Estado'
            ]">

                @forelse ($citasDelDia as $cita)

                    <tr class="border-b border-slate-100 transition hover:bg-blue-50/50">

                        <td class="px-5 py-4 text-sm font-semibold text-slate-700">
                            {{ data_get($cita, 'usuario.name')
                                ?? data_get($cita, 'nombre_usuario')
                                ?? data_get($cita, 'nombre', 'No disponible') }}
                        </td>

                        <td class="px-5 py-4 text-sm text-slate-600">
                            {{ data_get($cita, 'profesional.name')
                                ?? data_get($cita, 'nombre_profesional')
                                ?? 'No asignado' }}
                        </td>

                        <td class="whitespace-nowrap px-5 py-4 text-sm text-slate-600">
                            @php
                                $fecha = data_get($cita, 'fecha')
                                    ?? data_get($cita, 'fecha_cita');
                            @endphp

                            <span class="inline-flex items-center gap-2">
                                <i class="fa-regular fa-clock text-blue-500"></i>

                                @if ($fecha)
                                    {{ \Carbon\Carbon::parse($fecha)->format('h:i A') }}
                                @else
                                    No disponible
                                @endif
                            </span>
                        </td>

                        <td class="px-5 py-4 text-sm">
                            @php
                                $estado = data_get($cita, 'estado')
                                    ?? data_get($cita, 'status')
                                    ?? 'Pendiente';

                                $colorEstado = match (strtolower((string) $estado)) {
                                    'confirmada' => 'bg-emerald-100 text-emerald-700',
                                    'pendiente' => 'bg-amber-100 text-amber-700',
                                    'cancelada' => 'bg-red-100 text-red-700',
                                    'atendida' => 'bg-blue-100 text-blue-700',
                                    'inasistencia' => 'bg-slate-100 text-slate-700',
                                    default => 'bg-slate-100 text-slate-700',
                                };
                            @endphp

                            <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-bold {{ $colorEstado }}">
                                <span class="h-1.5 w-1.5 rounded-full bg-current"></span>
                                {{ ucfirst((string) $estado) }}
                            </span>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="px-5 py-12 text-center">

                            <div class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-full bg-slate-100 text-slate-400">
                                <i class="fa-regular fa-calendar text-2xl"></i>
                            </div>

                            <p class="text-sm font-semibold text-slate-600">
                                No hay citas programadas para hoy.
                            </p>

                            <p class="mt-1 text-xs text-slate-400">
                                Cuando existan citas, se mostrarán en este listado.
                            </p>

                        </td>
                    </tr>

                @endforelse

            </x-table>

        </x-card>

    </div>

</div>

@endsection


{{-- GRÁFICO --}}
@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    const canvas = document.getElementById('citasChart');

    if (!canvas || typeof Chart === 'undefined') {
        return;
    }

    const datosCitas = @json($datosCitasPorMes);

    let etiquetas = [];
    let valores = [];

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

                borderColor: '#0875bd',
                backgroundColor: 'rgba(8, 117, 189, 0.12)',

                borderWidth: 3,
                fill: true,
                tension: 0.4,

                pointRadius: 5,
                pointHoverRadius: 8,
                pointBackgroundColor: '#0875bd',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 2
            }]
        },

        options: {

            responsive: true,
            maintainAspectRatio: false,

            interaction: {
                intersect: false,
                mode: 'index'
            },

            plugins: {

                legend: {
                    display: false
                },

                tooltip: {
                    enabled: true,
                    backgroundColor: '#063d69',
                    titleColor: '#ffffff',
                    bodyColor: '#ffffff',
                    padding: 12,
                    cornerRadius: 10
                }

            },

            scales: {

                y: {
                    beginAtZero: true,

                    ticks: {
                        precision: 0,
                        color: '#64748b'
                    },

                    grid: {
                        color: '#f1f5f9',
                        drawBorder: false
                    }
                },

                x: {
                    ticks: {
                        color: '#64748b'
                    },

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
