@extends('layouts.app')

@section('titulo')
    Nuevo Mensaje
@endsection

@section('content')

<div class="container mx-auto mt-10 px-4">

    <div class="bg-white shadow-xl rounded-2xl border border-gray-200 p-6 md:p-8 max-w-3xl mx-auto">

        {{-- Encabezado --}}
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">

            <div>
                <h2 class="text-3xl font-bold text-gray-800">
                    Nuevo Mensaje
                </h2>

                <p class="text-gray-500 mt-2">
                    Registra un nuevo mensaje en el sistema.
                </p>
            </div>

            <a href="{{ route('mensajes.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2.5 rounded-xl font-semibold transition">
                Volver
            </a>

        </div>

        {{-- Formulario --}}
        <form action="{{ route('mensajes.store') }}" method="POST">

            @csrf

            {{-- Mensaje --}}
            <div class="mb-5">

                <label for="mensaje" class="block text-sm font-semibold text-gray-700 mb-2">
                    Mensaje
                </label>

                <textarea
                    id="mensaje"
                    name="mensaje"
                    rows="3"
                    required
                    placeholder="Escriba el mensaje..."
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('mensaje') border-red-500 @enderror">{{ old('mensaje') }}</textarea>

                @error('mensaje')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

            </div>

            {{-- Tipo de emisor --}}
            <div class="mb-5">

                <label for="tipo_emisor" class="block text-sm font-semibold text-gray-700 mb-2">
                    Tipo de emisor
                </label>

                <input
                    type="text"
                    id="tipo_emisor"
                    name="tipo_emisor"
                    value="{{ old('tipo_emisor') }}"
                    placeholder="Ej. Usuario o Profesional"
                    required
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('tipo_emisor') border-red-500 @enderror">

                @error('tipo_emisor')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

            </div>

            {{-- Fecha del mensaje --}}
            <div class="mb-5">

                <label for="fecha_mensaje" class="block text-sm font-semibold text-gray-700 mb-2">
                    Fecha del mensaje
                </label>

                <input
                    type="date"
                    id="fecha_mensaje"
                    name="fecha_mensaje"
                    value="{{ old('fecha_mensaje') }}"
                    required
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('fecha_mensaje') border-red-500 @enderror">

                @error('fecha_mensaje')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

            </div>

            {{-- Cita --}}
            <div class="mb-5">

                <label for="id_cita" class="block text-sm font-semibold text-gray-700 mb-2">
                    Cita
                </label>

                <select
                    id="id_cita"
                    name="id_cita"
                    required
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('id_cita') border-red-500 @enderror">

                    <option value="">Seleccione una cita</option>

                    @foreach($citas as $cita)
                        <option value="{{ $cita->id }}"
                            {{ old('id_cita') == $cita->id ? 'selected' : '' }}>
                            {{ $cita->fecha_cita }} - {{ $cita->hora_inicio }}
                        </option>
                    @endforeach

                </select>

                @error('id_cita')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

            </div>

            {{-- Profesional --}}
            <div class="mb-5">

                <label for="id_profesional" class="block text-sm font-semibold text-gray-700 mb-2">
                    Profesional
                </label>

                <select
                    id="id_profesional"
                    name="id_profesional"
                    required
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('id_profesional') border-red-500 @enderror">

                    <option value="">Seleccione un profesional</option>

                    @foreach($profesionales as $profesional)
                        <option value="{{ $profesional->id }}"
                            {{ old('id_profesional') == $profesional->id ? 'selected' : '' }}>
                            {{ $profesional->nombre_profesional }}
                            {{ $profesional->apellido_profesional }}
                        </option>
                    @endforeach

                </select>

                @error('id_profesional')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

            </div>

            {{-- Usuario --}}
            <div class="mb-8">

                <label for="id_usuario" class="block text-sm font-semibold text-gray-700 mb-2">
                    Usuario
                </label>

                <select
                    id="id_usuario"
                    name="id_usuario"
                    required
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('id_usuario') border-red-500 @enderror">

                    <option value="">Seleccione un usuario</option>

                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}"
                            {{ old('id_usuario') == $usuario->id ? 'selected' : '' }}>
                            {{ $usuario->primer_nombre }}
                            {{ $usuario->segundo_nombre }}
                            {{ $usuario->primer_apellido }}
                            {{ $usuario->segundo_apellido }}
                        </option>
                    @endforeach

                </select>

                @error('id_usuario')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

            </div>

            {{-- Botones --}}
            <div class="flex flex-col sm:flex-row justify-end gap-3 border-t border-gray-200 pt-6">

                <a href="{{ route('mensajes.index') }}"
                   class="text-center bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold transition">
                    Cancelar
                </a>

                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl font-semibold shadow-md transition">
                    Guardar Mensaje
                </button>

            </div>

        </form>

    </div>

</div>

@endsection
