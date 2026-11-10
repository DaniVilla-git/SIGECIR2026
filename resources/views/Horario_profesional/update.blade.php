
@extends('layouts.app')

@section('titulo')
    Editar Horario Profesional
@endsection

@section('content')
<div class="container mx-auto mt-10 px-4">

    <div class="max-w-2xl mx-auto bg-white shadow-xl rounded-2xl p-8 border border-gray-100">

        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">
                Editar Horario Profesional
            </h2>

            <p class="text-gray-500 mt-2">
                Actualice la información del horario profesional
            </p>
        </div>

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('horario_profesional.update', $horario_profesional->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div class="md:col-span-2">
                    <label for="dia_semana" class="block mb-2 text-sm font-semibold text-gray-700">
                        Fecha del Horario
                    </label>

                    <input
                        type="date"
                        name="dia_semana"
                        id="dia_semana"
                        value="{{ old('dia_semana', \Carbon\Carbon::parse($horario_profesional->dia_semana)->format('Y-m-d')) }}"
                        required
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                    >

                    <p class="text-sm text-gray-500 mt-2">
                        Seleccione la fecha correspondiente al horario.
                    </p>
                </div>

                <div>
                    <label for="hora_inicio" class="block mb-2 text-sm font-semibold text-gray-700">
                        Hora de Inicio
                    </label>

                    <input
                        type="time"
                        name="hora_inicio"
                        id="hora_inicio"
                        value="{{ old('hora_inicio', \Carbon\Carbon::parse($horario_profesional->hora_inicio)->format('H:i')) }}"
                        required
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                    >
                </div>

                <div>
                    <label for="hora_fin" class="block mb-2 text-sm font-semibold text-gray-700">
                        Hora de Fin
                    </label>

                    <input
                        type="time"
                        name="hora_fin"
                        id="hora_fin"
                        value="{{ old('hora_fin', \Carbon\Carbon::parse($horario_profesional->hora_fin)->format('H:i')) }}"
                        required
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                    >
                </div>

                <div class="md:col-span-2">
                    <label for="id_profesional" class="block mb-2 text-sm font-semibold text-gray-700">
                        Nombre Profesional
                    </label>

                    <select
                        name="id_profesional"
                        id="id_profesional"
                        required
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                    >
                        <option value="">Seleccione un profesional</option>

                        @foreach ($profesionales as $profesional)
                            <option
                                value="{{ $profesional->id }}"
                                {{ old('id_profesional', $horario_profesional->id_profesional) == $profesional->id ? 'selected' : '' }}
                            >
                                {{ $profesional->nombre_profesional }}
                            </option>
                        @endforeach

                    </select>
                </div>

            </div>

            <div class="flex flex-col sm:flex-row justify-center gap-3 mt-8">

                <a href="{{ route('horario_profesional.index') }}"
                   class="text-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-xl px-6 py-3 transition">
                    Cancelar
                </a>

                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl px-6 py-3 shadow-md transition">
                    Actualizar Horario
                </button>

            </div>

        </form>

    </div>
</div>
@endsection

