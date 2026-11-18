@extends('layouts.app')

@section('titulo')
    Crear Servicio
@endsection

@section('content')

<div class="container mx-auto mt-8 px-4 pb-10">

    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">

        {{-- ENCABEZADO --}}
        <div class="bg-gradient-to-r from-[#063d69] via-[#0875bd] to-[#20a4a7] px-8 py-7 text-white">

            <div class="flex items-center gap-4">
                <div>
                    <h2 class="text-2xl font-bold">
                        Nuevo Servicio
                    </h2>

                    <p class="text-blue-100 text-sm mt-1">
                        Registre la información del servicio médico
                    </p>
                </div>
            </div>

        </div>

        <div class="p-6 md:p-8">

            {{-- ERRORES --}}
            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6">
                    <div class="flex items-center gap-2 font-semibold mb-2">
                        <i class="fas fa-exclamation-circle"></i>
                        Revise los siguientes errores:
                    </div>

                    <ul class="list-disc pl-5 text-sm space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- FORMULARIO --}}
            <form action="{{ route('servicios.store') }}" method="POST">
                @csrf

                {{-- INFORMACIÓN DEL SERVICIO --}}
                <div class="mb-8">

                    <div class="flex items-center gap-3 border-b border-slate-200 pb-3 mb-5">
                        <h3 class="text-lg font-bold text-slate-800">
                            Información del servicio
                        </h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- CÓDIGO --}}
                        <div>
                            <label for="codigo_servicio" class="block mb-2 text-sm font-semibold text-slate-700">
                                Código del servicio
                            </label>

                            <input
                                type="text"
                                name="codigo_servicio"
                                id="codigo_servicio"
                                value="{{ old('codigo_servicio') }}"
                                placeholder="Ingrese el código del servicio"
                                required
                                class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none transition focus:ring-2 focus:ring-[#0875bd] focus:border-[#0875bd]"
                            >

                            @error('codigo_servicio')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- NOMBRE --}}
                        <div>
                            <label for="nombre_servicio" class="block mb-2 text-sm font-semibold text-slate-700">
                                Nombre del servicio
                            </label>

                            <input
                                type="text"
                                name="nombre_servicio"
                                id="nombre_servicio"
                                value="{{ old('nombre_servicio') }}"
                                placeholder="Ingrese el nombre del servicio"
                                required
                                class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none transition focus:ring-2 focus:ring-[#0875bd] focus:border-[#0875bd]"
                            >

                            @error('nombre_servicio')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- GRUPO --}}
                        <div class="md:col-span-2">
                            <label for="grupo_servicio" class="block mb-2 text-sm font-semibold text-slate-700">
                                Grupo del servicio
                            </label>

                            <input
                                type="text"
                                name="grupo_servicio"
                                id="grupo_servicio"
                                value="{{ old('grupo_servicio') }}"
                                placeholder="Ingrese el grupo al que pertenece el servicio"
                                required
                                class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none transition focus:ring-2 focus:ring-[#0875bd] focus:border-[#0875bd]"
                            >

                            @error('grupo_servicio')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>

                {{-- ASIGNACIÓN DEL PROFESIONAL --}}
                <div class="mb-8">

                    <div>
                        <label for="id_profesional" class="block mb-2 text-sm font-semibold text-slate-700">
                            Profesional responsable
                        </label>

                        <select
                            name="id_profesional"
                            id="id_profesional"
                            required
                            class="w-full border border-slate-300 rounded-xl px-4 py-3 bg-white outline-none transition focus:ring-2 focus:ring-[#0875bd] focus:border-[#0875bd]"
                        >
                            <option value="">Seleccione un profesional</option>

                            @foreach ($profesionales as $profesional)
                                <option
                                    value="{{ $profesional->id }}"
                                    {{ old('id_profesional') == $profesional->id ? 'selected' : '' }}
                                >
                                    {{ strtoupper($profesional->nombre_profesional . ' ' . $profesional->apellido_profesional) }}
                                    - {{ strtoupper($profesional->especialidad) }}
                                </option>
                            @endforeach

                        </select>

                        @error('id_profesional')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                {{-- BOTONES --}}
                <div class="flex flex-col-reverse sm:flex-row justify-end gap-3 border-t border-slate-200 pt-6">

                    <a
                        href="{{ route('servicios.index') }}"
                        class="inline-flex items-center justify-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl px-6 py-3 transition"
                    >
                        <i class="fas fa-times"></i>
                        Cancelar
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-[#063d69] via-[#0875bd] to-[#20a4a7] hover:opacity-90 text-white font-semibold rounded-xl px-6 py-3 shadow-md transition"
                    >
                        <i class="fas fa-save"></i>
                        Guardar Servicio
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection
