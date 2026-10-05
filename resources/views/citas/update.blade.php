```blade
@extends('layouts.app')

@section('title', 'Editar Cita')

@section('content')

<div class="container mx-auto mt-10">

    <div class="bg-white shadow-lg rounded-lg p-6">

        <div class="mb-6">
            <h2 class="text-3xl font-bold text-gray-700">
                Editar Cita
            </h2>

            <p class="text-gray-500 mt-1">
                Modifica la información de la cita
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

        <form action="{{ route('citas.update', $citas->id) }}" method="POST">

            @csrf
            @method('PUT')

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
                            {{ $citas->id_usuario == $usuario->id ? 'selected' : '' }}>

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
                    Profesional
                </label>

                <select
                    name="id_profesional"
                    id="id_profesional"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>

                    <option value="">Seleccione un profesional</option>

                    @foreach($profesionales as $profesional)
                        <option value="{{ $profesional->id }}"
                            {{ $citas->id_profesional == $profesional->id ? 'selected' : '' }}>

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
                            {{ $citas->id_servicios == $servicio->id ? 'selected' : '' }}>

                            {{ $servicio->nombre_servicio }}

                        </option>
                    @endforeach

                </select>
            </div>

            {{-- MODALIDAD --}}
            <div class="mb-4">
                <label for="modalidad_cita" class="block text-gray-700 font-semibold mb-2">
                    Modalidad
                </label>

                <select
                    name="modalidad_cita"
                    id="modalidad_cita"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>

                    <option value="Presencial"
                        {{ $citas->modalidad_cita == 'Presencial' ? 'selected' : '' }}>
                        Presencial
                    </option>

                    <option value="Virtual"
                        {{ $citas->modalidad_cita == 'Virtual' ? 'selected' : '' }}>
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
                    value="{{ $citas->consultorio }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            {{-- FECHA --}}
            <div class="mb-4">
                <label for="fecha_cita" class="block text-gray-700 font-semibold mb-2">
                    Fecha de la cita
                </label>

                <input
                    type="date"
                    name="fecha_cita"
                    id="fecha_cita"
                    value="{{ $citas->fecha_cita }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            {{-- HORA INICIO --}}
            <div class="mb-4">
                <label for="hora_inicio" class="block text-gray-700 font-semibold mb-2">
                    Hora de inicio
                </label>

                <input
                    type="time"
                    name="hora_inicio"
                    id="hora_inicio"
                    value="{{ $citas->hora_inicio }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            {{-- HORA FIN --}}
            <div class="mb-4">
                <label for="hora_fin" class="block text-gray-700 font-semibold mb-2">
                    Hora de finalización
                </label>

                <input
                    type="time"
                    name="hora_fin"
                    id="hora_fin"
                    value="{{ $citas->hora_fin }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            {{-- ESTADO --}}
            <div class="mb-4">
                <label for="estado_cita" class="block text-gray-700 font-semibold mb-2">
                    Estado
                </label>

                <select
                    name="estado_cita"
                    id="estado_cita"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>

                    <option value="Pendiente"
                        {{ $citas->estado_cita == 'Pendiente' ? 'selected' : '' }}>
                        Pendiente
                    </option>

                    <option value="Confirmada"
                        {{ $citas->estado_cita == 'Confirmada' ? 'selected' : '' }}>
                        Confirmada
                    </option>

                    <option value="Atendida"
                        {{ $citas->estado_cita == 'Atendida' ? 'selected' : '' }}>
                        Atendida
                    </option>

                    <option value="Cancelada"
                        {{ $citas->estado_cita == 'Cancelada' ? 'selected' : '' }}>
                        Cancelada
                    </option>

                    <option value="Inasistencia"
                        {{ $citas->estado_cita == 'Inasistencia' ? 'selected' : '' }}>
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
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $citas->observaciones_cita }}</textarea>
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
                    value="{{ $citas->fecha_creacion_cita }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            {{-- BOTONES --}}
            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">
                    Actualizar Cita
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

