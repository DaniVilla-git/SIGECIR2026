@extends('layouts.paciente')

@section('titulo')
    Portal del paciente
@endsection

@section('content')

<div class="min-h-screen bg-gray-50 py-8 px-4">

    <div class="max-w-7xl mx-auto">

        {{-- BIENVENIDA --}}
        <div class="relative overflow-hidden rounded-2xl shadow-lg mb-8"
             style="background: linear-gradient(120deg, #063d69, #0875bd, #009fd4);">

            <div class="absolute -right-10 -top-16 w-64 h-64 rounded-full bg-white opacity-10"></div>
            <div class="absolute right-40 -bottom-24 w-52 h-52 rounded-full bg-white opacity-10"></div>

            <div class="relative z-10 p-8 md:p-10">

                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">

                    <div>
                        <span class="inline-flex items-center gap-2 bg-white bg-opacity-20 text-white px-4 py-2 rounded-full text-sm mb-4">
                            <i class="fas fa-heartbeat"></i>
                            RENUEVA IPS - SIGECIR
                        </span>

                        <h1 class="text-3xl md:text-4xl font-bold text-white mb-3">
                            ¡Bienvenido Usuario!
                        </h1>

                        <p class="text-blue-100 text-base md:text-lg">
                            Gestiona tus citas y mantén actualizada tu información personal.
                        </p>
                    </div>

                    <div class="hidden md:flex items-center justify-center bg-white bg-opacity-15 rounded-2xl w-28 h-28">
                        <i class="fas fa-user-circle text-white text-7xl"></i>
                    </div>

                </div>

            </div>
        </div>


        {{-- MENSAJE INFORMATIVO --}}
        <div class="bg-white border border-blue-100 rounded-xl p-5 mb-8 shadow-sm flex items-start gap-4">

            <div class="flex-shrink-0 bg-blue-100 text-blue-600 rounded-xl p-3">
                @include('layouts.partials.icons', ['icon' => 'salud'])
            </div>

            <div>
                <h2 class="font-bold text-gray-800 mb-1">
                    Tu salud es nuestra prioridad
                </h2>

                <p class="text-gray-500 text-sm">
                    Desde este espacio puedes solicitar tus citas médicas,
                    consultar su estado y actualizar tus datos de contacto.
                </p>
            </div>

        </div>


        {{-- OPCIONES DEL PACIENTE --}}
        <div class="mb-6">

            <h2 class="text-2xl font-bold text-gray-800">
                ¿Qué deseas hacer?
            </h2>

            <p class="text-gray-500 mt-1">
                Selecciona una de las siguientes opciones.
            </p>

        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            {{-- SOLICITAR CITA --}}
            <a href="{{ route('paciente.crear-cita') }}"
               class="group bg-white rounded-2xl border border-gray-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">

                <div class="h-2" style="background: #009fd4;"></div>

                <div class="p-7">

                    <div class="w-16 h-16 rounded-2xl flex items-center justify-center mb-6"
                         style="background: #e0f5fc; color: #0875bd;">

                        @include('layouts.partials.icons', ['icon' => 'cita'])

                    </div>

                    <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-blue-700">
                        Solicitar una cita
                    </h3>

                    <p class="text-gray-500 text-sm leading-relaxed mb-6">
                        Programa una nueva cita médica seleccionando el servicio,
                        profesional y horario disponible.
                    </p>

                    <span class="inline-flex items-center gap-2 font-bold text-sm"
                          style="color: #0875bd;">

                        Solicitar ahora
                        <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>

                    </span>

                </div>
            </a>


            {{-- MIS CITAS --}}
            <a href="{{ route('paciente.mis-citas') }}"
               class="group bg-white rounded-2xl border border-gray-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">

                <div class="h-2" style="background: #20a447;"></div>

                <div class="p-7">

                    <div class="w-16 h-16 rounded-2xl flex items-center justify-center mb-6 bg-green-100 text-green-600">

                        @include('layouts.partials.icons', ['icon' => 'micita'])

                    </div>

                    <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-green-700">
                        Mis citas
                    </h3>

                    <p class="text-gray-500 text-sm leading-relaxed mb-6">
                        Consulta tus citas registradas y revisa la información
                        y el estado de tus solicitudes.
                    </p>

                    <span class="inline-flex items-center gap-2 font-bold text-sm text-green-600">

                        Consultar mis citas
                        <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>

                    </span>

                </div>
            </a>


            {{-- EDITAR DATOS --}}
            <a href="{{ url('/paciente/mis-datos') }}"
               class="group bg-white rounded-2xl border border-gray-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">

                <div class="h-2" style="background: #33C4D0;"></div>

                <div class="p-7">

                    <div class="w-16 h-16 rounded-2xl flex items-center justify-center mb-6 bg-cyan-100 text-cyan-600">

                        @include('layouts.partials.icons', ['icon' => 'editardatos'])

                    </div>

                    <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-cyan-700">
                        Editar mis datos
                    </h3>

                    <p class="text-gray-500 text-sm leading-relaxed mb-6">
                        Actualiza tu correo electrónico y número de teléfono
                        para mantener tu información al día.
                    </p>

                    <span class="inline-flex items-center gap-2 font-bold text-sm text-cyan-600">

                        Actualizar información
                        <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>

                    </span>

                </div>
            </a>

        </div>


        {{-- PIE INFORMATIVO --}}
        <div class="mt-10 text-center border-t border-gray-200 pt-6">

            <div class="flex justify-center items-center gap-2 text-gray-400 mb-2">
                <i class="fas fa-heartbeat" style="color: #009fd4;"></i>
                <span class="font-bold text-gray-600">RENUEVA IPS</span>
            </div>

            <p class="text-gray-400 text-sm">
                SIGECIR - Sistema de Gestión de Citas
            </p>

            

        </div>

    </div>

</div>

@endsection

