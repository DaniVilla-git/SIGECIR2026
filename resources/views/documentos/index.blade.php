@extends('layouts.app')

@section('titulo')
    Documentos
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

                        @include('layouts.partials.icons', ['icon' => 'documento'])

                    </div>

                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold">
                            Listado de Documentos
                        </h2>

                        <p class="text-sm text-blue-100 mt-1">
                            Administra y consulta los documentos registrados en SIGECIR.
                        </p>
                    </div>

                </div>

                <a href="{{ route('documentos.create') }}"
                   class="inline-flex items-center justify-center gap-2
                          bg-white text-[#0875bd] hover:bg-blue-50
                          font-bold px-5 py-3 rounded-xl shadow-md
                          transition duration-200">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>

                    Cargar documento
                </a>

            </div>

        </div>

        {{-- INFORMACIÓN --}}
        <div class="bg-white border border-gray-100 rounded-2xl
                    shadow-sm p-5 mb-6">

            <div class="flex items-start gap-4">
                <div>
                    <h3 class="font-bold text-gray-800">
                        Gestión de documentos
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Aquí puedes cargar y consultar órdenes, historias clínicas
                        y otros documentos necesarios para adelantar los procesos.
                    </p>
                </div>

            </div>

        </div>

        {{-- TABLA --}}
        <div class="bg-white shadow-xl rounded-2xl border border-gray-100
                    overflow-hidden">

            <div class="flex flex-col sm:flex-row justify-between
                        items-start sm:items-center gap-3 p-6">

                <div>
                    <h3 class="text-xl font-bold text-gray-800">
                        Documentos registrados
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Consulta la información y el estado de cada documento.
                    </p>
                </div>

                <span class="inline-flex items-center gap-2 bg-blue-50
                             text-[#0875bd] px-4 py-2 rounded-xl
                             text-sm font-semibold">

                    <i class="fa-regular fa-folder-open"></i>
                    Total: {{ $documentos->count() }}

                </span>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left text-gray-600">

                    <thead class="bg-[#063d69] text-white uppercase text-xs">

                        <tr>
                            <th class="px-5 py-4">Nombre</th>
                            <th class="px-5 py-4">Tipo</th>
                            <th class="px-5 py-4">Fecha</th>
                            <th class="px-5 py-4">Estado</th>
                            <th class="px-5 py-4">Observación</th>
                            <th class="px-5 py-4 text-center">Acciones</th>
                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse($documentos as $documento)

                            <tr class="hover:bg-blue-50/50 transition duration-150">

                                {{-- NOMBRE --}}
                                <td class="px-5 py-4 font-semibold text-gray-800">
                                    {{ $documento->nombre_documento }}
                                </td>

                                {{-- TIPO --}}
                                <td class="px-5 py-4">
                                    <span class="inline-flex items-center px-3 py-1
                                                 rounded-lg bg-blue-50 text-[#0875bd]
                                                 text-xs font-semibold">

                                        {{ $documento->tipo_documento }}

                                    </span>
                                </td>

                                {{-- FECHA --}}
                                <td class="px-5 py-4 whitespace-nowrap">

                                    <div class="flex items-center gap-2 text-gray-600">

                                        <i class="fa-regular fa-calendar text-[#0875bd]"></i>

                                        {{ $documento->fecha_documento }}

                                    </div>

                                </td>

                                {{-- ESTADO --}}
                                <td class="px-5 py-4">

                                    <span class="inline-flex px-3 py-1 rounded-full
                                        text-xs font-bold
                                        {{ strtolower($documento->estado_documento) == 'aprobado'
                                            ? 'bg-green-100 text-green-700'
                                            : (strtolower($documento->estado_documento) == 'rechazado'
                                                ? 'bg-red-100 text-red-700'
                                                : 'bg-yellow-100 text-yellow-700') }}">

                                        {{ $documento->estado_documento }}

                                    </span>

                                </td>

                                {{-- OBSERVACIÓN --}}
                                <td class="px-5 py-4 max-w-xs">
                                    <span class="text-gray-600">
                                        {{ $documento->observacion_documento ?? 'Sin observación' }}
                                    </span>
                                </td>

                                {{-- ACCIONES --}}
                                <td class="px-5 py-4">

                                    <div class="flex justify-center items-center gap-2">

                                        {{-- VER --}}
                                        <a href="{{ route('documentos.ver', $documento->id) }}"
                                        target="_blank"
                                        class="inline-flex items-center justify-center
                                                w-9 h-9 rounded-lg bg-blue-500
                                                hover:bg-blue-600 text-white
                                                shadow-sm transition"
                                        title="Ver documento">

                                            @include('layouts.partials.icons', ['icon' => 'ver'])

                                        </a>

                                        {{-- EDITAR --}}
                                        <a href="{{ route('documentos.edit', $documento->id) }}"
                                        class="inline-flex items-center justify-center
                                                w-9 h-9 rounded-lg bg-[#0875bd]
                                                hover:bg-[#063d69] text-white
                                                shadow-sm transition"
                                        title="Editar documento">

                                            @include('layouts.partials.icons', ['icon' => 'editar'])

                                        </a>

                                        {{-- ELIMINAR --}}
                                        <form action="{{ route('documentos.destroy', $documento->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('¿Está seguro de eliminar este documento?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="inline-flex items-center justify-center
                                                        w-9 h-9 rounded-lg bg-rose-500
                                                        hover:bg-rose-600 text-white
                                                        shadow-sm transition"
                                                    title="Eliminar documento">

                                                @include('layouts.partials.icons', ['icon' => 'eliminar'])

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="px-5 py-14 text-center">

                                    <div class="flex flex-col items-center">

                                        <div class="flex h-16 w-16 items-center
                                                    justify-center rounded-full
                                                    bg-blue-50 text-[#0875bd] mb-4">

                                            <i class="fa-regular fa-folder-open text-3xl"></i>

                                        </div>

                                        <p class="text-gray-700 font-bold text-base">
                                            No hay documentos registrados
                                        </p>

                                        <p class="text-gray-400 text-sm mt-1">
                                            Cuando cargues un documento, aparecerá aquí.
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