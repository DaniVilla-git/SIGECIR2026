@extends('layouts.app')

@section('titulo')
    Cargar Documento
@endsection

@section('content')
<div class="container mx-auto mt-10 px-4">

    <div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-8">

        <h2 class="text-3xl font-bold text-center mb-6">
            Cargar Documento
        </h2>

        {{-- Mostrar errores --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-5">
                <p class="font-bold mb-2">Revisa los siguientes errores:</p>
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Un solo formulario --}}
        <form action="{{ route('documentos.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            {{-- Usuario --}}
            <div class="mb-5">
                <label for="id_usuario" class="block mb-2 font-semibold">
                    Usuario
                </label>

                <select name="id_usuario" id="id_usuario"
                        class="w-full border rounded px-3 py-2" required>
                    <option value="">Seleccione un usuario</option>

                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}"
                            {{ old('id_usuario') == $usuario->id ? 'selected' : '' }}>
                            {{ $usuario->numero_documento }} -
                            {{ $usuario->primer_nombre }}
                            {{ $usuario->segundo_nombre }}
                            {{ $usuario->primer_apellido }}
                            {{ $usuario->segundo_apellido }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Nombre --}}
            <div class="mb-5">
                <label for="nombre_documento" class="block mb-2 font-semibold">
                    Nombre del Documento
                </label>

                <input type="text"
                       name="nombre_documento"
                       id="nombre_documento"
                       value="{{ old('nombre_documento') }}"
                       class="w-full border rounded px-3 py-2"
                       placeholder="Ej: Orden de fisioterapia"
                       required>
            </div>

            {{-- Tipo --}}
            <div class="mb-5">
                <label for="tipo_documento" class="block mb-2 font-semibold">
                    Tipo de Documento
                </label>

                <select name="tipo_documento" id="tipo_documento"
                        class="w-full border rounded px-3 py-2" required>
                    <option value="">Seleccione un tipo</option>
                    <option value="Orden" {{ old('tipo_documento') == 'Orden' ? 'selected' : '' }}>Orden</option>
                    <option value="Historia Clínica" {{ old('tipo_documento') == 'Historia Clínica' ? 'selected' : '' }}>Historia Clínica</option>
                    <option value="Documento de identidad" {{ old('tipo_documento') == 'Documento de identidad' ? 'selected' : '' }}>Documento de identidad</option>
                    <option value="Otro" {{ old('tipo_documento') == 'Otro' ? 'selected' : '' }}>Otro</option>
                </select>
            </div>

            {{-- Archivo --}}
            <div class="mb-5">
                <label for="ruta_documento" class="block mb-2 font-semibold">
                    Archivo del Documento (PDF o imagen)
                </label>

                <input type="file"
                    name="ruta_documento"
                    id="ruta_documento"
                    accept=".pdf,.jpg,.jpeg,.png"
                    class="w-full border rounded px-3 py-2"
                    required>

                <p class="text-sm text-gray-500 mt-1">
                    Formatos permitidos: PDF, JPG, JPEG y PNG. Máximo 10 MB.
                </p>
            </div>

            {{-- Fecha --}}
            <div class="mb-5">
                <label for="fecha_documento" class="block mb-2 font-semibold">
                    Fecha del Documento
                </label>

                <input type="date"
                    name="fecha_documento"
                    id="fecha_documento"
                    value="{{ old('fecha_documento') }}"
                    class="w-full border rounded px-3 py-2"
                    required>
            </div>

            {{-- Estado --}}
            <div class="mb-5">
                <label for="estado_documento" class="block mb-2 font-semibold">
                    Estado del Documento
                </label>

                <select name="estado_documento" id="estado_documento"
                        class="w-full border rounded px-3 py-2" required>
                    <option value="Pendiente" {{ old('estado_documento', 'Pendiente') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="Revisado" {{ old('estado_documento') == 'Revisado' ? 'selected' : '' }}>Revisado</option>
                    <option value="Aprobado" {{ old('estado_documento') == 'Aprobado' ? 'selected' : '' }}>Aprobado</option>
                </select>
            </div>

            {{-- Observación --}}
            <div class="mb-5">
                <label for="observacion_documento" class="block mb-2 font-semibold">
                    Observación
                </label>

                <textarea name="observacion_documento"
                        id="observacion_documento"
                        class="w-full border rounded px-3 py-2"
                        rows="4"
                        placeholder="Escriba una observación si es necesario">{{ old('observacion_documento') }}</textarea>
            </div>

            {{-- Botón --}}
            <div class="flex justify-center">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">
                    Guardar Documento
                </button>
            </div>

        </form>

    </div>
</div>
@endsection