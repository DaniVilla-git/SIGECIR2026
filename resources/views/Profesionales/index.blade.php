@extends('layouts.app')

@section('titulo', 'Profesionales')

@section('content')

<div class="container mx-auto max-w-full px-4 py-8">

    {{-- CONTENEDOR PRINCIPAL --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl">

        {{-- ENCABEZADO --}}
        <div class="relative overflow-hidden bg-gradient-to-r from-[#063d69] via-[#0875bd] to-[#20a4a7] px-6 py-8 md:px-8">

            <div class="absolute -right-10 -top-16 h-52 w-52 rounded-full bg-white/10"></div>
            <div class="absolute -bottom-20 right-40 h-48 w-48 rounded-full bg-white/10"></div>

            <div class="relative flex flex-col justify-between gap-5 lg:flex-row lg:items-center">

                <div>
                    <div class="mb-3 flex items-center gap-2 text-sm font-medium text-blue-100">
                        @include('layouts.partials.icons', ['icon' => 'profesional'])
                        <span>Gestión de profesionales</span>
                    </div>

                    <h1 class="text-3xl font-extrabold tracking-tight text-white">
                        Listado de Profesionales
                    </h1>

                    <p class="mt-2 text-sm text-blue-100">
                        Administra la información del equipo profesional de RENUEVA IPS.
                    </p>
                </div>

                <a href="{{ route('profesionales.create') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 font-bold text-[#063d69] shadow-lg transition duration-200 hover:-translate-y-1 hover:bg-blue-50">

                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>

                    Nuevo profesional
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
                        Equipo profesional
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Consulta las especialidades, consultorios y firmas digitales.
                    </p>
                </div>

                <div class="inline-flex w-fit items-center gap-2 rounded-lg bg-blue-100 px-4 py-2 text-sm font-bold text-[#0875bd]">
                    <i class="fa-solid fa-user-doctor"></i>
                    {{ $profesionales->count() }} profesionales
                </div>

            </div>

            {{-- TABLA --}}
            <div class="overflow-hidden rounded-xl border border-slate-200">

                <div class="overflow-x-auto">

                    <table class="w-full min-w-[1050px] text-sm text-slate-700">

                        <thead class="bg-[#063d69] text-xs uppercase tracking-wider text-white">

                            <tr>
                                <th class="px-5 py-4 text-center">ID</th>
                                <th class="px-5 py-4 text-left">Nombre</th>
                                <th class="px-5 py-4 text-left">Apellido</th>
                                <th class="px-5 py-4 text-left">Especialidad</th>
                                <th class="px-5 py-4 text-center">Consultorio</th>
                                <th class="px-5 py-4 text-left">Correo electrónico</th>
                                <th class="px-5 py-4 text-center">Firma digital</th>
                                <th class="px-5 py-4 text-center">Acciones</th>
                            </tr>

                        </thead>

                        <tbody class="divide-y divide-slate-100 bg-white">

                            @forelse ($profesionales as $profesional)

                                <tr class="transition duration-150 hover:bg-sky-50/70">

                                    {{-- ID --}}
                                    <td class="px-5 py-4 text-center font-semibold text-slate-500">
                                        {{ $profesional->id }}
                                    </td>

                                    {{-- NOMBRE --}}
                                    <td class="px-5 py-4 font-bold text-[#063d69]">
                                        {{ $profesional->nombre_profesional }}
                                    </td>

                                    {{-- APELLIDO --}}
                                    <td class="px-5 py-4">
                                        {{ $profesional->apellido_profesional }}
                                    </td>

                                    {{-- ESPECIALIDAD --}}
                                    <td class="px-5 py-4">
                                        <span class="inline-flex rounded-lg bg-sky-50 px-3 py-1.5 font-medium text-[#0875bd]">
                                            {{ $profesional->especialidad }}
                                        </span>
                                    </td>

                                    {{-- CONSULTORIO --}}
                                    <td class="px-5 py-4 text-center">
                                        {{ $profesional->consultorio }}
                                    </td>

                                    {{-- CORREO --}}
                                    <td class="px-5 py-4 text-slate-600">
                                        {{ $profesional->correo }}
                                    </td>

                                    {{-- FIRMA DIGITAL --}}
                                    <td class="px-5 py-4 text-center">

                                        @if($profesional->firma)

                                            <div class="flex justify-center">
                                                <div class="flex h-20 w-32 items-center justify-center overflow-hidden rounded-xl border border-slate-200 bg-slate-50 p-2">
                                                    <img
                                                        src="{{ asset($profesional->firma) }}"
                                                        alt="Firma de {{ $profesional->nombre_profesional }}"
                                                        class="h-full w-full object-contain"
                                                    >
                                                </div>
                                            </div>

                                        @else

                                            <span class="inline-flex items-center gap-1 rounded-lg bg-slate-100 px-3 py-2 text-xs font-medium text-slate-500">
                                                <i class="fa-solid fa-file-signature"></i>
                                                Sin firma
                                            </span>

                                        @endif

                                    </td>

                                    {{-- ACCIONES --}}
                                    <td class="px-5 py-4">

                                        <div class="flex items-center justify-center gap-2">

                                            {{-- EDITAR --}}
                                            <a href="{{ route('profesionales.edit', $profesional->id) }}"
                                                class="rounded-lg bg-blue-50 p-2.5 text-[#0875bd] transition hover:bg-blue-100 hover:text-[#063d69]"
                                                title="Editar profesional"
                                                aria-label="Editar profesional">

                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>

                                            </a>

                                            {{-- ELIMINAR --}}
                                            <form
                                                action="{{ route('profesionales.destroy', $profesional->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('¿Estás seguro de eliminar este profesional?');">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="rounded-lg bg-rose-50 p-2.5 text-rose-600 transition hover:bg-rose-100 hover:text-rose-800"
                                                    title="Eliminar profesional"
                                                    aria-label="Eliminar profesional">

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
                                    <td colspan="8" class="px-5 py-10 text-center">

                                        <div class="flex flex-col items-center">
                                            <i class="fa-solid fa-user-doctor mb-3 text-3xl text-slate-300"></i>

                                            <p class="font-semibold text-slate-600">
                                                No hay profesionales registrados.
                                            </p>

                                            <p class="mt-1 text-sm text-slate-400">
                                                Los profesionales que registres aparecerán aquí.
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