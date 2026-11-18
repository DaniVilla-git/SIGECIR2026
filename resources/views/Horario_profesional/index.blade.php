@extends('layouts.app')

@section('titulo', 'Horario Profesionales')

@section('content')

<div class="container mx-auto mt-8 px-4 pb-10">

    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl">

        {{-- ENCABEZADO --}}
        <div class="relative overflow-hidden bg-gradient-to-r from-[#063d69] via-[#0875bd] to-[#20a4a7] px-6 py-8 md:px-8">

            <div class="absolute -right-10 -top-16 h-52 w-52 rounded-full bg-white/10"></div>
            <div class="absolute -bottom-20 right-40 h-48 w-48 rounded-full bg-white/10"></div>

            <div class="relative flex flex-col justify-between gap-5 md:flex-row md:items-center">

                <div>
                    <div class="mb-3 flex items-center gap-2 text-sm font-medium text-blue-100">
                        @include('layouts.partials.icons', ['icon' => 'horario'])
                        <span>Gestión de horarios</span>
                    </div>

                    <h1 class="text-3xl font-extrabold tracking-tight text-white">
                        Horarios Profesionales
                    </h1>

                    <p class="mt-2 text-sm text-blue-100">
                        Organiza y consulta la disponibilidad mensual de cada profesional de RENUEVA IPS.
                    </p>
                </div>

                <a href="{{ route('horario_profesional.create') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 font-bold text-[#063d69] shadow-lg transition hover:-translate-y-1 hover:bg-blue-50">

                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>

                    Nuevo horario
                </a>

            </div>
        </div>

        <div class="p-5 md:p-8">

            {{-- MENSAJES --}}
            @if(session('success'))
                <div class="mb-5 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-emerald-800">
                    <i class="fa-solid fa-circle-check text-xl"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('actualizar'))
                <div class="mb-5 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-emerald-800">
                    <i class="fa-solid fa-circle-check text-xl"></i>
                    <span>{{ session('actualizar') }}</span>
                </div>
            @endif

            @if(session('eliminar'))
                <div class="mb-5 flex items-center gap-3 rounded-xl border border-rose-200 bg-rose-50 px-5 py-4 text-rose-800">
                    <i class="fa-solid fa-circle-exclamation text-xl"></i>
                    <span>{{ session('eliminar') }}</span>
                </div>
            @endif

            {{-- FILTRO POR PROFESIONAL --}}
            <div class="mb-6 rounded-xl border border-slate-200 bg-slate-50 p-5">

                <div class="mb-4">
                    <h2 class="font-bold text-slate-800">
                        Consultar disponibilidad
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Selecciona un profesional para visualizar su calendario mensual.
                    </p>
                </div>

                <form action="{{ route('horario_profesional.index') }}" method="GET"
                    class="flex flex-col gap-3 sm:flex-row sm:items-end">

                    <div class="w-full sm:max-w-md">

                        <label for="profesional" class="mb-2 block text-sm font-semibold text-slate-700">
                            Profesional
                        </label>

                        <select name="profesional" id="profesional"
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700 outline-none focus:border-[#0875bd] focus:ring-2 focus:ring-blue-100">

                            <option value="">Seleccione un profesional</option>

                            @foreach($profesionales as $profesional)

                                <option value="{{ $profesional->id }}"
                                    {{ (string)$idProfesional === (string)$profesional->id ? 'selected' : '' }}>

                                    {{ $profesional->nombre_profesional }}
                                    {{ $profesional->apellido_profesional ?? '' }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <input type="hidden" name="mes" value="{{ $mes }}">

                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#0875bd] px-5 py-3 font-bold text-white transition hover:bg-[#063d69]">

                        <i class="fa-solid fa-magnifying-glass"></i>
                        Consultar
                    </button>

                </form>
            </div>

            @if($idProfesional)

                {{-- CALENDARIO --}}
                <div class="overflow-hidden rounded-xl border border-slate-200">

                    {{-- ENCABEZADO DEL CALENDARIO --}}
                    <div class="flex flex-col justify-between gap-4 bg-[#063d69] px-5 py-5 text-white sm:flex-row sm:items-center">

                        <div>
                            <h2 class="text-xl font-bold capitalize">
                                {{ $fechaMes->locale('es')->translatedFormat('F Y') }}
                            </h2>

                            <p class="mt-1 text-sm text-blue-100">
                                Calendario mensual del profesional seleccionado.
                            </p>
                        </div>

                        @php
                            $mesAnterior = $fechaMes->copy()->subMonth()->format('Y-m');
                            $mesSiguiente = $fechaMes->copy()->addMonth()->format('Y-m');
                        @endphp

                        <div class="flex items-center gap-2">

                            <a href="{{ route('horario_profesional.index', [
                                'profesional' => $idProfesional,
                                'mes' => $mesAnterior
                            ]) }}"
                                class="rounded-lg bg-white/10 px-4 py-2 transition hover:bg-white/20"
                                title="Mes anterior">

                                <i class="fa-solid fa-chevron-left"></i>
                            </a>

                            <a href="{{ route('horario_profesional.index', [
                                'profesional' => $idProfesional,
                                'mes' => now()->format('Y-m')
                            ]) }}"
                                class="rounded-lg bg-white/10 px-4 py-2 text-sm font-semibold transition hover:bg-white/20">

                                Hoy
                            </a>

                            <a href="{{ route('horario_profesional.index', [
                                'profesional' => $idProfesional,
                                'mes' => $mesSiguiente
                            ]) }}"
                                class="rounded-lg bg-white/10 px-4 py-2 transition hover:bg-white/20"
                                title="Mes siguiente">

                                <i class="fa-solid fa-chevron-right"></i>
                            </a>

                        </div>
                    </div>

                    <div class="p-3 sm:p-5">

                        {{-- LEYENDA --}}
                        <div class="mb-5 flex flex-wrap gap-4 text-xs font-semibold text-slate-600">

                            <div class="flex items-center gap-2">
                                <span class="h-3 w-3 rounded-full bg-emerald-500"></span>
                                Disponible
                            </div>

                            <div class="flex items-center gap-2">
                                <span class="h-3 w-3 rounded-full bg-rose-500"></span>
                                Con citas
                            </div>

                            <div class="flex items-center gap-2">
                                <span class="h-3 w-3 rounded-full bg-slate-300"></span>
                                Sin horario
                            </div>

                        </div>

                        {{-- DÍAS DE LA SEMANA --}}
                        <div class="grid grid-cols-7 gap-1 sm:gap-2">

                            @foreach(['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'] as $dia)

                                <div class="py-3 text-center text-xs font-extrabold uppercase text-slate-500 sm:text-sm">
                                    {{ $dia }}
                                </div>

                            @endforeach

                            {{-- DÍAS DEL MES --}}
                            @foreach($calendario as $dia)

                                @php
                                    $seleccionado = $fechaSeleccionada === $dia['fecha'];

                                    $clase = match($dia['estado']) {
                                        'disponible' => 'border-emerald-200 bg-emerald-50 hover:bg-emerald-100',
                                        'ocupado' => 'border-rose-200 bg-rose-50 hover:bg-rose-100',
                                        default => 'border-slate-200 bg-slate-50 hover:bg-slate-100'
                                    };

                                    $colorNumero = match($dia['estado']) {
                                        'disponible' => 'text-emerald-800',
                                        'ocupado' => 'text-rose-800',
                                        default => 'text-slate-500'
                                    };
                                @endphp

                                <a href="{{ route('horario_profesional.index', [
                                    'profesional' => $idProfesional,
                                    'mes' => $mes,
                                    'fecha' => $dia['fecha']
                                ]) }}"
                                    class="relative flex min-h-20 flex-col items-center justify-center rounded-xl border p-1 transition sm:min-h-24 sm:p-3
                                    {{ $clase }}
                                    {{ $seleccionado ? 'ring-2 ring-[#0875bd] ring-offset-2' : '' }}
                                    {{ !$dia['es_mes_actual'] ? 'opacity-40' : '' }}">

                                    <span class="text-base font-extrabold {{ $colorNumero }}">
                                        {{ $dia['numero'] }}
                                    </span>

                                    @if($dia['estado'] === 'disponible')
                                        <span class="mt-1 hidden text-[10px] font-bold text-emerald-700 sm:block">
                                            Disponible
                                        </span>
                                        <span class="mt-1 h-2 w-2 rounded-full bg-emerald-500 sm:hidden"></span>

                                    @elseif($dia['estado'] === 'ocupado')
                                        <span class="mt-1 hidden text-[10px] font-bold text-rose-700 sm:block">
                                            Con citas
                                        </span>
                                        <span class="mt-1 h-2 w-2 rounded-full bg-rose-500 sm:hidden"></span>

                                    @else
                                        <span class="mt-1 hidden text-[10px] font-bold text-slate-500 sm:block">
                                            Sin horario
                                        </span>
                                        <span class="mt-1 h-2 w-2 rounded-full bg-slate-400 sm:hidden"></span>
                                    @endif

                                </a>

                            @endforeach

                        </div>

                    </div>
                </div>

                {{-- DETALLE DEL DÍA --}}
                <div class="mt-7 overflow-hidden rounded-xl border border-slate-200">

                    <div class="bg-slate-50 px-5 py-4">

                        <h3 class="font-bold text-slate-800">
                            Detalle del día seleccionado
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            {{ \Carbon\Carbon::parse($fechaSeleccionada)->locale('es')->translatedFormat('l, d \de F \de Y') }}
                        </p>

                    </div>

                    <div class="grid grid-cols-1 gap-5 p-5 lg:grid-cols-2">

                        {{-- HORARIOS REGISTRADOS --}}
                        <div>

                            <h4 class="mb-3 flex items-center gap-2 font-bold text-[#0875bd]">
                                <i class="fa-regular fa-clock"></i>
                                Horarios de atención
                            </h4>

                            <div class="overflow-x-auto rounded-lg border border-slate-200">

                                <table class="min-w-full text-sm">

                                    <thead class="bg-[#063d69] text-white">
                                        <tr>
                                            <th class="px-3 py-3 text-left">Inicio</th>
                                            <th class="px-3 py-3 text-left">Fin</th>
                                            <th class="px-3 py-3 text-center">Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-slate-100 bg-white">

                                        @forelse($horariosSeleccionados as $horario)

                                            <tr>
                                                <td class="px-3 py-3 font-semibold text-slate-700">
                                                    {{ \Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }}
                                                </td>

                                                <td class="px-3 py-3 font-semibold text-slate-700">
                                                    {{ \Carbon\Carbon::parse($horario->hora_fin)->format('H:i') }}
                                                </td>

                                                <td class="px-3 py-3">
                                                    <div class="flex justify-center gap-2">

                                                        <a href="{{ route('horario_profesional.edit', $horario->id) }}"
                                                            class="rounded-lg bg-blue-50 p-2 text-[#0875bd] transition hover:bg-blue-100"
                                                            title="Editar horario">
                                                            <i class="fa-solid fa-pen"></i>
                                                        </a>

                                                        <form action="{{ route('horario_profesional.destroy', $horario->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('¿Estás seguro de eliminar este horario?');">

                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit"
                                                                class="rounded-lg bg-rose-50 p-2 text-rose-600 transition hover:bg-rose-100"
                                                                title="Eliminar horario">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>

                                                        </form>

                                                    </div>
                                                </td>
                                            </tr>

                                        @empty

                                            <tr>
                                                <td colspan="3" class="px-3 py-6 text-center text-sm text-slate-500">
                                                    No hay horarios registrados para este día.
                                                </td>
                                            </tr>

                                        @endforelse

                                    </tbody>

                                </table>
                            </div>

                        </div>

                        {{-- CITAS DEL DÍA --}}
                        <div>

                            <h4 class="mb-3 flex items-center gap-2 font-bold text-rose-600">
                                <i class="fa-solid fa-calendar-check"></i>
                                Citas registradas
                            </h4>

                            <div class="overflow-x-auto rounded-lg border border-slate-200">

                                <table class="min-w-full text-sm">

                                    <thead class="bg-rose-600 text-white">
                                        <tr>
                                            <th class="px-3 py-3 text-left">Hora</th>
                                            <th class="px-3 py-3 text-left">Estado</th>
                                            <th class="px-3 py-3 text-left">Modalidad</th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-slate-100 bg-white">

                                        @forelse($citasSeleccionadas as $cita)

                                            <tr>

                                                <td class="whitespace-nowrap px-3 py-3 font-semibold text-slate-700">
                                                    {{ \Carbon\Carbon::parse($cita->hora_inicio)->format('H:i') }}
                                                    -
                                                    {{ \Carbon\Carbon::parse($cita->hora_fin)->format('H:i') }}
                                                </td>

                                                <td class="px-3 py-3">
                                                    <span class="inline-flex rounded-full bg-rose-50 px-2 py-1 text-xs font-bold text-rose-700">
                                                        {{ $cita->estado_cita }}
                                                    </span>
                                                </td>

                                                <td class="px-3 py-3 text-slate-600">
                                                    {{ $cita->modalidad_cita }}
                                                </td>

                                            </tr>

                                        @empty

                                            <tr>
                                                <td colspan="3" class="px-3 py-6 text-center text-sm text-slate-500">
                                                    No hay citas registradas para este día.
                                                </td>
                                            </tr>

                                        @endforelse

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>
                </div>

            @else

                {{-- MENSAJE INICIAL --}}
                <div class="rounded-xl border-2 border-dashed border-slate-200 px-5 py-14 text-center">

                    <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-blue-50 text-3xl text-[#0875bd]">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>

                    <h3 class="text-lg font-bold text-slate-700">
                        Consulta el calendario de un profesional
                    </h3>

                    <p class="mx-auto mt-2 max-w-md text-sm text-slate-500">
                        Selecciona un profesional en el filtro para visualizar sus días disponibles, los días con citas y sus horarios de atención.
                    </p>

                </div>

            @endif

        </div>
    </div>
</div>

@endsection