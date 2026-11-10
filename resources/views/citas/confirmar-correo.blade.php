<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de cita | SIGECIR - RENUEVA IPS</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .institucional {
            background: linear-gradient(135deg, #063d69, #0875bd, #33C4D0);
        }

        .boton {
            transition: all 0.2s ease;
        }

        .boton:hover {
            transform: translateY(-2px);
        }
    </style>
</head>

<body class="min-h-screen bg-slate-100">

    <div class="min-h-screen flex items-center justify-center py-10 px-4">

        <div class="w-full max-w-2xl">

            <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">

                {{-- ENCABEZADO INSTITUCIONAL --}}
                <div class="institucional px-6 py-8 text-center">

                    <div class="flex justify-center mb-3">
                        <div class="bg-white/20 rounded-full p-3">
                            <svg class="w-12 h-12 text-white"
                                fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </div>

                    <h1 class="text-3xl font-extrabold text-white tracking-wide">
                        RENUEVA IPS
                    </h1>

                    <p class="text-white/90 text-sm mt-2">
                        Sistema de Gestión de Citas
                    </p>

                    <span class="inline-block mt-3 px-4 py-1 rounded-full
                        bg-white/20 text-white text-xs font-bold tracking-wider">
                        SIGECIR
                    </span>

                </div>

                <div class="p-6 sm:p-8">

                    {{-- MENSAJES DEL SISTEMA --}}
                    @if(session('mensaje'))
                        <div class="mb-6 p-4 rounded-xl bg-green-50 border border-green-200 text-green-800">
                            <div class="flex items-center gap-3">
                                <span class="text-xl">✓</span>
                                <p class="font-semibold">
                                    {{ session('mensaje') }}
                                </p>
                            </div>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700">
                            <div class="flex items-center gap-3">
                                <span class="text-xl">!</span>
                                <p class="font-semibold">
                                    {{ session('error') }}
                                </p>
                            </div>
                        </div>
                    @endif

                    {{-- TÍTULO --}}
                    <div class="text-center mb-8">

                        <h2 class="text-2xl font-bold text-gray-800">
                            Gestión de confirmación de cita
                        </h2>

                        <p class="text-gray-500 mt-2 text-sm">
                            Consulta la información de tu cita y selecciona la acción que deseas realizar.
                        </p>

                    </div>

                    {{-- ESTADO DE LA CITA --}}
                    <div class="mb-6 flex justify-center">

                        @if($cita->estado_cita == 'Pendiente')

                            <span class="px-5 py-2 rounded-full bg-yellow-100 text-yellow-700 font-bold text-sm border border-yellow-200">
                                ● CITA PENDIENTE
                            </span>

                        @elseif($cita->estado_cita == 'Confirmada')

                            <span class="px-5 py-2 rounded-full bg-green-100 text-green-700 font-bold text-sm border border-green-200">
                                ● CITA CONFIRMADA
                            </span>

                        @elseif($cita->estado_cita == 'Cancelada')

                            <span class="px-5 py-2 rounded-full bg-red-100 text-red-700 font-bold text-sm border border-red-200">
                                ● CITA CANCELADA
                            </span>

                        @else

                            <span class="px-5 py-2 rounded-full bg-gray-100 text-gray-700 font-bold text-sm border border-gray-200">
                                ● {{ strtoupper($cita->estado_cita) }}
                            </span>

                        @endif

                    </div>

                    {{-- INFORMACIÓN DE LA CITA --}}
                    <div class="rounded-xl border border-gray-200 overflow-hidden">

                        <div class="bg-slate-50 px-5 py-4 border-b border-gray-200">

                            <h3 class="font-bold text-gray-800 flex items-center gap-2">
                                <svg class="w-5 h-5 text-sky-600"
                                    fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>

                                Detalles de la cita
                            </h3>

                        </div>

                        <div class="p-5 space-y-4">

                            {{-- PACIENTE --}}
                            <div class="flex justify-between gap-4 border-b border-gray-100 pb-3">

                                <span class="text-sm text-gray-500">
                                    Paciente
                                </span>

                                <span class="text-sm font-semibold text-gray-800 text-right">
                                    {{ $cita->usuario->primer_nombre ?? '' }}
                                    {{ $cita->usuario->primer_apellido ?? '' }}
                                </span>

                            </div>

                            {{-- FECHA --}}
                            <div class="flex justify-between gap-4 border-b border-gray-100 pb-3">

                                <span class="text-sm text-gray-500">
                                    Fecha de la cita
                                </span>

                                <span class="text-sm font-semibold text-gray-800 text-right">
                                    {{ \Carbon\Carbon::parse($cita->fecha_cita)->format('d/m/Y') }}
                                </span>

                            </div>

                            {{-- HORARIO --}}
                            <div class="flex justify-between gap-4 border-b border-gray-100 pb-3">

                                <span class="text-sm text-gray-500">
                                    Horario
                                </span>

                                <span class="text-sm font-semibold text-gray-800 text-right">
                                    {{ $cita->hora_inicio }} - {{ $cita->hora_fin }}
                                </span>

                            </div>

                            {{-- MODALIDAD --}}
                            <div class="flex justify-between gap-4 border-b border-gray-100 pb-3">

                                <span class="text-sm text-gray-500">
                                    Modalidad
                                </span>

                                <span class="text-sm font-semibold text-gray-800 text-right">
                                    {{ $cita->modalidad_cita }}
                                </span>

                            </div>

                            {{-- CONSULTORIO --}}
                            <div class="flex justify-between gap-4 border-b border-gray-100 pb-3">

                                <span class="text-sm text-gray-500">
                                    Consultorio
                                </span>

                                <span class="text-sm font-semibold text-gray-800 text-right">
                                    {{ $cita->consultorio }}
                                </span>

                            </div>

                        </div>

                    </div>

                    {{-- ACCIONES --}}
                    @if(in_array($cita->estado_cita, ['Pendiente', 'Confirmada']))

                        <div class="mt-8">

                            <div class="text-center mb-5">

                                <h3 class="text-lg font-bold text-gray-800">
                                    ¿Qué deseas hacer?
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    Selecciona una de las siguientes opciones.
                                </p>

                            </div>

                            {{-- CONFIRMAR CITA --}}
                            @if($cita->estado_cita == 'Pendiente')

                                <form action="{{ request()->fullUrl() }}" method="POST">

                                    @csrf

                                    <input type="hidden" name="accion" value="confirmar">

                                    <button type="submit"
                                        class="boton w-full flex items-center justify-center gap-3
                                        bg-green-600 hover:bg-green-700 text-white
                                        font-bold py-4 px-6 rounded-xl shadow-md">

                                        <svg class="w-5 h-5"
                                            fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5 13l4 4L19 7"/>
                                        </svg>

                                        CONFIRMAR MI CITA

                                    </button>

                                </form>

                            @endif

                            {{-- CANCELAR CITA --}}
                            <form action="{{ request()->fullUrl() }}"
                                method="POST"
                                class="mt-4"
                                onsubmit="return confirm('¿Estás seguro de que deseas cancelar esta cita?');">

                                @csrf

                                <input type="hidden" name="accion" value="cancelar">

                                <button type="submit"
                                    class="boton w-full flex items-center justify-center gap-3
                                    bg-white hover:bg-red-50 text-red-600
                                    border border-red-300 font-bold py-4 px-6
                                    rounded-xl shadow-sm">

                                    <svg class="w-5 h-5"
                                        fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"/>
                                    </svg>

                                    CANCELAR MI CITA

                                </button>

                            </form>

                        </div>

                    @elseif($cita->estado_cita == 'Cancelada')

                        <div class="mt-8 p-5 rounded-xl bg-red-50 border border-red-200 text-center">

                            <h3 class="text-lg font-bold text-red-700">
                                Esta cita ha sido cancelada
                            </h3>

                            <p class="text-sm text-red-600 mt-2">
                                Si necesitas atención, puedes comunicarte con RENUEVA IPS para solicitar una nueva cita.
                            </p>

                        </div>

                    @elseif($cita->estado_cita == 'Confirmada')

                        <div class="mt-8 p-5 rounded-xl bg-green-50 border border-green-200 text-center">

                            <h3 class="text-lg font-bold text-green-700">
                                Tu cita ya está confirmada
                            </h3>

                            <p class="text-sm text-green-600 mt-2">
                                Gracias por confirmar tu asistencia. Te esperamos en RENUEVA IPS.
                            </p>

                        </div>

                    @else

                        <div class="mt-8 p-5 rounded-xl bg-gray-50 border border-gray-200 text-center">

                            <p class="font-semibold text-gray-700">
                                El estado actual de tu cita es: {{ $cita->estado_cita }}.
                            </p>

                        </div>

                    @endif

                </div>

                {{-- PIE DE PÁGINA --}}
                <div class="bg-slate-50 border-t border-gray-200 px-6 py-6 text-center">

                    <p class="font-bold text-gray-700">
                        RENUEVA IPS
                    </p>

                    <p class="text-xs text-gray-500 mt-1">
                        Sistema de Gestión de Citas - SIGECIR
                    </p>

                    <p class="text-xs text-gray-400 mt-2">
                        Gracias por confiar en nuestros servicios.
                    </p>

                </div>

            </div>

            <p class="text-center text-xs text-gray-400 mt-5">
                Este enlace es personal y está destinado a la gestión de tu cita.
            </p>

        </div>

    </div>

</body>
</html>