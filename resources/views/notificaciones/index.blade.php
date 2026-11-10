@extends('layouts.app')

@section('titulo')
    Notificaciones
@endsection

@section('content')

<div class="container mx-auto mt-8 px-4 pb-8">

    <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-xl">

        {{-- ENCABEZADO --}}
        <div class="bg-gradient-to-r from-[#063d69] via-[#0875bd] to-[#20a4a7] px-6 py-7">

            <div class="flex flex-col gap-5 md:flex-row md:items-center md:justify-between">

                <div class="flex items-center gap-4">

                    <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-white/15 text-white shadow-inner">
                        @include('layouts.partials.icons', ['icon' => 'notificacion'])
                    </div>

                    <div>
                        <h1 class="text-2xl font-bold text-white md:text-3xl">
                            Listado de Notificaciones
                        </h1>

                        <p class="mt-1 text-sm text-blue-100">
                            Administra las notificaciones registradas en el sistema.
                        </p>
                    </div>

                </div>

                <a href="{{ route('notificaciones.create') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 font-semibold text-[#0875bd] shadow-lg transition duration-200 hover:-translate-y-0.5 hover:bg-blue-50">

                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>

                    Nueva Notificación
                </a>

            </div>

        </div>

        <div class="p-6">

            {{-- MENSAJES --}}
            @if(session('success'))
                <div class="mb-4 flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-700">
                    <i class="fa-solid fa-circle-check"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('actualizar'))
                <div class="mb-4 flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-700">
                    <i class="fa-solid fa-circle-check"></i>
                    {{ session('actualizar') }}
                </div>
            @endif

            @if(session('eliminar'))
                <div class="mb-4 flex items-center gap-3 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-700">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    {{ session('eliminar') }}
                </div>
            @endif

            {{-- RESUMEN --}}
            <div class="mb-6 flex flex-col gap-3 rounded-xl border border-blue-100 bg-blue-50/70 p-4 sm:flex-row sm:items-center sm:justify-between">

                <div class="flex items-center gap-3">
                    <div>
                        <p class="font-bold text-gray-800">
                            Centro de notificaciones
                        </p>
                        <p class="text-sm text-gray-500">
                            Consulta las notificaciones registradas.
                        </p>
                    </div>
                </div>

                <div class="rounded-lg bg-white px-4 py-2 text-center shadow-sm">
                    <p class="text-xs font-medium text-gray-500">
                        Total de notificaciones
                    </p>
                    <p class="text-xl font-bold text-[#0875bd]">
                        {{ $notificaciones->count() }}
                    </p>
                </div>

            </div>

            {{-- TABLA --}}
            <div class="overflow-x-auto rounded-xl border border-gray-200">

                <table class="min-w-full text-sm text-gray-700">

                    <thead class="bg-[#063d69] text-xs uppercase tracking-wider text-white">

                        <tr>
                            <th class="px-5 py-4 text-center">ID</th>
                            <th class="px-5 py-4 text-center">Título notificación</th>
                            <th class="px-5 py-4 text-center">Mensaje notificación</th>
                            <th class="px-5 py-4 text-center">Tipo notificación</th>
                            <th class="px-5 py-4 text-center">Fecha notificación</th>
                            <th class="px-5 py-4 text-center">Nombre del usuario</th>
                            <th class="px-5 py-4 text-center">Acciones</th>
                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse ($notificaciones as $notificacion)

                            <tr class="text-center transition duration-150 hover:bg-blue-50/70">

                                {{-- ID --}}
                                <td class="whitespace-nowrap px-5 py-4 font-semibold text-gray-600">
                                    #{{ $notificacion->id }}
                                </td>

                                {{-- TÍTULO --}}
                                <td class="px-5 py-4 font-semibold text-gray-800">
                                    {{ $notificacion->titulo_notificacion }}
                                </td>

                                {{-- MENSAJE --}}
                                <td class="max-w-xs px-5 py-4 text-gray-600">
                                    {{ $notificacion->mensaje_notificacion }}
                                </td>

                                {{-- TIPO --}}
                                <td class="whitespace-nowrap px-5 py-4">
                                    <span class="inline-flex rounded-lg bg-blue-100 px-3 py-1.5 font-semibold text-[#0875bd]">
                                        {{ $notificacion->tipo_notificacion }}
                                    </span>
                                </td>

                                {{-- FECHA --}}
                                <td class="whitespace-nowrap px-5 py-4 text-gray-600">
                                    <div class="flex items-center justify-center gap-2">
                                        <i class="fa-regular fa-calendar text-[#0875bd]"></i>
                                        {{ $notificacion->fecha_notificacion }}
                                    </div>
                                </td>

                                {{-- NOMBRE DEL USUARIO --}}
                                <td class="px-5 py-4 font-medium text-gray-800">

                                    @if($notificacion->usuario)

                                        <div class="flex items-center justify-center gap-2">
                                            <span class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-50 text-[#0875bd]">
                                                <i class="fa-solid fa-user"></i>
                                            </span>

                                            {{ trim(
                                                $notificacion->usuario->primer_nombre . ' ' .
                                                $notificacion->usuario->segundo_nombre . ' ' .
                                                $notificacion->usuario->primer_apellido . ' ' .
                                                $notificacion->usuario->segundo_apellido
                                            ) }}
                                        </div>

                                    @else

                                        <span class="text-gray-400">
                                            Usuario no encontrado
                                        </span>

                                    @endif

                                </td>

                                {{-- ACCIONES --}}
                                <td class="whitespace-nowrap px-5 py-4">

                                    <div class="flex items-center justify-center gap-2">

                                        {{-- EDITAR --}}
                                        <a href="{{ route('notificaciones.edit', $notificacion->id) }}"
                                            class="rounded-lg bg-blue-50 p-2.5 text-blue-600 transition hover:bg-blue-100 hover:text-blue-800"
                                            title="Editar notificación">

                                            <i class="fa-solid fa-pen-to-square"></i>

                                        </a>

                                        {{-- ELIMINAR --}}
                                        <form action="{{ route('notificaciones.destroy', $notificacion->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('¿Estás seguro de eliminar esta notificación?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="rounded-lg bg-rose-50 p-2.5 text-rose-600 transition hover:bg-rose-100 hover:text-rose-800"
                                                title="Eliminar notificación">

                                                <i class="fa-solid fa-trash-can"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="px-5 py-10 text-center">
                                    <div class="flex flex-col items-center gap-2 text-gray-400">
                                        <i class="fa-solid fa-bell-slash text-3xl"></i>
                                        <p class="font-medium text-gray-500">
                                            No hay notificaciones registradas.
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

@endsection