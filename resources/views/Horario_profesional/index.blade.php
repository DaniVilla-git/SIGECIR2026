@extends('layouts.app')

@section('titulo', 'Horario Profesionales')

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
                        @include('layouts.partials.icons', ['icon' => 'horario'])
                        <span>Gestión de horarios</span>
                    </div>

                    <h1 class="text-3xl font-extrabold tracking-tight text-white">
                        Horarios Profesionales
                    </h1>

                    <p class="mt-2 text-sm text-blue-100">
                        Organiza y consulta la disponibilidad de los profesionales de RENUEVA IPS.
                    </p>
                </div>

                <a href="{{ route('horario_profesional.create') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 font-bold text-[#063d69] shadow-lg transition duration-200 hover:-translate-y-1 hover:bg-blue-50">

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

            {{-- INFORMACIÓN --}}
            <div class="mb-6 flex flex-col gap-3 rounded-xl border border-slate-200 bg-slate-50 p-4 sm:flex-row sm:items-center sm:justify-between">

                <div>
                    <h2 class="font-bold text-slate-800">
                        Disponibilidad profesional
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Consulta los días y las horas asignadas a cada profesional.
                    </p>
                </div>

                <div class="inline-flex w-fit items-center gap-2 rounded-lg bg-blue-100 px-4 py-2 text-sm font-bold text-[#0875bd]">
                    <i class="fa-solid fa-calendar-days"></i>
                    {{ $horario_profesional->count() }} horarios registrados
                </div>

            </div>

            {{-- TABLA --}}
            <div class="overflow-hidden rounded-xl border border-slate-200">

                <div class="overflow-x-auto">

                    <table class="min-w-full text-sm text-slate-700">

                        <thead class="bg-[#063d69] text-xs uppercase tracking-wider text-white">

                            <tr>
                                <th class="px-5 py-4 text-center">ID</th>
                                <th class="px-5 py-4 text-center">Fecha y día</th>
                                <th class="px-5 py-4 text-center">Hora de inicio</th>
                                <th class="px-5 py-4 text-center">Hora de fin</th>
                                <th class="px-5 py-4 text-center">Profesional</th>
                                <th class="px-5 py-4 text-center">Acciones</th>
                            </tr>

                        </thead>

                        <tbody class="divide-y divide-slate-100 bg-white">

                            @forelse ($horario_profesional as $horario)

                                <tr class="text-center transition duration-150 hover:bg-sky-50/70">

                                    {{-- ID --}}
                                    <td class="px-5 py-4 font-semibold text-slate-500">
                                        {{ $horario->id }}
                                    </td>

                                    {{-- FECHA Y DÍA --}}
                                    <td class="px-5 py-4">

                                        <div class="font-bold text-[#063d69]">
                                            {{ ucfirst(\Carbon\Carbon::parse($horario->dia_semana)->locale('es')->translatedFormat('l')) }}
                                        </div>

                                        <div class="mt-1 text-xs text-slate-500">
                                            {{ \Carbon\Carbon::parse($horario->dia_semana)->format('d/m/Y') }}
                                        </div>

                                    </td>

                                    {{-- HORA INICIO --}}
                                    <td class="px-5 py-4">

                                        <span class="inline-flex items-center gap-2 rounded-lg bg-sky-50 px-3 py-2 font-semibold text-[#0875bd]">
                                            <i class="fa-regular fa-clock"></i>
                                            {{ \Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }}
                                        </span>

                                    </td>

                                    {{-- HORA FIN --}}
                                    <td class="px-5 py-4">

                                        <span class="inline-flex items-center gap-2 rounded-lg bg-teal-50 px-3 py-2 font-semibold text-teal-700">
                                            <i class="fa-regular fa-clock"></i>
                                            {{ \Carbon\Carbon::parse($horario->hora_fin)->format('H:i') }}
                                        </span>

                                    </td>

                                    {{-- PROFESIONAL --}}
                                    <td class="px-5 py-4">

                                        <div class="flex items-center justify-center gap-2 font-semibold text-slate-700">
                                            <span class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-100 text-[#0875bd]">
                                                <i class="fa-solid fa-user-doctor"></i>
                                            </span>

                                            {{ $horario->profesionales->nombre_profesional ?? 'Sin profesional asignado' }}
                                        </div>

                                    </td>

                                    {{-- ACCIONES --}}
                                    <td class="px-5 py-4">

                                        <div class="flex items-center justify-center gap-2">

                                            {{-- EDITAR --}}
                                            <a href="{{ route('horario_profesional.edit', $horario->id) }}"
                                                class="rounded-lg bg-blue-50 p-2.5 text-[#0875bd] transition hover:bg-blue-100 hover:text-[#063d69]"
                                                title="Editar horario">

                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>

                                            </a>

                                            {{-- ELIMINAR --}}
                                            <form action="{{ route('horario_profesional.destroy', $horario->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('¿Estás seguro de eliminar este horario?');">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="rounded-lg bg-rose-50 p-2.5 text-rose-600 transition hover:bg-rose-100 hover:text-rose-800"
                                                    title="Eliminar horario">

                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6" class="px-5 py-10 text-center">

                                        <div class="flex flex-col items-center">
                                            <i class="fa-solid fa-calendar-xmark mb-3 text-3xl text-slate-300"></i>

                                            <p class="font-semibold text-slate-600">
                                                No hay horarios profesionales registrados.
                                            </p>

                                            <p class="mt-1 text-sm text-slate-400">
                                                Los horarios que registres aparecerán aquí.
                                            </p>
                                        </div>

                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection