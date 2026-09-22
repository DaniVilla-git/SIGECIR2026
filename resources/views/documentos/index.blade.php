@extends('layouts.app')

@section('titulo')
    Documentos
@endsection

@section('content')

<div class="container mx-auto mt-10">

    <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-lg p-8">

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-2xl font-bold">
                Mis Documentos
            </h2>

            <a href="{{ route('documentos.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Cargar documento
            </a>

        </div>

        <p class="text-gray-600 mb-6">
            Carga tus órdenes, historias clínicas u otros documentos
            necesarios para adelantar tu proceso.
        </p>

        <div class="overflow-x-auto">

            <table class="w-full border-collapse border border-gray-300">

                <thead>
                    <tr class="bg-gray-100">

                        <th class="border border-gray-300 px-4 py-2">
                            Nombre
                        </th>

                        <th class="border border-gray-300 px-4 py-2">
                            Tipo
                        </th>

                        <th class="border border-gray-300 px-4 py-2">
                            Fecha
                        </th>

                        <th class="border border-gray-300 px-4 py-2">
                            Estado
                        </th>

                        <th class="border border-gray-300 px-4 py-2">
                            Observación
                        </th>

                        <th class="border border-gray-300 px-4 py-2">
                            Acción
                        </th>

                    </tr>
                </thead>

                <tbody>

                    @forelse($documentos as $documento)

                        <tr>

                            <td class="border border-gray-300 px-4 py-2">
                                {{ $documento->nombre_documento }}
                            </td>

                            <td class="border border-gray-300 px-4 py-2">
                                {{ $documento->tipo_documento }}
                            </td>

                            <td class="border border-gray-300 px-4 py-2">
                                {{ $documento->fecha_documento }}
                            </td>

                            <td class="border border-gray-300 px-4 py-2">
                                {{ $documento->estado_documento }}
                            </td>

                            <td class="border border-gray-300 px-4 py-2">
                                {{ $documento->observacion_documento ?? 'Sin observación' }}
                            </td>

                            <td class="border border-gray-300 px-4 py-2">

                                <a href="{{ asset('storage/' . $documento->ruta_documento) }}"
                                   target="_blank"
                                   class="text-blue-600 hover:underline">
                                    Ver documento
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6"
                                class="border border-gray-300 px-4 py-6 text-center text-gray-500">

                                No hay documentos cargados.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection