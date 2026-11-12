@extends('profesionales.layouts.appProfesional')

@section('title', 'Mi agenda')

@section('content')

<div class="container mx-auto mt-8 px-4 pb-10">

    {{-- CONTENEDOR PRINCIPAL --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl">

        {{-- ENCABEZADO --}}
        <div class="relative overflow-hidden bg-gradient-to-r from-[#063d69] via-[#0875bd] to-[#20a4a7] px-6 py-8 md:px-8">

            <div class="absolute -right-10 -top-16 h-52 w-52 rounded-full bg-white/10"></div>
            <div class="absolute -bottom-20 right-40 h-48 w-48 rounded-full bg-white/10"></div>

            <div class="relative flex flex-col justify-between gap-5 md:flex-row md:items-center">

                <div>
                    <div class="mb-3 flex items-center gap-2 text-sm font-medium text-blue-100">
                        <i class="fa-solid fa-calendar-check"></i>
                        <span>Gestión de citas</span>
                    </div>

                    <h1 class="text-3xl font-extrabold tracking-tight text-white">
                        Mi agenda
                    </h1>

                    <p class="mt-2 max-w-xl text-sm text-blue-100">
                        Consulta y organiza tus citas asignadas.
                    </p>
                </div>

                <div class="inline-flex items-center gap-2 self-start rounded-xl bg-white px-5 py-3 text-sm font-bold text-[#063d69] shadow-lg sm:self-auto">
                    <i class="fa-regular fa-calendar text-[#0875bd]"></i>

                    <span>
                        {{ now()->locale('es')->translatedFormat('l, d \d\e F \d\e Y') }}
                    </span>
                </div>

            </div>
        </div>

        <div class="p-5 md:p-8">

            {{-- RESUMEN DE CITAS --}}
            <section class="mb-7 grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3">

                {{-- TOTAL --}}
                <article class="rounded-xl border border-slate-200 bg-slate-50/80 p-5 transition duration-200 hover:-translate-y-1 hover:shadow-md">

                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-slate-500">
                                Total de citas
                            </p>

                            <h2 id="totalCitas" class="mt-2 text-3xl font-extrabold text-[#063d69]">
                                {{ $citas->count() }}
                            </h2>
                        </div>

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-[#0875bd]">
                            <i class="fa-solid fa-calendar-check text-xl"></i>
                        </div>
                    </div>

                </article>

                {{-- PENDIENTES --}}
                <article class="rounded-xl border border-slate-200 bg-slate-50/80 p-5 transition duration-200 hover:-translate-y-1 hover:shadow-md">

                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-slate-500">
                                Pendientes
                            </p>

                            <h2 id="totalPendientes" class="mt-2 text-3xl font-extrabold text-amber-600">
                                {{ $citas->filter(function ($cita) {
                                    return in_array(mb_strtolower(trim($cita->estado_cita ?? '')), ['pendiente', 'en espera']);
                                })->count() }}
                            </h2>
                        </div>

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-100 text-amber-600">
                            <i class="fa-solid fa-clock text-xl"></i>
                        </div>
                    </div>

                </article>

                {{-- ATENDIDAS --}}
                <article class="rounded-xl border border-slate-200 bg-slate-50/80 p-5 transition duration-200 hover:-translate-y-1 hover:shadow-md">

                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-slate-500">
                                Atendidas
                            </p>

                            <h2 id="totalAtendidas" class="mt-2 text-3xl font-extrabold text-green-600">
                                {{ $citas->filter(function ($cita) {
                                    return mb_strtolower(trim($cita->estado_cita ?? '')) === 'atendida';
                                })->count() }}
                            </h2>
                        </div>

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-green-600">
                            <i class="fa-solid fa-circle-check text-xl"></i>
                        </div>
                    </div>

                </article>

            </section>

            {{-- FILTROS --}}
            <section class="mb-7 rounded-xl border border-slate-200 bg-slate-50/80 p-4 md:p-5">

                <div class="mb-5 flex flex-wrap items-center justify-between gap-3">

                    <div>
                        <h2 class="font-bold text-slate-800">
                            Buscar y filtrar citas
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Utiliza los filtros para encontrar una cita.
                        </p>
                    </div>

                    <span class="rounded-lg bg-blue-100 px-3 py-1.5 text-xs font-bold text-[#0875bd]">
                        <i class="fa-solid fa-filter mr-1"></i>
                        Filtros de agenda
                    </span>

                </div>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-3">

                    {{-- BUSCAR PACIENTE --}}
                    <div>
                        <label for="buscar" class="mb-2 block text-sm font-semibold text-slate-600">
                            Buscar paciente
                        </label>

                        <div class="relative">

                            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>

                            <input
                                type="text"
                                id="buscar"
                                placeholder="Escribe el nombre del paciente..."
                                class="w-full rounded-xl border border-slate-200 bg-white py-3 pl-10 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[#009fd4] focus:ring-2 focus:ring-[#009fd4]/20">

                        </div>
                    </div>

                    {{-- FECHA --}}
                    <div>
                        <label for="fechaFiltro" class="mb-2 block text-sm font-semibold text-slate-600">
                            Fecha
                        </label>

                        <input
                            type="date"
                            id="fechaFiltro"
                            class="w-full rounded-xl border border-slate-200 bg-white px-3 py-3 text-sm text-slate-700 outline-none transition focus:border-[#009fd4] focus:ring-2 focus:ring-[#009fd4]/20">
                    </div>

                    {{-- ESTADO --}}
                    <div>
                        <label for="estadoFiltro" class="mb-2 block text-sm font-semibold text-slate-600">
                            Estado de la cita
                        </label>

                        <select
                            id="estadoFiltro"
                            class="w-full rounded-xl border border-slate-200 bg-white px-3 py-3 text-sm text-slate-700 outline-none transition focus:border-[#009fd4] focus:ring-2 focus:ring-[#009fd4]/20">

                            <option value="">Todos los estados</option>

                            @foreach($citas->pluck('estado_cita')->filter()->unique() as $estado)
                                <option value="{{ mb_strtolower(trim($estado)) }}">
                                    {{ $estado }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                </div>

            </section>

            {{-- TABLA DE CITAS --}}
            <section class="agenda-impresion overflow-hidden rounded-xl border border-slate-200">

                {{-- ENCABEZADO TABLA --}}
                <div class="flex flex-col justify-between gap-4 border-b border-slate-200 bg-white p-5 md:flex-row md:items-center md:px-6">

                    <div>
                        <h2 class="text-lg font-bold text-[#063d69]">
                            Listado de citas
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Citas asignadas al profesional.
                        </p>
                    </div>

                    <button
                        type="button"
                        onclick="window.print()"
                        class="agenda-boton inline-flex items-center justify-center gap-2 rounded-xl bg-[#0875bd] px-5 py-3 text-sm font-bold text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-[#063d69]">

                        <i class="fa-solid fa-print"></i>
                        Imprimir agenda

                    </button>

                </div>

                {{-- TABLA --}}
                <div class="w-full overflow-x-auto">

                    <table id="tablaCitas" class="min-w-full whitespace-nowrap text-left text-sm text-slate-700">

                        <thead class="bg-[#063d69] text-xs uppercase tracking-wider text-white">

                            <tr>
                                <th class="px-5 py-4">Fecha</th>
                                <th class="px-5 py-4">Hora</th>
                                <th class="px-5 py-4">Paciente</th>
                                <th class="px-5 py-4">Servicio</th>
                                <th class="px-5 py-4">Modalidad</th>
                                <th class="px-5 py-4">Estado</th>
                            </tr>

                        </thead>

                        <tbody class="divide-y divide-slate-100 bg-white">

                            @forelse($citas as $cita)

                                @php
                                    $paciente = $cita->usuario;

                                    $nombrePaciente = $paciente
                                        ? trim(
                                            ($paciente->primer_nombre ?? '') . ' ' .
                                            ($paciente->segundo_nombre ?? '') . ' ' .
                                            ($paciente->primer_apellido ?? '') . ' ' .
                                            ($paciente->segundo_apellido ?? '')
                                        )
                                        : 'Paciente no disponible';

                                    $estado = trim($cita->estado_cita ?? 'Sin estado');
                                    $estadoNormalizado = mb_strtolower($estado);

                                    $fecha = $cita->fecha_cita
                                        ? \Carbon\Carbon::parse($cita->fecha_cita)
                                        : null;
                                @endphp

                                <tr
                                    data-paciente="{{ mb_strtolower($nombrePaciente) }}"
                                    data-fecha="{{ $fecha?->format('Y-m-d') }}"
                                    data-estado="{{ $estadoNormalizado }}"
                                    class="transition duration-150 hover:bg-sky-50/70">

                                    {{-- FECHA --}}
                                    <td class="px-5 py-4 text-slate-600">
                                        {{ $fecha?->format('d/m/Y') ?? 'Sin fecha' }}
                                    </td>

                                    {{-- HORA --}}
                                    <td class="px-5 py-4 text-slate-600">
                                        {{ $cita->hora_inicio
                                            ? \Carbon\Carbon::parse($cita->hora_inicio)->format('g:i a')
                                            : 'Sin hora' }}
                                    </td>

                                    {{-- PACIENTE --}}
                                    <td class="px-5 py-4 font-semibold text-[#063d69]">
                                        {{ $nombrePaciente }}
                                    </td>

                                    {{-- SERVICIO --}}
                                    <td class="px-5 py-4">
                                        {{ $cita->servicio?->nombre_servicio ?? 'Sin servicio' }}
                                    </td>

                                    {{-- MODALIDAD --}}
                                    <td class="px-5 py-4">
                                        {{ $cita->modalidad_cita ?? 'No especificada' }}
                                    </td>

                                    {{-- ESTADO --}}
                                    <td class="px-5 py-4">

                                        @if(in_array($estadoNormalizado, ['atendida', 'atendido']))

                                            <span class="inline-flex rounded-full bg-green-100 px-3 py-1.5 text-xs font-bold text-green-700">
                                                {{ $estado }}
                                            </span>

                                        @elseif(in_array($estadoNormalizado, ['pendiente', 'en espera']))

                                            <span class="inline-flex rounded-full bg-amber-100 px-3 py-1.5 text-xs font-bold text-amber-700">
                                                {{ $estado }}
                                            </span>

                                        @elseif($estadoNormalizado === 'cancelada')

                                            <span class="inline-flex rounded-full bg-red-100 px-3 py-1.5 text-xs font-bold text-red-700">
                                                {{ $estado }}
                                            </span>

                                        @else

                                            <span class="inline-flex rounded-full bg-blue-100 px-3 py-1.5 text-xs font-bold text-blue-700">
                                                {{ $estado }}
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6" class="px-5 py-10 text-center">
                                        <div class="flex flex-col items-center">
                                            <i class="fa-solid fa-calendar-xmark mb-3 text-3xl text-slate-300"></i>
                                            <p class="font-semibold text-slate-600">
                                                No tienes citas asignadas actualmente.
                                            </p>
                                        </div>
                                    </td>
                                </tr>

                            @endforelse

                            {{-- SIN RESULTADOS --}}
                            <tr id="sinResultados" class="hidden">
                                <td colspan="6" class="px-5 py-10 text-center">
                                    <i class="fa-solid fa-calendar-xmark mb-3 text-3xl text-slate-300"></i>

                                    <p class="font-semibold text-slate-600">
                                        No se encontraron citas.
                                    </p>

                                    <p class="mt-1 text-sm text-slate-400">
                                        Intenta modificar los filtros seleccionados.
                                    </p>
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </section>

            {{-- PIE --}}
            <footer class="pt-6 text-center text-xs text-slate-400">
                SIGECIR2026 · Renueva IPS · Portal de profesionales
            </footer>

        </div>
    </div>
</div>

{{-- FILTROS E IMPRESIÓN --}}
@push('scripts')

<style>
    @media print {

        body * {
            visibility: hidden !important;
        }

        .agenda-impresion,
        .agenda-impresion * {
            visibility: visible !important;
        }

        .agenda-impresion {
            position: absolute !important;
            left: 0 !important;
            top: 0 !important;
            width: 100% !important;
            margin: 0 !important;
            padding: 10px !important;
            border: none !important;
            box-shadow: none !important;
            background: white !important;
        }

        .agenda-boton {
            display: none !important;
        }

        #tablaCitas {
            width: 100% !important;
            min-width: 0 !important;
            border-collapse: collapse !important;
        }

        #tablaCitas th,
        #tablaCitas td {
            border: 1px solid #999 !important;
            padding: 10px !important;
            font-size: 11px !important;
            white-space: normal !important;
        }

        #tablaCitas thead {
            background: #e6f7fc !important;
            color: #063d69 !important;
        }

        @page {
            size: landscape;
            margin: 1cm;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const buscar = document.getElementById('buscar');
        const fechaFiltro = document.getElementById('fechaFiltro');
        const estadoFiltro = document.getElementById('estadoFiltro');

        const filas = document.querySelectorAll('#tablaCitas tbody tr[data-paciente]');

        const sinResultados = document.getElementById('sinResultados');

        function filtrarCitas() {

            const nombre = buscar.value.toLowerCase().trim();
            const fecha = fechaFiltro.value;
            const estado = estadoFiltro.value;

            let visibles = 0;

            filas.forEach(fila => {

                const paciente = fila.dataset.paciente || '';
                const fechaCita = fila.dataset.fecha || '';
                const estadoCita = fila.dataset.estado || '';

                const coincideNombre = paciente.includes(nombre);
                const coincideFecha = !fecha || fechaCita === fecha;
                const coincideEstado = !estado || estadoCita === estado;

                const mostrar =
                    coincideNombre &&
                    coincideFecha &&
                    coincideEstado;

                fila.style.display = mostrar ? '' : 'none';

                if (mostrar) {
                    visibles++;
                }

            });

            sinResultados.classList.toggle('hidden', visibles !== 0);

        }

        buscar.addEventListener('input', filtrarCitas);
        fechaFiltro.addEventListener('change', filtrarCitas);
        estadoFiltro.addEventListener('change', filtrarCitas);

    });
</script>

@endpush

@endsection
