@extends('layouts.app')

@section('titulo')
    Editar Servicio
@endsection

@section('content')
    <div class="container mx-auto mt-10 px-4">

        <div class="max-w-2xl mx-auto bg-white shadow-xl rounded-2xl p-8 border border-gray-100">

            <h2 class="text-3xl font-bold text-center text-gray-700 mb-2">
                Editar Servicio
            </h2>

            <p class="text-center text-gray-500 mb-8">
                Modifique la información del servicio
            </p>

            {{-- Mensajes de error --}}
            @if ($errors->any())
                <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('servicios.update', $servicios->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- Código del servicio --}}
                    <div>
                        <label for="codigo_servicio" class="block mb-2 font-semibold text-gray-700">
                            Código del Servicio
                        </label>

                        <input
                            type="text"
                            name="codigo_servicio"
                            id="codigo_servicio"
                            value="{{ old('codigo_servicio', $servicios->codigo_servicio) }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            required
                        >
                    </div>

                    {{-- Nombre del servicio --}}
                    <div>
                        <label for="nombre_servicio" class="block mb-2 font-semibold text-gray-700">
                            Nombre del Servicio
                        </label>

                        <input
                            type="text"
                            name="nombre_servicio"
                            id="nombre_servicio"
                            value="{{ old('nombre_servicio', $servicios->nombre_servicio) }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            required
                        >
                    </div>

                    {{-- Grupo del servicio --}}
                    <div class="md:col-span-2">
                        <label for="grupo_servicio" class="block mb-2 font-semibold text-gray-700">
                            Grupo del Servicio
                        </label>

                        <input
                            type="text"
                            name="grupo_servicio"
                            id="grupo_servicio"
                            value="{{ old('grupo_servicio', $servicios->grupo_servicio) }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            required
                        >
                    </div>

                    {{-- Profesional --}}
                    <div class="md:col-span-2">
                        <label for="id_profesional" class="block mb-2 font-semibold text-gray-700">
                            Nombre del Profesional
                        </label>

                        <select
                            name="id_profesional"
                            id="id_profesional"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            required
                        >
                            <option value="">Seleccione un profesional</option>

                            @foreach ($profesionales as $profesional)
                                <option
                                    value="{{ $profesional->id }}"
                                    {{ old('id_profesional', $servicios->id_profesional) == $profesional->id ? 'selected' : '' }}
                                >
                                    {{ $profesional->nombre_profesional }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                </div>

                {{-- Botones --}}
                <div class="flex flex-col sm:flex-row justify-center gap-4 mt-8">

                    <a href="{{ route('servicios.index') }}"
                       class="bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg px-6 py-3 text-center transition">
                        Cancelar
                    </a>

                    <button
                        type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg px-6 py-3 transition"
                    >
                        Guardar Cambios
                    </button>

                </div>

            </form>

        </div>

    </div>
@endsection
