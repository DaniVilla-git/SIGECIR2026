```blade
@extends('layouts.app')

@section('title', 'Nueva Cita')

@section('content')

<div class="container mx-auto mt-10">

    <div class="bg-white shadow-lg rounded-lg p-6">

        <div class="mb-6">
            <h2 class="text-3xl font-bold text-gray-700">
                Nueva Cita
            </h2>

            <p class="text-gray-500 mt-1">
                Registra una nueva cita
            </p>
        </div>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('citas.store') }}" method="POST">

            @csrf

            {{-- USUARIO --}}
            <div class="mb-4">
                <label for="id_usuario" class="block text-gray-700 font-semibold mb-2">
                    Usuario
                </label>

                <select
                    name="id_usuario"
                    id="id_usuario"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>

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
            </div>

            {{-- PROFESIONAL --}}
            <div class="mb-4">
                <label for="id_profesional" class="block text-gray-700 font-semibold mb-2">
                    Nombre Profesional
                </label>

                <select
                    name="id_profesional"
                    id="id_profesional"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>

                    <option value="">Seleccione un profesional</option>

                    @foreach($profesionales as $profesional)
                        <option value="{{ $profesional->id }}"
                            {{ old('id_profesional') == $profesional->id ? 'selected' : '' }}>

                            {{ $profesional->nombre_profesional }}
                            {{ $profesional->apellido_profesional }}

                        </option>
                    @endforeach

                </select>
            </div>

            {{-- SERVICIO --}}
            <div class="mb-4">
                <label for="id_servicios" class="block text-gray-700 font-semibold mb-2">
                    Servicio
                </label>

                <select
                    name="id_servicios"
                    id="id_servicios"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>

                    <option value="">Seleccione un servicio</option>

                    @foreach($servicios as $servicio)
                        <option value="{{ $servicio->id }}"
                            {{ old('id_servicios') == $servicio->id ? 'selected' : '' }}>

                            {{ $servicio->nombre_servicio }}

                        </option>
                    @endforeach

                </select>
            </div>

            {{-- MODALIDAD --}}
            <div class="mb-4">
                <label for="modalidad_cita" class="block text-gray-700 font-semibold mb-2">
                    Modalidad Cita
                </label>

                <select
                    name="modalidad_cita"
                    id="modalidad_cita"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>

                    <option value="">Seleccione una modalidad</option>
                    <option value="Presencial" {{ old('modalidad_cita') == 'Presencial' ? 'selected' : '' }}>
                        Presencial
                    </option>
                    <option value="Virtual" {{ old('modalidad_cita') == 'Virtual' ? 'selected' : '' }}>
                        Virtual
                    </option>

                </select>
            </div>

            {{-- CONSULTORIO --}}
            <div class="mb-4">
                <label for="consultorio" class="block text-gray-700 font-semibold mb-2">
                    Consultorio
                </label>

                <input
                    type="text"
                    name="consultorio"
                    id="consultorio"
                    value="{{ old('consultorio') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            {{-- FECHA --}}
            <div class="mb-4">
                <label for="fecha_cita" class="block text-gray-700 font-semibold mb-2">
                    Fecha Cita
                </label>

                <input
                    type="date"
                    name="fecha_cita"
                    id="fecha_cita"
                    value="{{ old('fecha_cita') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            {{-- HORA INICIO --}}
            <div class="mb-4">
                <label for="hora_inicio" class="block text-gray-700 font-semibold mb-2">
                    Hora Inicio
                </label>

                <input
                    type="time"
                    name="hora_inicio"
                    id="hora_inicio"
                    value="{{ old('hora_inicio') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            {{-- HORA FIN --}}
            <div class="mb-4">
                <label for="hora_fin" class="block text-gray-700 font-semibold mb-2">
                    Hora Fin
                </label>

                <input
                    type="time"
                    name="hora_fin"
                    id="hora_fin"
                    value="{{ old('hora_fin') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            {{-- ESTADO --}}
            <div class="mb-4">
                <label for="estado_cita" class="block text-gray-700 font-semibold mb-2">
                    Estado Cita
                </label>

                <select
                    name="estado_cita"
                    id="estado_cita"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>

                    <option value="">Seleccione un estado</option>

                    <option value="Pendiente" {{ old('estado_cita') == 'Pendiente' ? 'selected' : '' }}>
                        Pendiente
                    </option>

                    <option value="Confirmada" {{ old('estado_cita') == 'Confirmada' ? 'selected' : '' }}>
                        Confirmada
                    </option>

                    <option value="Atendida" {{ old('estado_cita') == 'Atendida' ? 'selected' : '' }}>
                        Atendida
                    </option>

                    <option value="Cancelada" {{ old('estado_cita') == 'Cancelada' ? 'selected' : '' }}>
                        Cancelada
                    </option>

                    <option value="Inasistencia" {{ old('estado_cita') == 'Inasistencia' ? 'selected' : '' }}>
                        Inasistencia
                    </option>

                </select>
            </div>

            {{-- OBSERVACIONES --}}
            <div class="mb-4">
                <label for="observaciones_cita" class="block text-gray-700 font-semibold mb-2">
                    Observaciones
                </label>

                <textarea
                    name="observaciones_cita"
                    id="observaciones_cita"
                    rows="4"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('observaciones_cita') }}</textarea>
            </div>

            {{-- FECHA CREACIÓN --}}
            <div class="mb-6">
                <label for="fecha_creacion_cita" class="block text-gray-700 font-semibold mb-2">
                    Fecha de creación
                </label>

                <input
                    type="date"
                    name="fecha_creacion_cita"
                    id="fecha_creacion_cita"
                    value="{{ old('fecha_creacion_cita', date('Y-m-d')) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            {{-- BOTONES --}}
            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">
                    Guardar
                </button>

                <a
                    href="{{ route('citas.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded">
                    Cancelar
                </a>

            </div>

        </form>

    </div>

</div>

@endsection
```
