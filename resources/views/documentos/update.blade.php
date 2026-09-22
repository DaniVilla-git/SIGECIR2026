```blade
@extends('layouts.app')

@section('titulo')
    Editar Documento
@endsection

@section('content')
    <div class="container mx-auto mt-10">

        <div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-8">

            <h2 class="text-3xl font-bold text-center mb-6">
                Editar Documento
            </h2>

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-5">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('documentos.update', $documento->id) }}"
                  method="post"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">
                        Nombre del Documento
                    </label>

                    <input type="text"
                           name="nombre_documento"
                           value="{{ $documento->nombre_documento }}"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">
                        Tipo de Documento
                    </label>

                    <select name="tipo_documento"
                            class="w-full border rounded px-3 py-2">

                        <option value="">Seleccione un tipo</option>

                        <option value="Orden"
                            {{ $documento->tipo_documento == 'Orden' ? 'selected' : '' }}>
                            Orden
                        </option>

                        <option value="Historia Clínica"
                            {{ $documento->tipo_documento == 'Historia Clínica' ? 'selected' : '' }}>
                            Historia Clínica
                        </option>

                        <option value="Documento de identidad"
                            {{ $documento->tipo_documento == 'Documento de identidad' ? 'selected' : '' }}>
                            Documento de identidad
                        </option>

                        <option value="Otro"
                            {{ $documento->tipo_documento == 'Otro' ? 'selected' : '' }}>
                            Otro
                        </option>

                    </select>
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">
                        Documento actual
                    </label>

                    <p class="mb-2 text-gray-600">
                        {{ $documento->nombre_documento }}
                    </p>

                    <a href="{{ asset('storage/' . $documento->ruta_documento) }}"
                       target="_blank"
                       class="text-blue-600 hover:underline">
                        Ver documento actual
                    </a>
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">
                        Reemplazar Documento
                    </label>

                    <input type="file"
                           name="ruta_documento"
                           class="w-full border rounded px-3 py-2">

                    <p class="text-sm text-gray-500 mt-1">
                        Si no selecciona un archivo, se conservará el documento actual.
                    </p>
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">
                        Fecha del Documento
                    </label>

                    <input type="date"
                           name="fecha_documento"
                           value="{{ $documento->fecha_documento }}"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">
                        Estado del Documento
                    </label>

                    <select name="estado_documento"
                            class="w-full border rounded px-3 py-2">

                        <option value="Pendiente"
                            {{ $documento->estado_documento == 'Pendiente' ? 'selected' : '' }}>
                            Pendiente
                        </option>

                        <option value="Revisado"
                            {{ $documento->estado_documento == 'Revisado' ? 'selected' : '' }}>
                            Revisado
                        </option>

                        <option value="Aprobado"
                            {{ $documento->estado_documento == 'Aprobado' ? 'selected' : '' }}>
                            Aprobado
                        </option>

                    </select>
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">
                        Observación
                    </label>

                    <textarea name="observacion_documento"
                              class="w-full border rounded px-3 py-2"
                              rows="4">{{ $documento->observacion_documento }}</textarea>
                </div>

                <div>
                    <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white rounded px-5 py-2">
                        Guardar
                    </button>
                </div>

            </form>

        </div>

    </div>
@endsection



