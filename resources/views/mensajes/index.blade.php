@extends('layouts.app')

@section('titulo')
    Mensajes
@endsection

@section('content')

<div class="container mx-auto mt-10 px-4 pb-10">

    <div class="max-w-7xl mx-auto">

        {{-- ENCABEZADO --}}
        <div class="bg-gradient-to-r from-[#063d69] via-[#0875bd] to-[#20a4a7]
                    rounded-2xl shadow-lg p-6 md:p-8 mb-6 text-white">

            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-5">

                <div class="flex items-center gap-4">

                    <div class="flex h-14 w-14 shrink-0 items-center justify-center
                                rounded-2xl bg-white/20 backdrop-blur-sm">

                        @include('layouts.partials.icons', ['icon' => 'mensaje'])

                    </div>

                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold">
                            Listado de Mensajes
                        </h2>

                        <p class="text-sm text-blue-100 mt-1">
                            Administra y consulta los mensajes registrados en SIGECIR.
                        </p>
                    </div>

                </div>

                <a href="{{ route('mensajes.create') }}"
                   class="inline-flex items-center justify-center gap-2
                          bg-white text-[#0875bd] hover:bg-blue-50
                          font-bold px-5 py-3 rounded-xl shadow-md
                          transition duration-200">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>

                    Nuevo mensaje
                </a>

            </div>

        </div>

        {{-- MENSAJE DE ÉXITO --}}
        @if(session('success'))

            <div class="flex items-center gap-3 bg-green-50 border border-green-200
                        text-green-700 px-5 py-4 rounded-xl mb-6 shadow-sm">

                <i class="fa-solid fa-circle-check text-xl"></i>

                <span class="font-medium">
                    {{ session('success') }}
                </span>

            </div>

        @endif

        {{-- INFORMACIÓN --}}
        <div class="bg-white border border-gray-100 rounded-2xl
                    shadow-sm p-5 mb-6">

            <div class="flex items-center gap-4">
                <div>
                    <h3 class="font-bold text-gray-800">
                        Gestión de mensajes
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Consulta los mensajes relacionados con las citas,
                        los profesionales y los usuarios.
                    </p>
                </div>

            </div>

        </div>

        {{-- TABLA DE MENSAJES --}}
        <div class="bg-white shadow-xl rounded-2xl border border-gray-100
                    overflow-hidden">

            <div class="flex flex-col sm:flex-row justify-between
                        items-start sm:items-center gap-3 p-6">

                <div>
                    <h3 class="text-xl font-bold text-gray-800">
                        Mensajes registrados
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Información de los mensajes almacenados en el sistema.
                    </p>
                </div>

                <span class="inline-flex items-center gap-2 bg-blue-50
                             text-[#0875bd] px-4 py-2 rounded-xl
                             text-sm font-semibold">

                    <i class="fa-regular fa-message"></i>
                    Total: {{ $mensajes->count() }}

                </span>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left text-gray-600">

                    <thead class="bg-[#063d69] text-white uppercase text-xs">

                        <tr>
                            <th class="px-5 py-4">Mensaje</th>
                            <th class="px-5 py-4">Tipo de emisor</th>
                            <th class="px-5 py-4">Fecha</th>
                            <th class="px-5 py-4">Cita</th>
                            <th class="px-5 py-4">Profesional</th>
                            <th class="px-5 py-4">Usuario</th>
                            <th class="px-5 py-4 text-center">Acciones</th>
                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse($mensajes as $mensaje)

                            <tr class="hover:bg-blue-50/50 transition duration-150">

                                {{-- MENSAJE --}}
                                <td class="px-5 py-4 font-medium text-gray-800
                                           min-w-[200px]">
                                    {{ $mensaje->mensaje }}
                                </td>

                                {{-- TIPO DE EMISOR --}}
                                <td class="px-5 py-4">

                                    <span class="inline-flex items-center px-3 py-1
                                                 rounded-lg bg-blue-50 text-[#0875bd]
                                                 text-xs font-semibold">

                                        {{ $mensaje->tipo_emisor }}

                                    </span>

                                </td>

                                {{-- FECHA --}}
                                <td class="px-5 py-4 whitespace-nowrap">

                                    <div class="flex items-center gap-2 text-gray-600">

                                        <i class="fa-regular fa-calendar text-[#0875bd]"></i>

                                        {{ $mensaje->fecha_mensaje }}

                                    </div>

                                </td>

                                {{-- CITA --}}
                                <td class="px-5 py-4">

                                    <span class="inline-flex items-center gap-2
                                                 text-gray-700 font-medium">

                                        <i class="fa-regular fa-calendar-check text-[#0875bd]"></i>

                                        {{ $mensaje->id_cita }}

                                    </span>

                                </td>

                                {{-- PROFESIONAL --}}
                                <td class="px-5 py-4">

                                    <div class="flex items-center gap-2 min-w-[150px]">

                                        <div class="flex h-8 w-8 shrink-0 items-center
                                                    justify-center rounded-full
                                                    bg-cyan-50 text-cyan-700">

                                            <i class="fa-solid fa-user-doctor text-xs"></i>

                                        </div>

                                        <span class="text-gray-700">
                                            {{ $mensaje->profesional->nombre_profesional ?? '' }}
                                            {{ $mensaje->profesional->apellido_profesional ?? '' }}
                                        </span>

                                    </div>

                                </td>

                                {{-- USUARIO --}}
                                <td class="px-5 py-4">

                                    <div class="flex items-center gap-2 min-w-[160px]">

                                        <div class="flex h-8 w-8 shrink-0 items-center
                                                    justify-center rounded-full
                                                    bg-blue-50 text-[#0875bd]">

                                            <i class="fa-solid fa-user text-xs"></i>

                                        </div>

                                        <span class="text-gray-700">

                                            {{ $mensaje->usuario->primer_nombre ?? '' }}
                                            {{ $mensaje->usuario->segundo_nombre ?? '' }}
                                            {{ $mensaje->usuario->primer_apellido ?? '' }}
                                            {{ $mensaje->usuario->segundo_apellido ?? '' }}

                                        </span>

                                    </div>

                                </td>

                                {{-- ACCIONES --}}
                                <td class="px-5 py-4">

                                    <div class="flex justify-center items-center gap-2">

                                        {{-- EDITAR --}}
                                        <a href="{{ route('mensajes.edit', $mensaje->id) }}"
                                           class="inline-flex items-center justify-center
                                                  w-9 h-9 rounded-lg bg-[#0875bd]
                                                  hover:bg-[#063d69] text-white
                                                  shadow-sm transition"
                                           title="Editar mensaje">

                                            <i class="fa-regular fa-pen-to-square"></i>

                                        </a>

                                        {{-- ELIMINAR --}}
                                        <form action="{{ route('mensajes.destroy', $mensaje->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('¿Está seguro de eliminar este mensaje?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="inline-flex items-center justify-center
                                                           w-9 h-9 rounded-lg bg-rose-500
                                                           hover:bg-rose-600 text-white
                                                           shadow-sm transition"
                                                    title="Eliminar mensaje">

                                                <i class="fa-regular fa-trash-can"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="px-5 py-14 text-center">

                                    <div class="flex flex-col items-center">

                                        <div class="flex h-16 w-16 items-center
                                                    justify-center rounded-full
                                                    bg-blue-50 text-[#0875bd] mb-4">

                                            <i class="fa-regular fa-comments text-3xl"></i>

                                        </div>

                                        <p class="text-gray-700 font-bold text-base">
                                            No hay mensajes registrados
                                        </p>

                                        <p class="text-gray-400 text-sm mt-1">
                                            Cuando se registre un mensaje, aparecerá aquí.
                                        </p>

                                    </div>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- PIE DE TABLA --}}
            @if($mensajes->count() > 0)

                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">

                    <p class="text-sm text-gray-500">
                        Mostrando
                        <span class="font-bold text-[#0875bd]">
                            {{ $mensajes->count() }}
                        </span>
                        mensajes registrados.
                    </p>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection