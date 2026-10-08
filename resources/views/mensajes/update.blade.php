@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-6">

    <h1 class="text-2xl font-bold mb-6">Editar Mensaje</h1>

    <form action="{{ route('mensajes.update', $mensaje->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-2">Mensaje</label>
            <input type="text"
                   name="mensaje"
                   value="{{ $mensaje->mensaje }}"
                   class="w-full border border-gray-300 rounded px-3 py-2"
                   required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Tipo de emisor</label>
            <input type="text"
                   name="tipo_emisor"
                   value="{{ $mensaje->tipo_emisor }}"
                   class="w-full border border-gray-300 rounded px-3 py-2"
                   required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Fecha del mensaje</label>
            <input type="date"
                   name="fecha_mensaje"
                   value="{{ $mensaje->fecha_mensaje }}"
                   class="w-full border border-gray-300 rounded px-3 py-2"
                   required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Cita</label>
            <select name="id_cita"
                    class="w-full border border-gray-300 rounded px-3 py-2"
                    required>

                @foreach($citas as $cita)
                    <option value="{{ $cita->id }}"
                        {{ $mensaje->id_cita == $cita->id ? 'selected' : '' }}>
                        {{ $cita->fecha_cita }} - {{ $cita->hora_inicio }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Profesional</label>
            <select name="id_profesional"
                    class="w-full border border-gray-300 rounded px-3 py-2"
                    required>

                @foreach($profesionales as $profesional)
                    <option value="{{ $profesional->id }}"
                        {{ $mensaje->id_profesional == $profesional->id ? 'selected' : '' }}>
                        {{ $profesional->nombre_profesional }}
                        {{ $profesional->apellido_profesional }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Usuario</label>
            <select name="id_usuario"
                    class="w-full border border-gray-300 rounded px-3 py-2"
                    required>

                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}"
                        {{ $mensaje->id_usuario == $usuario->id ? 'selected' : '' }}>
                        {{ $usuario->primer_nombre }}
                        {{ $usuario->segundo_nombre }}
                        {{ $usuario->primer_apellido }}
                        {{ $usuario->segundo_apellido }}
                    </option>
                @endforeach

            </select>
        </div>

        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Actualizar
        </button>

        <a href="{{ route('mensajes.index') }}"
           class="bg-gray-500 text-white px-4 py-2 rounded">
            Cancelar
        </a>

    </form>

</div>

@endsection