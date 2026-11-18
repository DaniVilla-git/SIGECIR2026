@extends('layouts.app')

@section('titulo')
    Editar Usuario
@endsection

@section('content')

<div class="container mx-auto mt-8 px-4 pb-10">

    {{-- CONTENEDOR PRINCIPAL --}}
    <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-2xl border border-slate-200 overflow-hidden">

        {{-- ENCABEZADO --}}
        <div class="bg-gradient-to-r from-[#063d69] via-[#0875bd] to-[#20a4a7] px-6 py-7 text-white">

            <div class="flex items-center gap-4">

                <div class="bg-white/20 p-3 rounded-xl">
                    <i class="fas fa-user-edit text-2xl"></i>
                </div>

                <div>
                    <h2 class="text-2xl font-bold">
                        Editar Usuario
                    </h2>

                    <p class="text-sm text-blue-50 mt-1">
                        Actualiza la información del usuario registrado en SIGECIR.
                    </p>
                </div>

            </div>

        </div>

        {{-- FORMULARIO --}}
        <div class="p-6 md:p-8">

            {{-- ERRORES DE VALIDACIÓN --}}
            @if($errors->any())

                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-4 rounded-xl mb-6">

                    <p class="font-semibold mb-2">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        Por favor, revisa los siguientes errores:
                    </p>

                    <ul class="list-disc pl-5 space-y-1 text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>

            @endif

            <form action="{{ route('usuarios.update', $usuarios->id) }}" method="POST">

                @csrf
                @method('PUT')

                {{-- ================= INFORMACIÓN PERSONAL ================= --}}
                <div class="mb-8">

                    <h3 class="text-lg font-bold text-[#063d69] mb-5 border-b border-slate-200 pb-3">
                        <i class="fas fa-id-card mr-2"></i>
                        Información personal
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- TIPO DE DOCUMENTO --}}
                        <div>
                            <label for="tipo_documento" class="block mb-2 text-sm font-semibold text-gray-700">
                                Tipo de documento
                            </label>

                            <select
                                name="tipo_documento"
                                id="tipo_documento"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-[#0875bd] focus:border-[#0875bd] transition">

                                <option value="CC" {{ old('tipo_documento', $usuarios->tipo_documento) == 'CC' ? 'selected' : '' }}>
                                    Cédula de ciudadanía
                                </option>

                                <option value="TI" {{ old('tipo_documento', $usuarios->tipo_documento) == 'TI' ? 'selected' : '' }}>
                                    Tarjeta de identidad
                                </option>

                                <option value="CE" {{ old('tipo_documento', $usuarios->tipo_documento) == 'CE' ? 'selected' : '' }}>
                                    Cédula de extranjería
                                </option>

                                <option value="PA" {{ old('tipo_documento', $usuarios->tipo_documento) == 'PA' ? 'selected' : '' }}>
                                    Pasaporte
                                </option>

                            </select>
                        </div>

                        {{-- NÚMERO DE DOCUMENTO --}}
                        <div>
                            <label for="numero_documento" class="block mb-2 text-sm font-semibold text-gray-700">
                                Número de documento
                            </label>

                            <input
                                type="text"
                                name="numero_documento"
                                id="numero_documento"
                                value="{{ old('numero_documento', $usuarios->numero_documento) }}"
                                placeholder="Ingrese el número de documento"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#0875bd] focus:border-[#0875bd] transition">
                        </div>

                        {{-- PRIMER NOMBRE --}}
                        <div>
                            <label for="primer_nombre" class="block mb-2 text-sm font-semibold text-gray-700">
                                Primer nombre
                            </label>

                            <input
                                type="text"
                                name="primer_nombre"
                                id="primer_nombre"
                                value="{{ old('primer_nombre', $usuarios->primer_nombre) }}"
                                placeholder="Ingrese el primer nombre"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#0875bd] focus:border-[#0875bd] transition">
                        </div>

                        {{-- SEGUNDO NOMBRE --}}
                        <div>
                            <label for="segundo_nombre" class="block mb-2 text-sm font-semibold text-gray-700">
                                Segundo nombre
                            </label>

                            <input
                                type="text"
                                name="segundo_nombre"
                                id="segundo_nombre"
                                value="{{ old('segundo_nombre', $usuarios->segundo_nombre) }}"
                                placeholder="Ingrese el segundo nombre"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#0875bd] focus:border-[#0875bd] transition">
                        </div>

                        {{-- PRIMER APELLIDO --}}
                        <div>
                            <label for="primer_apellido" class="block mb-2 text-sm font-semibold text-gray-700">
                                Primer apellido
                            </label>

                            <input
                                type="text"
                                name="primer_apellido"
                                id="primer_apellido"
                                value="{{ old('primer_apellido', $usuarios->primer_apellido) }}"
                                placeholder="Ingrese el primer apellido"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#0875bd] focus:border-[#0875bd] transition">
                        </div>

                        {{-- SEGUNDO APELLIDO --}}
                        <div>
                            <label for="segundo_apellido" class="block mb-2 text-sm font-semibold text-gray-700">
                                Segundo apellido
                            </label>

                            <input
                                type="text"
                                name="segundo_apellido"
                                id="segundo_apellido"
                                value="{{ old('segundo_apellido', $usuarios->segundo_apellido) }}"
                                placeholder="Ingrese el segundo apellido"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#0875bd] focus:border-[#0875bd] transition">
                        </div>

                    </div>
                </div>

                {{-- ================= INFORMACIÓN DE CONTACTO ================= --}}
                <div class="mb-8">

                    <h3 class="text-lg font-bold text-[#063d69] mb-5 border-b border-slate-200 pb-3">
                        <i class="fas fa-address-book mr-2"></i>
                        Información de contacto
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- TELÉFONO --}}
                        <div>
                            <label for="telefono_usuario" class="block mb-2 text-sm font-semibold text-gray-700">
                                Teléfono
                            </label>

                            <input
                                type="text"
                                name="telefono_usuario"
                                id="telefono_usuario"
                                value="{{ old('telefono_usuario', $usuarios->telefono_usuario) }}"
                                placeholder="Ingrese el teléfono"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#0875bd] focus:border-[#0875bd] transition">
                        </div>

                        {{-- CORREO --}}
                        <div>
                            <label for="correo_usuario" class="block mb-2 text-sm font-semibold text-gray-700">
                                Correo electrónico
                            </label>

                            <input
                                type="email"
                                name="correo_usuario"
                                id="correo_usuario"
                                value="{{ old('correo_usuario', $usuarios->correo_usuario) }}"
                                placeholder="ejemplo@correo.com"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#0875bd] focus:border-[#0875bd] transition">
                        </div>

                    </div>
                </div>

                {{-- ================= INFORMACIÓN DE AFILIACIÓN ================= --}}
                <div class="mb-8">

                    <h3 class="text-lg font-bold text-[#063d69] mb-5 border-b border-slate-200 pb-3">
                        <i class="fas fa-hospital mr-2"></i>
                        Información de afiliación
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- EPS --}}
                        <div>
                            <label for="eps_usuario" class="block mb-2 text-sm font-semibold text-gray-700">
                                EPS
                            </label>

                            <input
                                type="text"
                                name="eps_usuario"
                                id="eps_usuario"
                                value="{{ old('eps_usuario', $usuarios->eps_usuario) }}"
                                placeholder="Ingrese la EPS"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#0875bd] focus:border-[#0875bd] transition">
                        </div>

                        {{-- RÉGIMEN --}}
                        <div>
                            <label for="regimen_usuario" class="block mb-2 text-sm font-semibold text-gray-700">
                                Régimen
                            </label>

                            <select
                                name="regimen_usuario"
                                id="regimen_usuario"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-[#0875bd] focus:border-[#0875bd] transition">

                                <option value="">Seleccione un régimen</option>

                                <option value="Contributivo" {{ old('regimen_usuario', $usuarios->regimen_usuario) == 'Contributivo' ? 'selected' : '' }}>
                                    Contributivo
                                </option>

                                <option value="Subsidiado" {{ old('regimen_usuario', $usuarios->regimen_usuario) == 'Subsidiado' ? 'selected' : '' }}>
                                    Subsidiado
                                </option>

                                <option value="Especial" {{ old('regimen_usuario', $usuarios->regimen_usuario) == 'Especial' ? 'selected' : '' }}>
                                    Especial
                                </option>

                                <option value="Excepción" {{ old('regimen_usuario', $usuarios->regimen_usuario) == 'Excepción' ? 'selected' : '' }}>
                                    Excepción
                                </option>

                            </select>
                        </div>

                    </div>
                </div>

                {{-- ================= INFORMACIÓN DE REGISTRO ================= --}}
                <div class="mb-8">

                    <h3 class="text-lg font-bold text-[#063d69] mb-5 border-b border-slate-200 pb-3">
                        <i class="fas fa-clipboard-list mr-2"></i>
                        Información de registro
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- FECHA DE REGISTRO --}}
                        <div>
                            <label for="fecha_registro" class="block mb-2 text-sm font-semibold text-gray-700">
                                Fecha de registro
                            </label>

                            <input
                                type="date"
                                name="fecha_registro"
                                id="fecha_registro"
                                value="{{ old('fecha_registro', $usuarios->fecha_registro) }}"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#0875bd] focus:border-[#0875bd] transition">
                        </div>

                        {{-- USUARIO DE REGISTRO --}}
                        <div>
                            <label for="usuario_registro" class="block mb-2 text-sm font-semibold text-gray-700">
                                Usuario de registro
                            </label>

                            <select
                                name="usuario_registro"
                                id="usuario_registro"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-[#0875bd] focus:border-[#0875bd] transition">

                                <option value="ADMIN"
                                    {{ old('usuario_registro', $usuarios->usuario_registro) == 'ADMIN' ? 'selected' : '' }}>
                                    ADMIN
                                </option>

                            </select>
                        </div>

                    </div>
                </div>

                {{-- BOTONES --}}
                <div class="flex flex-col sm:flex-row justify-end gap-3 pt-6 border-t border-slate-200">

                    <a
                        href="{{ route('usuarios.index') }}"
                        class="inline-flex items-center justify-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold px-6 py-3 rounded-xl transition">

                        <i class="fas fa-times"></i>
                        Cancelar

                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-[#063d69] to-[#0875bd] hover:from-[#052f50] hover:to-[#06649f] text-white font-semibold px-8 py-3 rounded-xl shadow-md hover:shadow-lg transition duration-200">

                        <i class="fas fa-save"></i>
                        Guardar cambios

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
