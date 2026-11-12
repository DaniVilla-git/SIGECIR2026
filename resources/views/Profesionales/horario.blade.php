@extends('profesionales.layouts.appProfesional')

@section('title', 'Mi horario')

@section('content')

@php
    use Carbon\Carbon;

    // Organizar los horarios por día
    $horariosPorDia = $horarios->groupBy(function ($horario) {
        return mb_strtolower(trim($horario->dia_semana));
    });

    // Orden de los días de la semana
    $ordenDias = [
        'lunes',
        'martes',
        'miércoles',
        'miercoles',
        'jueves',
        'viernes',
        'sábado',
        'sabado',
        'domingo'
    ];

    $horariosOrdenados = $horariosPorDia->sortBy(function ($registros, $dia) use ($ordenDias) {
        return array_search($dia, $ordenDias) !== false
            ? array_search($dia, $ordenDias)
            : 99;
    });

    // Cantidad de días asignados
    $diasAtencion = $horariosPorDia->count();


    // Encontrar la primera hora de inicio
    $primerHorario = $horarios->sortBy('hora_inicio')->first();

    $horaInicio = $primerHorario
        ? Carbon::parse($primerHorario->hora_inicio)->format('h:i A')
        : 'No asignada';
@endphp

<div class="container mx-auto mt-8 space-y-6 px-4 pb-10">

    {{-- ENCABEZADO --}}
    <header class="overflow-hidden rounded-2xl bg-gradient-to-r from-[#063d69] via-[#0875bd] to-[#20a4a7] px-6 py-7 text-white shadow-xl">

        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

            <div>
                <h1 class="text-2xl font-bold sm:text-3xl">
                    <i class="fa-solid fa-calendar-week mr-2"></i>
                    Mi horario
                </h1>

                <p class="mt-2 text-sm text-blue-100">
                    Consulta los días y las horas asignadas para tu atención profesional.
                </p>
            </div>

            <div class="inline-flex w-fit items-center gap-2 rounded-xl border border-white/20 bg-white/10 px-4 py-3 text-sm text-white shadow-sm">
                <i class="fa-regular fa-calendar"></i>

                {{ now()->locale('es')->translatedFormat('l, d \d\e F \d\e Y') }}
            </div>

        </div>
    </header>

    
    <section class="mx-auto grid max-w-4xl grid-cols-1 gap-5 sm:grid-cols-2">

        {{-- DÍAS DE ATENCIÓN --}}
        <article class="flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-lg transition hover:-translate-y-1 hover:shadow-xl">

            <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-[#e6f7fc] text-2xl text-[#0875bd]">
                <i class="fa-solid fa-calendar-check"></i>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-[#063d69]">
                    {{ $diasAtencion }}
                </h2>

                <p class="text-sm text-slate-500">
                    Días de atención
                </p>
            </div>

        </article>

        {{-- HORA DE INICIO --}}
        <article class="flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-lg transition hover:-translate-y-1 hover:shadow-xl">

            <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-blue-50 text-2xl text-blue-700">
                <i class="fa-solid fa-calendar-day"></i>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-[#063d69]">
                    {{ $horaInicio }}
                </h2>

                <p class="text-sm text-slate-500">
                    Primera hora de atención
                </p>
            </div>

        </article>

    </section>

    {{-- TABLA DE HORARIOS --}}
    <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl">

        {{-- ENCABEZADO DE LA TABLA --}}
        <div class="flex flex-col justify-between gap-3 border-b border-slate-200 px-5 py-5 md:px-6 sm:flex-row sm:items-center">

            <div>
                <h2 class="flex items-center gap-2 text-lg font-bold text-[#063d69]">
                    <i class="fa-solid fa-calendar-week text-[#0875bd]"></i>
                    Horario asignado
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Distribución semanal de tus jornadas de atención.
                </p>
            </div>

            <span class="inline-flex w-fit items-center gap-2 rounded-full bg-[#e6f7fc] px-4 py-2 text-xs font-bold text-[#0860a5]">
                <i class="fa-solid fa-eye"></i>
                Solo consulta
            </span>

        </div>

        {{-- CONTENIDO DE LA TABLA --}}
        <div class="overflow-x-auto">

            <table class="w-full min-w-[650px] text-left">

                <thead class="bg-[#063d69] text-white">

                    <tr>
                        <th class="px-5 py-4 text-xs font-bold uppercase">
                            Día
                        </th>

                        <th class="px-5 py-4 text-xs font-bold uppercase">
                            Hora de inicio
                        </th>

                        <th class="px-5 py-4 text-xs font-bold uppercase">
                            Hora de finalización
                        </th>

                        <th class="px-5 py-4 text-xs font-bold uppercase">
                            Estado
                        </th>
                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100 text-sm">

                    @forelse($horariosOrdenados as $dia => $registros)

                        @foreach($registros as $horario)

                            <tr class="transition hover:bg-[#e6f7fc]/60">

                                {{-- DÍA --}}
                                <td class="px-5 py-4 font-bold capitalize text-[#063d69]">

                                    {{ $horario->dia_semana }}

                                </td>

                                {{-- HORA DE INICIO --}}
                                <td class="px-5 py-4 font-semibold text-[#0875bd]">

                                    <i class="fa-regular fa-clock mr-1"></i>

                                    {{ Carbon::parse($horario->hora_inicio)->format('h:i A') }}

                                </td>

                                {{-- HORA FINAL --}}
                                <td class="px-5 py-4 font-semibold text-[#0875bd]">

                                    <i class="fa-regular fa-clock mr-1"></i>

                                    {{ Carbon::parse($horario->hora_fin)->format('h:i A') }}

                                </td>

                                {{-- ESTADO --}}
                                <td class="px-5 py-4">

                                    <span class="inline-flex items-center gap-1 rounded-full bg-green-100 px-3 py-1.5 text-xs font-bold text-green-700">

                                        <i class="fa-solid fa-circle-check"></i>

                                        Asignado

                                    </span>

                                </td>

                            </tr>

                        @endforeach

                    @empty

                        <tr>
                            <td colspan="4" class="px-5 py-12 text-center">

                                <div class="flex flex-col items-center">

                                    <div class="mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-[#e6f7fc] text-3xl text-[#0875bd]">
                                        <i class="fa-regular fa-calendar-xmark"></i>
                                    </div>

                                    <h3 class="text-lg font-bold text-[#063d69]">
                                        No tienes horarios asignados
                                    </h3>

                                    <p class="mt-2 max-w-md text-sm text-slate-500">
                                        Actualmente no hay horarios registrados para tu perfil.
                                        Cuando el administrador te asigne un horario, aparecerá aquí.
                                    </p>

                                </div>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- INFORMACIÓN DE HORARIOS --}}
        <div class="p-5 md:p-6">

            <div class="flex items-start gap-4 rounded-xl border border-blue-100 bg-[#e6f7fc] p-4">

                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-white text-xl text-[#0875bd]">
                    <i class="fa-solid fa-stopwatch"></i>
                </div>

                <div>

                    <h3 class="font-bold text-[#063d69]">
                        Información sobre tu jornada
                    </h3>

                    <p class="mt-1 text-sm leading-relaxed text-slate-600">
                        Los horarios mostrados corresponden a los períodos de atención
                        registrados por el administrador. Si se modifica tu horario,
                        los cambios se reflejarán automáticamente en esta sección.
                    </p>

                </div>

            </div>

        </div>

    </section>

    {{-- INFORMACIÓN IMPORTANTE --}}
    <section class="flex items-start gap-4 rounded-xl border border-blue-100 border-l-4 border-l-[#0875bd] bg-blue-50 p-5">

        <div class="mt-1 text-xl text-[#0875bd]">
            <i class="fa-solid fa-circle-info"></i>
        </div>

        <div class="text-sm leading-relaxed text-slate-600">

            <h3 class="mb-1 font-bold text-[#063d69]">
                Información importante
            </h3>

            Tu horario es administrado por el personal autorizado de SIGECIR.
            Desde este apartado puedes consultar los días y las horas asignadas,
            pero no puedes realizar modificaciones.

        </div>

    </section>

    {{-- PIE DE PÁGINA --}}
    <footer class="py-4 text-center text-xs text-slate-400">
        SIGECIR2026 · Renueva IPS · Portal de profesionales
    </footer>

</div>

@endsection
