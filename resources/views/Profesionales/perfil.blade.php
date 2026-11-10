<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mi perfil | SIGECIR - RENUEVA IPS</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .institucional {
            background: linear-gradient(135deg, #063d69, #0875bd);
        }

        .enlace-menu {
            transition: all 0.2s ease;
        }

        .enlace-menu:hover,
        .enlace-menu.activo {
            background: #eaf7ee;
            color: #188638;
        }

        .enlace-menu.activo {
            font-weight: 700;
            border-left: 4px solid #20A447;
        }

        .tarjeta {
            transition: all 0.2s ease;
        }

        .tarjeta:hover {
            box-shadow: 0 10px 25px rgba(6, 61, 105, 0.08);
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-slate-100 text-gray-800">

<div class="min-h-screen flex flex-col md:flex-row">

    {{-- MENÚ LATERAL --}}
    <aside class="w-full md:w-64 bg-white border-r border-gray-200
                  flex-shrink-0">

        {{-- LOGOTIPO --}}
        <div class="px-6 py-7 border-b border-gray-100 text-center">

            <img src="{{ asset('images/logo.png') }}"
                alt="Logo SIGECIR"
                class="w-20 h-20 object-contain mx-auto mb-3">

            <h2 class="text-2xl font-extrabold text-[#063d69]">
                SIGECIR
            </h2>

            <p class="text-xs text-gray-500 mt-1">
                Portal de profesionales
            </p>

            <div class="w-16 h-1 bg-[#20A447] rounded-full mx-auto mt-4"></div>

        </div>

        {{-- NAVEGACIÓN --}}
        <div class="p-4">

            <p class="text-xs font-bold text-gray-400 uppercase
                      tracking-wider px-3 mb-3 mt-3">
                Menú principal
            </p>

            <nav class="space-y-1">

                <a href="{{ route('profesionales.dashboard') }}"
                    class="enlace-menu flex items-center gap-3 px-4 py-3
                    rounded-lg text-sm text-gray-600">

                    <i class="fa-solid fa-house w-5 text-center text-[#0875bd]"></i>
                    Inicio

                </a>

                <a href="{{ route('profesionales.agenda') }}"
                    class="enlace-menu flex items-center gap-3 px-4 py-3
                    rounded-lg text-sm text-gray-600">

                    <i class="fa-solid fa-calendar-days w-5 text-center text-[#0875bd]"></i>
                    Mi agenda

                </a>

                <a href="{{ route('profesionales.pacientes') }}"
                    class="enlace-menu flex items-center gap-3 px-4 py-3
                    rounded-lg text-sm text-gray-600">

                    <i class="fa-solid fa-users w-5 text-center text-[#0875bd]"></i>
                    Mis pacientes

                </a>

                <a href="{{ route('profesionales.notificaciones') }}"
                    class="enlace-menu flex items-center gap-3 px-4 py-3
                    rounded-lg text-sm text-gray-600">

                    <i class="fa-solid fa-bell w-5 text-center text-[#0875bd]"></i>
                    Notificaciones

                </a>

                <a href="{{ route('profesionales.horario') }}"
                    class="enlace-menu flex items-center gap-3 px-4 py-3
                    rounded-lg text-sm text-gray-600">

                    <i class="fa-solid fa-clock w-5 text-center text-[#0875bd]"></i>
                    Mi horario

                </a>

                <a href="{{ route('profesionales.perfil') }}"
                    class="enlace-menu activo flex items-center gap-3
                    px-4 py-3 rounded-lg text-sm">

                    <i class="fa-solid fa-circle-user w-5 text-center"></i>
                    Mi perfil

                </a>

            </nav>

            {{-- CUENTA --}}
            <p class="text-xs font-bold text-gray-400 uppercase
                      tracking-wider px-3 mb-3 mt-8">
                Cuenta
            </p>

            <a href="{{ url('/') }}"
                class="enlace-menu flex items-center gap-3 px-4 py-3
                rounded-lg text-sm text-gray-600">

                <i class="fa-solid fa-right-from-bracket w-5 text-center text-red-500"></i>
                Cerrar sesión

            </a>

            {{-- INFORMACIÓN DEL SISTEMA --}}
            <div class="mt-8 p-4 bg-slate-50 border border-gray-100 rounded-xl">

                <div class="flex items-center gap-2 mb-2">
                    <i class="fa-solid fa-circle-info text-[#0875bd]"></i>

                    <span class="text-xs font-bold text-[#063d69]">
                        SIGECIR
                    </span>
                </div>

                <p class="text-xs text-gray-500 leading-relaxed">
                    Sistema de Gestión de Citas de RENUEVA IPS.
                </p>

                <p class="text-xs text-gray-400 mt-2">
                    Versión 2026
                </p>

            </div>

        </div>

    </aside>


    {{-- CONTENIDO PRINCIPAL --}}
    <main class="flex-1 min-w-0 p-4 md:p-8">

        <div class="max-w-7xl mx-auto">

            {{-- ENCABEZADO --}}
            <header class="mb-8">

                <div class="flex flex-wrap items-center justify-between gap-4">

                    <div>

                        <h1 class="text-2xl md:text-3xl font-extrabold
                                   text-[#063d69]">
                            Mi perfil
                        </h1>

                        <p class="text-sm text-gray-500 mt-2">
                            Consulta tu información personal y profesional.
                        </p>

                    </div>

                    <div class="flex items-center gap-2 text-sm
                                bg-white px-4 py-2 rounded-xl
                                border border-gray-200 shadow-sm">

                        <i class="fa-solid fa-user-doctor text-[#20A447]"></i>

                        <span class="font-semibold text-gray-600">
                            Portal de profesionales
                        </span>

                    </div>

                </div>

            </header>


            {{-- PERFIL PRINCIPAL --}}
            <section class="tarjeta bg-white rounded-2xl shadow-sm
                            border border-gray-200 p-6 mb-6">

                <div class="flex flex-col sm:flex-row sm:items-center
                            gap-6">

                    {{-- AVATAR --}}
                    <div class="w-24 h-24 min-w-24 rounded-2xl
                                institucional flex items-center
                                justify-center shadow-md">

                        <i class="fa-solid fa-user-doctor
                                  text-white text-4xl"></i>

                    </div>

                    {{-- DATOS PRINCIPALES --}}
                    <div class="flex-1">

                        <h2 class="text-2xl font-bold text-[#063d69]">

                            {{ auth()->user()->nombre ?? auth()->user()->name ?? 'Profesional' }}

                        </h2>

                        <p class="text-gray-500 text-sm mt-2">
                            Profesional de RENUEVA IPS
                        </p>

                        <div class="mt-3">

                            <span class="inline-flex items-center gap-2
                                         px-3 py-1.5 rounded-full
                                         bg-green-50 text-green-700
                                         text-xs font-bold border border-green-200">

                                <i class="fa-solid fa-circle-check"></i>
                                Cuenta activa

                            </span>

                        </div>

                    </div>

                    {{-- IDENTIFICADOR --}}
                    <div class="bg-slate-50 border border-gray-100
                                rounded-xl px-5 py-4">

                        <p class="text-xs text-gray-400 font-semibold uppercase">
                            Correo de acceso
                        </p>

                        <p class="text-sm font-semibold text-[#063d69] mt-2">
                            {{ auth()->user()->email ?? 'No registrado' }}
                        </p>

                    </div>

                </div>

            </section>


            {{-- INFORMACIÓN PERSONAL --}}
            <section class="tarjeta bg-white rounded-2xl shadow-sm
                            border border-gray-200 p-6 mb-6">

                <div class="flex items-center gap-3 border-b
                            border-gray-100 pb-4 mb-6">

                    <div class="w-10 h-10 rounded-xl bg-blue-50
                                flex items-center justify-center">

                        <i class="fa-solid fa-user text-[#0875bd]"></i>

                    </div>

                    <div>

                        <h2 class="font-bold text-lg text-[#063d69]">
                            Información personal
                        </h2>

                        <p class="text-xs text-gray-400">
                            Datos generales del profesional.
                        </p>

                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-xs font-semibold
                                      text-gray-400 mb-2">
                            Nombres
                        </label>

                        <p class="text-sm font-semibold text-gray-700
                                  border-b border-gray-100 pb-3">

                            {{ auth()->user()->nombre ?? auth()->user()->name ?? 'No registrado' }}

                        </p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold
                                      text-gray-400 mb-2">
                            Apellidos
                        </label>

                        <p class="text-sm font-semibold text-gray-700
                                  border-b border-gray-100 pb-3">

                            {{ auth()->user()->apellido ?? 'No registrado' }}

                        </p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold
                                      text-gray-400 mb-2">
                            Documento de identidad
                        </label>

                        <p class="text-sm font-semibold text-gray-700
                                  border-b border-gray-100 pb-3">

                            {{ auth()->user()->numero_documento ?? 'No registrado' }}

                        </p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold
                                      text-gray-400 mb-2">
                            Teléfono
                        </label>

                        <p class="text-sm font-semibold text-gray-700
                                  border-b border-gray-100 pb-3">

                            {{ auth()->user()->telefono ?? 'No registrado' }}

                        </p>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold
                                      text-gray-400 mb-2">
                            Correo electrónico
                        </label>

                        <p class="text-sm font-semibold text-gray-700
                                  border-b border-gray-100 pb-3">

                            {{ auth()->user()->email ?? 'No registrado' }}

                        </p>
                    </div>

                </div>

            </section>


            {{-- INFORMACIÓN PROFESIONAL --}}
            <section class="tarjeta bg-white rounded-2xl shadow-sm
                            border border-gray-200 p-6 mb-6">

                <div class="flex items-center gap-3 border-b
                            border-gray-100 pb-4 mb-6">

                    <div class="w-10 h-10 rounded-xl bg-green-50
                                flex items-center justify-center">

                        <i class="fa-solid fa-briefcase text-[#20A447]"></i>

                    </div>

                    <div>

                        <h2 class="font-bold text-lg text-[#063d69]">
                            Información profesional
                        </h2>

                        <p class="text-xs text-gray-400">
                            Información relacionada con tu actividad profesional.
                        </p>

                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-xs font-semibold
                                      text-gray-400 mb-2">
                            Especialidad
                        </label>

                        <p class="text-sm font-semibold text-gray-700
                                  border-b border-gray-100 pb-3">

                            {{ auth()->user()->especialidad ?? 'No registrada' }}

                        </p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold
                                      text-gray-400 mb-2">
                            Consultorio asignado
                        </label>

                        <p class="text-sm font-semibold text-gray-700
                                  border-b border-gray-100 pb-3">

                            {{ auth()->user()->consultorio ?? 'No asignado' }}

                        </p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold
                                      text-gray-400 mb-2">
                            Institución
                        </label>

                        <p class="text-sm font-semibold text-gray-700
                                  border-b border-gray-100 pb-3">
                            RENUEVA IPS
                        </p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold
                                      text-gray-400 mb-2">
                            Estado de la cuenta
                        </label>

                        <p class="text-sm font-semibold text-green-600
                                  border-b border-gray-100 pb-3">

                            <i class="fa-solid fa-circle-check mr-1"></i>
                            Activo

                        </p>
                    </div>

                </div>

            </section>


            {{-- SEGURIDAD --}}
            <section class="tarjeta bg-white rounded-2xl shadow-sm
                            border border-gray-200 p-6 mb-6">

                <div class="flex items-center gap-3 border-b
                            border-gray-100 pb-4 mb-6">

                    <div class="w-10 h-10 rounded-xl bg-cyan-50
                                flex items-center justify-center">

                        <i class="fa-solid fa-shield-halved text-[#0875bd]"></i>

                    </div>

                    <div>

                        <h2 class="font-bold text-lg text-[#063d69]">
                            Seguridad de la cuenta
                        </h2>

                        <p class="text-xs text-gray-400">
                            Información de acceso al sistema.
                        </p>

                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-xs font-semibold
                                      text-gray-400 mb-2">
                            Usuario de acceso
                        </label>

                        <p class="text-sm font-semibold text-gray-700
                                  border-b border-gray-100 pb-3">

                            {{ auth()->user()->email ?? 'No registrado' }}

                        </p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold
                                      text-gray-400 mb-2">
                            Contraseña
                        </label>

                        <p class="text-sm font-semibold text-gray-700
                                  border-b border-gray-100 pb-3">

                            ••••••••••••••

                        </p>
                    </div>

                </div>

                <div class="mt-6 p-4 rounded-xl bg-blue-50
                            border border-blue-100">

                    <div class="flex items-start gap-3">

                        <i class="fa-solid fa-circle-info
                                  text-[#0875bd] mt-1"></i>

                        <p class="text-sm text-gray-600 leading-relaxed">

                            Los datos de acceso son administrados mediante
                            el sistema de usuarios de SIGECIR. Si necesitas
                            actualizar tu información, puedes solicitar
                            el cambio al administrador.

                        </p>

                    </div>

                </div>

            </section>


            {{-- PIE --}}
            <footer class="text-center py-6">

                <p class="text-xs text-gray-400">
                    SIGECIR 2026 · RENUEVA IPS
                </p>

                <p class="text-xs text-gray-400 mt-1">
                    Sistema de Gestión de Citas
                </p>

            </footer>

        </div>

    </main>

</div>

</body>
</html>
