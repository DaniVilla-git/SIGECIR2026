@extends('layouts.app')

@section('titulo')
    Crear Profesional
@endsection

@section('content')
<div class="container mx-auto mt-10 px-4">

    <div class="max-w-2xl mx-auto bg-white shadow-xl rounded-2xl p-8 border border-gray-100">

        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">
                Nuevo Profesional
            </h2>

            <p class="text-gray-500 mt-2">
                Registre la información del profesional
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

        <form action="{{ route('profesionales.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Nombre Profesional
                    </label>
                    <input
                        type="text"
                        name="nombre_profesional"
                        value="{{ old('nombre_profesional') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                    >
                </div>

                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Apellido Profesional
                    </label>
                    <input
                        type="text"
                        name="apellido_profesional"
                        value="{{ old('apellido_profesional') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                    >
                </div>

                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Especialidad
                    </label>
                    <input
                        type="text"
                        name="especialidad"
                        value="{{ old('especialidad') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                    >
                </div>

                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Consultorio
                    </label>
                    <input
                        type="text"
                        name="consultorio"
                        value="{{ old('consultorio') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                    >
                </div>

                <div class="md:col-span-2">
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Correo
                    </label>
                    <input
                        type="text"
                        name="correo"
                        value="{{ old('correo') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                    >
                </div>
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Contraseña de acceso
                    </label>

                    <input
                        type="password"
                        name="password"
                        required
                        minlength="8"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 outline-none"
                        placeholder="Mínimo 8 caracteres"
                    >
                </div>

                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Confirmar contraseña
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        required
                        minlength="8"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 outline-none"
                        placeholder="Repita la contraseña"
                    >
                </div>

                <div class="md:col-span-2">
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Firma digital
                    </label>
                    <input
                        type="file"
                        name="firma"
                        accept="image/png,image/jpeg"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 bg-gray-50 text-gray-600 focus:ring-2 focus:ring-indigo-500"
                    >
                    <p class="text-xs text-gray-500 mt-2">
                        Formatos permitidos: PNG y JPG.
                    </p>
                </div>

            </div>

            <div class="flex flex-col sm:flex-row justify-center gap-3 mt-8">

                <a href="{{ route('profesionales.index') }}"
                   class="text-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-xl px-6 py-3 transition">
                    Cancelar
                </a>

                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl px-6 py-3 shadow-md transition">
                    Guardar Profesional
                </button>

            </div>

        </form>

    </div>
</div>
@endsection