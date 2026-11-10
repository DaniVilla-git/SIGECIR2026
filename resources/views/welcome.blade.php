<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>RENUEVA IPS | SIGECIR</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        .institucional {
            background: linear-gradient(135deg, #063d69, #0875bd);
        }

        .tarjeta {
            transition: all 0.3s ease;
        }

        .tarjeta:hover {
            transform: translateY(-7px);
        }

        .boton {
            transition: all 0.3s ease;
        }

        .boton:hover {
            transform: translateY(-2px);
        }
    </style>
</head>

<body class="bg-slate-50 text-gray-800">

    {{-- ENCABEZADO --}}
    <header class="bg-white shadow-md sticky top-0 z-50 border-b border-gray-100">

        <nav class="max-w-7xl mx-auto px-6 py-4 flex flex-wrap
                    items-center justify-between gap-4">

            {{-- LOGOTIPO --}}
            <a href="#inicio" class="flex items-center gap-3">

                <div class="institucional w-11 h-11 rounded-xl
                            flex items-center justify-center shadow-md">

                    <svg class="w-7 h-7 text-white"
                        fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 4v16m8-8H4"/>
                    </svg>

                </div>

                <div>
                    <h1 class="text-xl font-extrabold text-[#063d69]">
                        RENUEVA <span class="text-[#20A447]">IPS</span>
                    </h1>

                    <p class="text-xs text-gray-500 font-medium">
                        Sistema SIGECIR
                    </p>
                </div>

            </a>

            {{-- NAVEGACIÓN --}}
            <div class="flex flex-wrap items-center gap-5 text-sm font-semibold">

                <a href="#inicio"
                   class="text-gray-600 hover:text-[#0875bd] transition">
                    Inicio
                </a>

                <a href="#nosotros"
                   class="text-gray-600 hover:text-[#0875bd] transition">
                    Quiénes somos
                </a>

                <a href="#servicios"
                   class="text-gray-600 hover:text-[#0875bd] transition">
                    Servicios
                </a>

                <a href="{{ route('login') }}"
                   class="boton institucional text-white px-6 py-2.5
                          rounded-xl shadow-md font-bold">
                    Iniciar sesión
                </a>

            </div>

        </nav>

    </header>


    {{-- SECCIÓN PRINCIPAL --}}
    <section id="inicio" class="institucional relative overflow-hidden">

        {{-- DECORACIÓN --}}
        <div class="absolute -top-24 -right-24 w-96 h-96
                    bg-white opacity-5 rounded-full"></div>

        <div class="absolute -bottom-32 -left-20 w-96 h-96
                    bg-[#33C4D0] opacity-10 rounded-full"></div>

        <div class="relative max-w-7xl mx-auto px-6 py-24 md:py-32
                    text-center text-white">

            <span class="inline-block px-5 py-2 rounded-full
                         bg-white/10 border border-white/20
                         text-sm font-semibold tracking-wider mb-7">

                BIENVENIDOS A RENUEVA IPS

            </span>

            <h2 class="text-4xl md:text-6xl font-extrabold
                       mb-6 leading-tight">

                Cuidamos de ti,
                <span class="text-[#33C4D0]">
                    pensamos en tu bienestar.
                </span>

            </h2>

            <p class="text-blue-100 text-base md:text-xl
                      max-w-3xl mx-auto leading-relaxed mb-10">

                Trabajamos por el bienestar y la atención en salud,
                brindando servicios con compromiso, responsabilidad
                y calidad humana.

            </p>

            <div class="flex flex-wrap justify-center gap-4">

                <a href="{{ route('login') }}"
                   class="boton bg-[#20A447] hover:bg-green-700
                          text-white font-bold px-8 py-4 rounded-xl
                          shadow-lg">

                    Acceder a SIGECIR

                </a>

                <a href="#nosotros"
                   class="boton bg-white hover:bg-gray-100
                          text-[#063d69] font-bold px-8 py-4
                          rounded-xl shadow-lg">

                    Conócenos

                </a>

            </div>

            {{-- IDENTIFICACIÓN DEL SISTEMA --}}
            <div class="mt-16 flex flex-wrap justify-center gap-8
                        text-sm text-blue-100">

                <div class="flex items-center gap-2">
                    <span class="text-[#33C4D0]">✓</span>
                    Atención organizada
                </div>

                <div class="flex items-center gap-2">
                    <span class="text-[#33C4D0]">✓</span>
                    Gestión de citas
                </div>

                <div class="flex items-center gap-2">
                    <span class="text-[#33C4D0]">✓</span>
                    Compromiso con el usuario
                </div>

            </div>

        </div>

    </section>


    {{-- QUIÉNES SOMOS --}}
    <section id="nosotros" class="py-20 px-6">

        <div class="max-w-7xl mx-auto grid md:grid-cols-2
                    gap-14 items-center">

            {{-- INFORMACIÓN --}}
            <div>

                <span class="text-[#20A447] font-bold uppercase
                             tracking-widest text-sm">

                    CONÓCENOS

                </span>

                <h2 class="text-3xl md:text-4xl font-extrabold
                           text-[#063d69] mt-3 mb-6">

                    ¿Quiénes somos?

                </h2>

                <div class="w-20 h-1 bg-[#20A447] rounded-full mb-7"></div>

                <p class="text-gray-600 leading-relaxed mb-5">

                    RENUEVA IPS es una institución prestadora de
                    servicios de salud comprometida con el bienestar
                    de sus usuarios, ofreciendo atención con calidad,
                    responsabilidad y respeto.

                </p>

                <p class="text-gray-600 leading-relaxed">

                    Nuestro propósito es facilitar el acceso a los
                    servicios de salud mediante una atención organizada,
                    oportuna y centrada en las necesidades de cada persona.

                </p>

            </div>

            {{-- TARJETA INSTITUCIONAL --}}
            <div class="bg-white rounded-2xl shadow-xl
                        border border-gray-100 overflow-hidden">

                <div class="institucional p-8 text-center">

                    <div class="w-20 h-20 bg-white/15 rounded-2xl
                                flex items-center justify-center
                                mx-auto mb-5">

                        <svg class="w-12 h-12 text-white"
                            fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4M9 9v.01M9 12v.01M9 15v.01M9 18v.01M14 9v.01M14 12v.01M14 15v.01M14 18v.01"/>
                        </svg>

                    </div>

                    <h3 class="text-2xl font-bold text-white mb-3">
                        Nuestro compromiso
                    </h3>

                    <p class="text-blue-100 leading-relaxed">

                        Brindar una atención cercana y responsable,
                        promoviendo el bienestar y la confianza de
                        nuestros usuarios.

                    </p>

                </div>

                <div class="p-6 bg-white text-center">

                    <p class="text-[#063d69] font-bold text-lg">
                        Calidad humana y compromiso
                    </p>

                    <p class="text-sm text-gray-500 mt-2">
                        Trabajamos por una atención organizada y oportuna.
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- SERVICIOS --}}
    <section id="servicios" class="bg-white py-20 px-6">

        <div class="max-w-7xl mx-auto">

            <div class="text-center mb-14">

                <span class="text-[#20A447] font-bold uppercase
                             tracking-widest text-sm">

                    ATENCIÓN PARA NUESTROS USUARIOS

                </span>

                <h2 class="text-3xl md:text-4xl font-extrabold
                           text-[#063d69] mt-3 mb-4">

                    Nuestros servicios

                </h2>

                <div class="w-20 h-1 bg-[#20A447] rounded-full mx-auto mb-5"></div>

                <p class="text-gray-500 max-w-2xl mx-auto leading-relaxed">

                    Conoce las opciones de atención y gestión
                    disponibles a través de RENUEVA IPS y nuestra
                    plataforma SIGECIR.

                </p>

            </div>


            <div class="grid md:grid-cols-3 gap-8">

                {{-- SERVICIO 1 --}}
                <div class="tarjeta bg-slate-50 rounded-2xl p-8
                            text-center shadow-md border border-gray-100
                            border-b-4 border-b-[#0875bd]">

                    <div class="w-16 h-16 mx-auto mb-6 rounded-2xl
                                bg-blue-100 flex items-center justify-center">

                        <svg class="w-9 h-9 text-[#0875bd]"
                            fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M12 8v8m-4-4h8M20 12a8 8 0 11-16 0 8 8 0 0116 0z"/>
                        </svg>

                    </div>

                    <h3 class="text-xl font-bold text-[#063d69] mb-4">
                        Atención en salud
                    </h3>

                    <p class="text-gray-600 leading-relaxed text-sm">
                        Atención orientada al bienestar y a las
                        necesidades de nuestros usuarios.
                    </p>

                </div>


                {{-- SERVICIO 2 --}}
                <div class="tarjeta bg-slate-50 rounded-2xl p-8
                            text-center shadow-md border border-gray-100
                            border-b-4 border-b-[#20A447]">

                    <div class="w-16 h-16 mx-auto mb-6 rounded-2xl
                                bg-green-100 flex items-center justify-center">

                        <svg class="w-9 h-9 text-[#20A447]"
                            fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>

                    </div>

                    <h3 class="text-xl font-bold text-[#063d69] mb-4">
                        Agendamiento de citas
                    </h3>

                    <p class="text-gray-600 leading-relaxed text-sm">
                        Solicita y gestiona tus citas médicas
                        de manera sencilla a través de nuestra
                        plataforma SIGECIR.
                    </p>

                </div>


                {{-- SERVICIO 3 --}}
                <div class="tarjeta bg-slate-50 rounded-2xl p-8
                            text-center shadow-md border border-gray-100
                            border-b-4 border-b-[#33C4D0]">

                    <div class="w-16 h-16 mx-auto mb-6 rounded-2xl
                                bg-cyan-100 flex items-center justify-center">

                        <svg class="w-9 h-9 text-[#0875bd]"
                            fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5l5 5v11a2 2 0 01-2 2z"/>
                        </svg>

                    </div>

                    <h3 class="text-xl font-bold text-[#063d69] mb-4">
                        Gestión de usuarios
                    </h3>

                    <p class="text-gray-600 leading-relaxed text-sm">
                        Consulta la información relacionada con
                        tus solicitudes y gestiona tus citas
                        desde tu cuenta.
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- ACCESO A SIGECIR --}}
    <section class="institucional py-20 px-6 relative overflow-hidden">

        <div class="max-w-4xl mx-auto text-center relative">

            <div class="w-16 h-16 mx-auto mb-6 rounded-2xl
                        bg-white/15 flex items-center justify-center">

                <svg class="w-9 h-9 text-white"
                    fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M12 4v16m8-8H4"/>
                </svg>

            </div>

            <h2 class="text-3xl md:text-4xl font-extrabold
                       text-white mb-5">

                Accede a nuestra plataforma

            </h2>

            <p class="text-blue-100 max-w-2xl mx-auto
                      leading-relaxed mb-9">

                Ingresa a SIGECIR para solicitar y gestionar tus citas,
                consultar la información disponible y acceder a las
                funcionalidades correspondientes a tu cuenta.

            </p>

            <a href="{{ route('login') }}"
               class="boton inline-block bg-[#20A447]
                      hover:bg-green-700 text-white font-bold
                      px-10 py-4 rounded-xl shadow-lg">

                INGRESAR A SIGECIR

            </a>

            <p class="text-blue-200 text-xs mt-6">
                RENUEVA IPS | Sistema de Gestión de Citas
            </p>

        </div>

    </section>


    {{-- PIE DE PÁGINA --}}
    <footer class="bg-[#082b46] text-gray-300 py-10 px-6">

        <div class="max-w-7xl mx-auto">

            <div class="grid md:grid-cols-2 gap-8 items-center
                        text-center md:text-left">

                <div>

                    <h3 class="text-2xl font-extrabold text-white mb-2">
                        RENUEVA <span class="text-[#20A447]">IPS</span>
                    </h3>

                    <p class="text-sm text-gray-400">
                        Comprometidos con tu bienestar y tu salud.
                    </p>

                </div>

                <div class="md:text-right">

                    <p class="font-semibold text-white mb-2">
                        SIGECIR
                    </p>

                    <p class="text-sm text-gray-400">
                        Sistema de Gestión de Citas.
                    </p>

                    <a href="{{ route('login') }}"
                       class="inline-block mt-3 text-[#33C4D0]
                              hover:text-white text-sm font-semibold">
                        Acceder al sistema →
                    </a>

                </div>

            </div>

            <div class="border-t border-white/10 mt-8 pt-6
                        text-center text-xs text-gray-400">

                © {{ date('Y') }} RENUEVA IPS.
                Todos los derechos reservados.

            </div>

        </div>

    </footer>

</body>
</html>