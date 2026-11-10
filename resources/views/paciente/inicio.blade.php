@extends('layouts.paciente')

@section('titulo')
    Usuario
@endsection

@section('content')

<div class="container mx-auto mt-10 px-4">

    <div class="bg-white shadow-xl rounded-2xl border border-gray-200 p-6">

        {{-- ENCABEZADO --}}
        <div class="flex flex-col md:flex-row justify-between items-center gap-5 mb-8">

            <div class="flex items-center gap-4">
                <img src="{{ asset('images/LogoSIGECIR.png') }}"
                     alt="Logo RENUEVA IPS"
                     class="w-20 h-20 object-contain">

                <div>
                    <h1 class="text-2xl font-bold text-gray-800">
                        ¡Bienvenido Usuario!
                    </h1>

                    <p class="text-gray-500">
                        RENUEVA IPS
                    </p>
                </div>
            </div>

        </div>

        {{-- BIENVENIDA --}}
        <div class="bg-gradient-to-r from-sky-700 to-cyan-500 rounded-xl p-6 text-white mb-8">

            <h2 class="text-2xl font-bold mb-2">
                ¡Hola, {{ auth()->user()->name }}!
            </h2>

            <p>
                Desde aquí puedes gestionar tus solicitudes y consultar
                la información de tus citas médicas.
            </p>

        </div>

        {{-- OPCIONES DEL PACIENTE --}}
        <h2 class="text-xl font-bold text-gray-700 mb-5">
            ¿Qué deseas hacer?
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- SOLICITAR CITA --}}
            <div class="border rounded-xl p-6 shadow-sm hover:shadow-md transition">
                <div class="text-sky-700 text-3xl mb-3">
                    <i class="fas fa-calendar-plus"></i>
                </div>

                <h3 class="text-lg font-bold text-gray-800 mb-2">
                    Solicitar una cita
                </h3>

                <p class="text-gray-500 mb-4">
                    Solicita una nueva cita médica con nuestros profesionales.
                </p>

                <a href="{{ route('paciente.crear-cita') }}"
                   class="inline-block bg-sky-700 hover:bg-sky-800 text-white px-4 py-2 rounded-lg">
                    Solicitar cita
                </a>
            </div>

            {{-- CONSULTAR CITAS --}}
            <div class="border rounded-xl p-6 shadow-sm hover:shadow-md transition">
                <div class="text-cyan-600 text-3xl mb-3">
                    <i class="fas fa-calendar-check"></i>
                </div>

                <h3 class="text-lg font-bold text-gray-800 mb-2">
                    Mis citas
                </h3>

                <p class="text-gray-500 mb-4">
                    Consulta el estado y la información de tus citas médicas.
                </p>

                <a href="{{ route('paciente.mis-citas') }}"
                   class="inline-block bg-cyan-600 hover:bg-cyan-700 text-white px-4 py-2 rounded-lg">
                    Consultar mis citas
                </a>
            </div>

        </div>

    </div>

</div>

@endsection
