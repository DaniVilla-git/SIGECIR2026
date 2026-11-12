@extends('layouts.paciente')

@section('titulo')
    Editar mis datos
@endsection

@section('content')

<div class="container mx-auto mt-8 px-4 pb-10">

    <div class="bg-white shadow-xl rounded-2xl border border-slate-200 p-6 max-w-3xl mx-auto">

        {{-- ENCABEZADO --}}
        <div class="flex items-center gap-4 mb-8 border-b border-slate-200 pb-6">

            <div class="bg-[#e6f7fc] text-[#0875bd] rounded-xl p-4">
                @include('layouts.partials.icons', ['icon' => 'miperfil'])
            </div>

            <div>
                <h1 class="text-2xl font-bold text-[#063d69]">
                    Mis datos personales
                </h1>

                <p class="text-slate-500">RENUEVA IPS</p>

                <p class="text-sm text-slate-400 mt-1">
                    Consulta tu información y actualiza tus datos de contacto.
                </p>
            </div>

        </div>

        {{-- MENSAJE DE ÉXITO --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        @endif

        {{-- ERRORES --}}
        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-xl mb-6">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(isset($paciente) && $paciente)

            <form action="{{ route('paciente.paciente.perfil.update') }}" method="POST">

                @csrf
                @method('PUT')

                {{-- INFORMACIÓN PERSONAL --}}
                <div class="mb-6">

                    <h2 class="text-lg font-bold text-[#063d69] mb-4">
                        <i class="fas fa-id-card mr-2 text-[#0875bd]"></i>
                        Información personal
                    </h2>

                    <p class="text-sm text-slate-500 mb-4">
                        Esta información es de solo lectura y no puede modificarse.
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- PRIMER NOMBRE --}}
                        <div>
                            <label class="block text-slate-700 font-semibold mb-2">
                                Primer nombre
                            </label>

                            <input
                                type="text"
                                value="{{ $paciente->primer_nombre }}"
                                readonly
                                class="w-full border border-slate-200 bg-slate-100 text-slate-600 rounded-lg px-4 py-3 cursor-not-allowed"
                            >
                        </div>

                        {{-- SEGUNDO NOMBRE --}}
                        <div>
                            <label class="block text-slate-700 font-semibold mb-2">
                                Segundo nombre
                            </label>

                            <input
                                type="text"
                                value="{{ $paciente->segundo_nombre }}"
                                readonly
                                class="w-full border border-slate-200 bg-slate-100 text-slate-600 rounded-lg px-4 py-3 cursor-not-allowed"
                            >
                        </div>

                        {{-- PRIMER APELLIDO --}}
                        <div>
                            <label class="block text-slate-700 font-semibold mb-2">
                                Primer apellido
                            </label>

                            <input
                                type="text"
                                value="{{ $paciente->primer_apellido }}"
                                readonly
                                class="w-full border border-slate-200 bg-slate-100 text-slate-600 rounded-lg px-4 py-3 cursor-not-allowed"
                            >
                        </div>

                        {{-- SEGUNDO APELLIDO --}}
                        <div>
                            <label class="block text-slate-700 font-semibold mb-2">
                                Segundo apellido
                            </label>

                            <input
                                type="text"
                                value="{{ $paciente->segundo_apellido }}"
                                readonly
                                class="w-full border border-slate-200 bg-slate-100 text-slate-600 rounded-lg px-4 py-3 cursor-not-allowed"
                            >
                        </div>

                        {{-- DOCUMENTO DE IDENTIDAD --}}
                        <div>
                            <label class="block text-slate-700 font-semibold mb-2">
                                Documento de identidad
                            </label>

                            <input
                                type="text"
                                value="{{ $paciente->documento_identidad }}"
                                readonly
                                class="w-full border border-slate-200 bg-slate-100 text-slate-600 rounded-lg px-4 py-3 cursor-not-allowed"
                            >
                        </div>

                    </div>

                </div>

                {{-- DATOS DE CONTACTO --}}
                <div class="border-t border-slate-200 pt-6">

                    <h2 class="text-lg font-bold text-[#063d69] mb-4">
                        <i class="fas fa-address-book mr-2 text-[#0875bd]"></i>
                        Datos de contacto
                    </h2>

                    <p class="text-sm text-slate-500 mb-4">
                        Puedes actualizar tu correo electrónico y número de teléfono.
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- CORREO --}}
                        <div>
                            <label class="block text-slate-700 font-semibold mb-2">
                                Correo electrónico
                            </label>

                            <div class="relative">
                                <i class="fas fa-envelope absolute left-3 top-3.5 text-[#0875bd]"></i>

                                <input
                                    type="email"
                                    name="correo_usuario"
                                    value="{{ old('correo_usuario', $paciente->correo_usuario) }}"
                                    required
                                    maxlength="255"
                                    class="w-full border border-slate-300 rounded-lg pl-10 pr-4 py-3 focus:ring-2 focus:ring-[#0875bd] focus:outline-none"
                                >
                            </div>

                            <p class="text-xs text-green-600 mt-2">
                                <i class="fas fa-pen mr-1"></i>
                                Campo editable.
                            </p>
                        </div>

                        {{-- TELÉFONO --}}
                        <div>
                            <label class="block text-slate-700 font-semibold mb-2">
                                Número de teléfono
                            </label>

                            <div class="relative">
                                <i class="fas fa-phone absolute left-3 top-3.5 text-[#0875bd]"></i>

                                <input
                                    type="text"
                                    name="telefono_usuario"
                                    value="{{ old('telefono_usuario', $paciente->telefono_usuario) }}"
                                    required
                                    maxlength="20"
                                    class="w-full border border-slate-300 rounded-lg pl-10 pr-4 py-3 focus:ring-2 focus:ring-[#0875bd] focus:outline-none"
                                >
                            </div>

                            <p class="text-xs text-green-600 mt-2">
                                <i class="fas fa-pen mr-1"></i>
                                Campo editable.
                            </p>
                        </div>

                    </div>

                </div>

                {{-- BOTONES --}}
                <div class="flex flex-col sm:flex-row gap-3 justify-end mt-8 border-t border-slate-200 pt-6">

                    <a href="{{ route('paciente.inicio') }}"
                       class="text-center bg-slate-200 hover:bg-slate-300 text-slate-700 px-5 py-3 rounded-lg font-semibold transition">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Cancelar
                    </a>

                    <button type="submit"
                            class="bg-[#0875bd] hover:bg-[#063d69] text-white px-5 py-3 rounded-lg font-semibold transition">
                        <i class="fas fa-save mr-2"></i>
                        Guardar cambios
                    </button>

                </div>

            </form>

        @else

            <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl">
                No se encontró la información del paciente.
                Por favor, comunícate con el administrador.
            </div>

            <div class="mt-5">
                <a href="{{ route('paciente.inicio') }}"
                   class="text-[#0875bd] hover:text-[#063d69] font-semibold">
                    Volver al inicio
                </a>
            </div>

        @endif

    </div>

</div>

@endsection
