@extends('layouts.app')

@section('titulo')
    Crear Usuario
@endsection

@section('content')

<div class="container mx-auto mt-10 px-4">

    <div class="max-w-3xl mx-auto bg-white shadow-xl rounded-2xl border border-gray-100 p-6 md:p-8">

        {{-- Encabezado --}}
        <div class="mb-8 text-center">

            <h2 class="text-3xl font-bold text-gray-700">
                Nuevo Usuario
            </h2>

            <p class="text-sm text-gray-500 mt-2">
                Registra la información del usuario en SIGECIR.
            </p>

        </div>

        {{-- Errores de validación --}}
        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6">

                <p class="font-semibold mb-2">
                    Por favor, revisa los siguientes errores:
                </p>

                <ul class="list-disc pl-5 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif

        {{-- Formulario --}}
        <form action="{{ route('usuarios.store') }}" method="POST">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                {{-- Documento Identidad --}}
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Documento Identidad
                    </label>

                    <input
                        type="text"
                        name="documento_identidad"
                        value="{{ old('documento_identidad') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    >
                </div>

                {{-- Primer Nombre --}}
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Primer Nombre
                    </label>

                    <input
                        type="text"
                        name="primer_nombre"
                        value="{{ old('primer_nombre') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    >
                </div>

                {{-- Segundo Nombre --}}
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Segundo Nombre
                    </label>

                    <input
                        type="text"
                        name="segundo_nombre"
                        value="{{ old('segundo_nombre') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    >
                </div>

                {{-- Primer Apellido --}}
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Primer Apellido
                    </label>

                    <input
                        type="text"
                        name="primer_apellido"
                        value="{{ old('primer_apellido') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    >
                </div>

                {{-- Segundo Apellido --}}
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Segundo Apellido
                    </label>

                    <input
                        type="text"
                        name="segundo_apellido"
                        value="{{ old('segundo_apellido') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    >
                </div>

                {{-- Telefono Usuario --}}
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Telefono Usuario
                    </label>

                    <input
                        type="text"
                        name="telefono_usuario"
                        value="{{ old('telefono_usuario') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    >
                </div>

                {{-- Correo Usuario --}}
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Correo Usuario
                    </label>

                    <input
                        type="text"
                        name="correo_usuario"
                        value="{{ old('correo_usuario') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    >
                </div>

                {{-- EPS Usuario --}}
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        EPS Usuario
                    </label>

                    <input
                        type="text"
                        name="eps_usuario"
                        value="{{ old('eps_usuario') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    >
                </div>

                {{-- Regimen Usuario --}}
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Regimen Usuario
                    </label>

                    <input
                        type="text"
                        name="regimen_usuario"
                        value="{{ old('regimen_usuario') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    >
                </div>

                {{-- Fecha Registro --}}
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Fecha Registro
                    </label>

                    <input
                        type="date"
                        name="fecha_registro"
                        value="{{ old('fecha_registro') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    >
                </div>

                {{-- Usuario Registro --}}
                <div class="md:col-span-2">
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Usuario Registro
                    </label>

                    <input
                        type="text"
                        name="usuario_registro"
                        value="{{ old('usuario_registro') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    >
                </div>

            </div>

            {{-- Botones --}}
            <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8 pt-6 border-t border-gray-100">

                <a href="{{ route('usuarios.index') }}"
                   class="text-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold px-6 py-3 rounded-xl transition">

                    Cancelar

                </a>

                <button
                    type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-8 py-3 rounded-xl shadow-md transition duration-200">

                    Guardar

                </button>

            </div>

        </form>

    </div>

</div>

@endsection