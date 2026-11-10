@extends('layouts.app')

@section('titulo')
    Crear Servicio
@endsection

@section('content')

<div class="container mx-auto mt-10 px-4">

    <div class="max-w-2xl mx-auto bg-white shadow-xl rounded-2xl p-8 border border-gray-100">

        {{-- Encabezado --}}
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">
                Nuevo Servicio
            </h2>

            <p class="text-gray-500 mt-2">
                Registre la información del servicio
            </p>
        </div>

        {{-- Errores --}}
        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulario --}}
        <form action="{{ route('servicios.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                {{-- Código del servicio --}}
                <div>
                    <label for="codigo_servicio" class="block mb-2 text-sm font-semibold text-gray-700">
                        Código Servicio
                    </label>

                    <input
                        type="text"
                        name="codigo_servicio"
                        id="codigo_servicio"
                        value="{{ old('codigo_servicio') }}"
                        placeholder="Ingrese el código del servicio"
                        required
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                    >
                </div>

                {{-- Nombre del servicio --}}
                <div>
                    <label for="nombre_servicio" class="block mb-2 text-sm font-semibold text-gray-700">
                        Nombre Servicio
                    </label>

                    <input
                        type="text"
                        name="nombre_servicio"
                        id="nombre_servicio"
                        value="{{ old('nombre_servicio') }}"
                        placeholder="Ingrese el nombre del servicio"
                        required
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                    >
                </div>

                {{-- Grupo del servicio --}}
                <div class="md:col-span-2">
                    <label for="grupo_servicio" class="block mb-2 text-sm font-semibold text-gray-700">
                        Grupo Servicio
                    </label>

                    <input
                        type="text"
                        name="grupo_servicio"
                        id="grupo_servicio"
                        value="{{ old('grupo_servicio') }}"
                        placeholder="Ingrese el grupo del servicio"
                        required
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                    >
                </div>

                {{-- Profesional --}}
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
                                {{ old('id_profesional') == $profesional->id ? 'selected' : '' }}
                            >
                                {{ $profesional->nombre_profesional }}
                            </option>
                        @endforeach

                    </select>
                </div>

            </div>

            {{-- Botones --}}
            <div class="flex flex-col sm:flex-row justify-center gap-3 mt-8">

                <a href="{{ route('servicios.index') }}"
                   class="text-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-xl px-6 py-3 transition">
                    Cancelar
                </a>

                <button
                    type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl px-6 py-3 shadow-md transition"
                >
                    Guardar Servicio
                </button>

            </div>

        </form>

    </div>

</div>

@endsection
