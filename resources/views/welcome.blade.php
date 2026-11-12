<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIGECIR | Bienvenido</title>

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        institucional: {
                            oscuro: '#063d69',
                            azul: '#0875bd',
                            claro: '#eaf8f8',
                            verde: '#20A447'
                        }
                    }
                }
            }
        }
    </script>

    <style>
        [hidden] {
            display: none !important;
        }

        .diapositiva-activa {
            animation: aparecer 0.3s ease;
        }

        @keyframes aparecer {
            from {
                opacity: 0;
                transform: translateX(10px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>

<body class="min-h-screen bg-slate-100 text-slate-800">

    {{-- CONTENEDOR PRINCIPAL --}}
    <div class="min-h-screen flex flex-col items-center justify-center p-3 sm:p-5 lg:p-8">

        <div class="w-full max-w-[1400px] min-h-[650px] grid grid-cols-1 lg:grid-cols-2 bg-white rounded-3xl shadow-xl overflow-hidden">

            {{-- PANEL IZQUIERDO - INFORMACIÓN INSTITUCIONAL --}}
            <section class="bg-[#eaf8f8] px-6 py-10 sm:px-10 lg:px-12 flex flex-col items-center justify-center text-center">

                {{-- LOGO --}}
                <div class="mb-7">
                    <img
                        src="{{ asset('images/logo.png') }}"
                        alt="Logo SIGECIR"
                        class="w-36 h-36 sm:w-44 sm:h-44 object-contain mx-auto"
                    >
                </div>

                {{-- DESCRIPCIÓN --}}
                <div class="max-w-md mt-8">

                    <h2 class="text-lg sm:text-xl font-bold text-[#063d69] leading-relaxed">
                        Sistema de Gestión de Citas para Renueva IPS
                    </h2>

                    <div class="w-16 h-1 bg-[#20A447] rounded-full mx-auto my-5"></div>

                    <p class="text-sm sm:text-base leading-7 text-slate-600">
                        Plataforma integral para la gestión eficiente de citas,
                        pacientes, profesionales y servicios de Renueva IPS.
                        Nuestro compromiso es brindar atención de calidad
                        y una mejor experiencia para todos.
                    </p>

                </div>

                {{-- IMAGEN PRINCIPAL --}}
                <div class="w-full max-w-sm mt-7">

                    <img
                        src="{{ asset('images/inicio.png') }}"
                        alt="Bienvenido a SIGECIR"
                        class="w-full h-48 sm:h-56 lg:h-64 object-contain mx-auto"
                    >

                </div>

                {{-- BOTÓN NUESTROS SERVICIOS --}}
                <button
                    type="button"
                    id="btnNuestrosServicios"
                    class="mt-5 inline-flex items-center justify-center gap-2 px-7 py-3 rounded-xl bg-[#0875bd] hover:bg-[#063d69] text-white text-sm font-bold shadow-lg shadow-blue-900/15 transition duration-200 hover:-translate-y-1"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>

                    Nuestros servicios
                </button>

            </section>


            {{-- PANEL DERECHO - INICIO DE SESIÓN --}}
            <main class="bg-white px-5 py-10 sm:px-10 lg:px-12 flex flex-col justify-center">

                <div class="w-full max-w-md mx-auto">

                    {{-- TARJETA DE INICIO DE SESIÓN --}}
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-xl overflow-hidden">

                        <div class="p-6 sm:p-8">

                            {{-- TÍTULO --}}
                            <div class="text-center mb-7">

                                <h1 class="text-2xl font-extrabold text-[#063d69]">
                                    ¡Bienvenido!
                                </h1>

                                <p class="text-sm text-slate-500 mt-2">
                                    Ingresa tus datos para acceder al sistema.
                                </p>

                            </div>


                            {{-- MENSAJE DE ÉXITO --}}
                            @if (session('status'))

                                <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl p-4 mb-6 text-sm">
                                    {{ session('status') }}
                                </div>

                            @endif


                            {{-- MENSAJES DE ERROR --}}
                            @if ($errors->any())

                                <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl p-4 mb-6 text-sm">

                                    <div class="flex items-center gap-2 font-bold mb-2">

                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M12 9v4m0 4h.01M10.29 3.86l-8.18 14.18A2 2 0 003.84 21h16.32a2 2 0 001.73-2.96L13.71 3.86a2 2 0 00-3.42 0z"/>
                                        </svg>

                                        No fue posible iniciar sesión.

                                    </div>

                                    <ul class="list-disc pl-6 space-y-1">

                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach

                                    </ul>

                                </div>

                            @endif


                            {{-- FORMULARIO --}}
                            <form
                                action="{{ route('login.procesar') }}"
                                method="POST"
                                class="space-y-5"
                            >

                                @csrf


                                {{-- CORREO O DOCUMENTO --}}
                                <div>

                                    <label
                                        for="identificador"
                                        class="block text-sm font-bold text-slate-700 mb-2"
                                    >
                                        Correo electrónico o número de documento
                                    </label>

                                    <div class="relative">

                                        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">

                                            <svg
                                                class="w-5 h-5 text-[#0875bd]"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M3 7l9 6 9-6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"
                                                />
                                            </svg>

                                        </div>

                                        <input
                                            type="text"
                                            name="identificador"
                                            id="identificador"
                                            value="{{ old('identificador') }}"
                                            required
                                            autofocus
                                            autocomplete="username"
                                            placeholder="Ingresa tu correo o documento"
                                            class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-slate-300 bg-slate-50 text-sm text-slate-700 placeholder:text-slate-400 outline-none transition focus:bg-white focus:border-[#0875bd] focus:ring-4 focus:ring-blue-100 @error('identificador') border-red-500 @enderror"
                                        >

                                    </div>

                                    @error('identificador')

                                        <p class="text-red-600 text-xs mt-2">
                                            {{ $message }}
                                        </p>

                                    @enderror

                                </div>


                                {{-- CONTRASEÑA --}}
                                <div>

                                    <label
                                        for="password"
                                        class="block text-sm font-bold text-slate-700 mb-2"
                                    >
                                        Contraseña
                                    </label>

                                    <div class="relative">

                                        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">

                                            <svg
                                                class="w-5 h-5 text-[#0875bd]"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M7 10V7a5 5 0 0110 0v3m-12 0h14v11H5V10z"
                                                />
                                            </svg>

                                        </div>

                                        <input
                                            type="password"
                                            name="password"
                                            id="password"
                                            required
                                            autocomplete="current-password"
                                            placeholder="Ingresa tu contraseña"
                                            class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-slate-300 bg-slate-50 text-sm text-slate-700 placeholder:text-slate-400 outline-none transition focus:bg-white focus:border-[#0875bd] focus:ring-4 focus:ring-blue-100"
                                        >

                                    </div>

                                    @error('password')

                                        <p class="text-red-600 text-xs mt-2">
                                            {{ $message }}
                                        </p>

                                    @enderror


                                    {{-- ENLACE PARA RECUPERAR CONTRASEÑA --}}
                                    <div class="flex justify-end mt-3">

                                        <a
                                            href="{{ route('password.request') }}"
                                            class="text-sm font-semibold text-[#0875bd] hover:text-[#063d69] hover:underline transition"
                                        >
                                            ¿Olvidaste tu contraseña?
                                        </a>

                                    </div>

                                </div>


                                {{-- RECORDARME --}}
                                <div class="flex items-center gap-2">

                                    <input
                                        type="checkbox"
                                        name="remember"
                                        value="1"
                                        id="remember"
                                        class="w-4 h-4 rounded border-slate-300 text-[#0875bd] focus:ring-[#0875bd]"
                                    >

                                    <label
                                        for="remember"
                                        class="text-sm text-slate-600 cursor-pointer"
                                    >
                                        Recordarme
                                    </label>

                                </div>


                                {{-- BOTÓN INGRESAR --}}
                                <button
                                    type="submit"
                                    class="w-full flex items-center justify-center gap-2 py-3.5 rounded-xl bg-gradient-to-r from-[#063d69] to-[#0875bd] hover:from-[#052f50] hover:to-[#06649f] text-white font-bold text-sm shadow-lg shadow-blue-900/20 transition duration-200 hover:-translate-y-0.5"
                                >

                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4m-5-4l4-4m0 0l-4-4m4 4H3"/>
                                    </svg>

                                    Ingresar al sistema

                                </button>


                                {{-- REGISTRO DE PACIENTES --}}
                                <p class="text-center text-sm text-slate-600 pt-2">

                                    ¿No tienes una cuenta?

                                    <a
                                        href="{{ route('registro.paciente') }}"
                                        class="font-bold text-[#0875bd] hover:text-[#063d69] hover:underline transition"
                                    >
                                        Regístrate aquí
                                    </a>

                                </p>

                            </form>

                        </div>


                        {{-- PIE DE TARJETA --}}
                        <div class="bg-slate-50 border-t border-slate-100 px-6 py-5 text-center">

                            <p class="text-xs text-slate-500">
                                Sistema de Gestión de Citas y Registros
                            </p>

                            <p class="text-xs font-bold text-[#0875bd] mt-2">
                                RENUEVA IPS © {{ date('Y') }}
                            </p>

                        </div>

                    </div>


                    {{-- TEXTO FINAL --}}
                    <p class="text-center text-xs text-slate-400 mt-6">
                        Plataforma de gestión y atención de usuarios.
                    </p>

                </div>

            </main>

        </div>


        {{-- PIE GENERAL --}}
        <footer class="w-full max-w-[1400px] text-center py-5">

            <p class="text-xs text-slate-400">
                © {{ date('Y') }} SIGECIR - Todos los derechos reservados.
            </p>

            <p class="text-xs text-slate-400 mt-1">
                RENUEVA IPS
            </p>

        </footer>

    </div>


    {{-- MODAL - NUESTROS SERVICIOS --}}
    <div
        id="modalServicios"
        hidden
        class="fixed inset-0 z-[9999] bg-slate-950/70 backdrop-blur-sm flex items-center justify-center p-4"
    >

        <section
            class="relative w-full max-w-3xl max-h-[90vh] overflow-y-auto bg-white rounded-2xl shadow-2xl p-5 sm:p-8"
            role="dialog"
            aria-modal="true"
            aria-labelledby="tituloServicios"
        >

            {{-- BOTÓN CERRAR --}}
            <button
                type="button"
                id="cerrarServicios"
                aria-label="Cerrar ventana"
                class="absolute top-4 right-4 w-10 h-10 rounded-full bg-slate-100 hover:bg-red-100 text-slate-600 hover:text-red-600 text-2xl flex items-center justify-center transition"
            >
                ×
            </button>


            {{-- ENCABEZADO DEL MODAL --}}
            <header class="pr-10 mb-6">

                <span class="text-xs font-extrabold tracking-[0.2em] text-[#0875bd] uppercase">
                    RENUEVA IPS
                </span>

                <h2
                    id="tituloServicios"
                    class="text-2xl sm:text-3xl font-extrabold text-[#063d69] mt-2"
                >
                    Nuestros servicios
                </h2>

                <p class="text-sm text-slate-500 mt-2">
                    Conoce los servicios que tenemos para ti.
                </p>

                <div class="w-14 h-1 bg-[#20A447] rounded-full mt-4"></div>

            </header>


            {{-- DIAPOSITIVAS --}}
            <div id="diapositivasServicios">

                {{-- FISIOTERAPIA --}}
                <article class="diapositiva-servicio diapositiva-activa">

                    <img
                        class="w-full h-52 sm:h-72 object-cover rounded-xl bg-slate-100"
                        src="{{ asset('images/fisioterapia.png') }}"
                        alt="Fisioterapia"
                    >

                    <div class="pt-5">

                        <span class="text-xs font-bold text-[#0875bd]">
                            SERVICIO 01
                        </span>

                        <h3 class="text-xl sm:text-2xl font-bold text-[#063d69] mt-2">
                            Fisioterapia
                        </h3>

                        <p class="text-sm text-slate-500 leading-7 mt-2">
                            Atención orientada a la recuperación del movimiento,
                            la movilidad y la funcionalidad.
                        </p>

                    </div>

                </article>


                {{-- FONOAUDIOLOGÍA --}}
                <article class="diapositiva-servicio" hidden>

                    <img
                        class="w-full h-52 sm:h-72 object-cover rounded-xl bg-slate-100"
                        src="{{ asset('images/fonoaudiologia.png') }}"
                        alt="Fonoaudiología"
                    >

                    <div class="pt-5">

                        <span class="text-xs font-bold text-[#0875bd]">
                            SERVICIO 02
                        </span>

                        <h3 class="text-xl sm:text-2xl font-bold text-[#063d69] mt-2">
                            Fonoaudiología
                        </h3>

                        <p class="text-sm text-slate-500 leading-7 mt-2">
                            Apoyo profesional para la comunicación, el lenguaje,
                            la voz y la deglución.
                        </p>

                    </div>

                </article>


                {{-- TERAPIA OCUPACIONAL --}}
                <article class="diapositiva-servicio" hidden>

                    <img
                        class="w-full h-52 sm:h-72 object-cover rounded-xl bg-slate-100"
                        src="{{ asset('images/terapiaocupacional.png') }}"
                        alt="Terapia ocupacional"
                    >

                    <div class="pt-5">

                        <span class="text-xs font-bold text-[#0875bd]">
                            SERVICIO 03
                        </span>

                        <h3 class="text-xl sm:text-2xl font-bold text-[#063d69] mt-2">
                            Terapia ocupacional
                        </h3>

                        <p class="text-sm text-slate-500 leading-7 mt-2">
                            Acompañamiento para fortalecer habilidades y favorecer
                            la autonomía en las actividades diarias.
                        </p>

                    </div>

                </article>


                {{-- PSICOLOGÍA --}}
                <article class="diapositiva-servicio" hidden>

                    <img
                        class="w-full h-52 sm:h-72 object-cover rounded-xl bg-slate-100"
                        src="{{ asset('images/psicologia.png') }}"
                        alt="Psicología"
                    >

                    <div class="pt-5">

                        <span class="text-xs font-bold text-[#0875bd]">
                            SERVICIO 04
                        </span>

                        <h3 class="text-xl sm:text-2xl font-bold text-[#063d69] mt-2">
                            Psicología
                        </h3>

                        <p class="text-sm text-slate-500 leading-7 mt-2">
                            Orientación y acompañamiento para cuidar el bienestar
                            emocional y la salud mental.
                        </p>

                    </div>

                </article>


                {{-- MEDICINA GENERAL --}}
                <article class="diapositiva-servicio" hidden>

                    <img
                        class="w-full h-52 sm:h-72 object-cover rounded-xl bg-slate-100"
                        src="{{ asset('images/medicina.png') }}"
                        alt="Medicina general"
                    >

                    <div class="pt-5">

                        <span class="text-xs font-bold text-[#0875bd]">
                            SERVICIO 05
                        </span>

                        <h3 class="text-xl sm:text-2xl font-bold text-[#063d69] mt-2">
                            Medicina general
                        </h3>

                        <p class="text-sm text-slate-500 leading-7 mt-2">
                            Valoración médica, orientación y atención integral
                            para el cuidado de la salud.
                        </p>

                    </div>

                </article>


                {{-- NUTRICIÓN --}}
                <article class="diapositiva-servicio" hidden>

                    <img
                        class="w-full h-52 sm:h-72 object-cover rounded-xl bg-slate-100"
                        src="{{ asset('images/nutricion.png') }}"
                        alt="Nutrición"
                    >

                    <div class="pt-5">

                        <span class="text-xs font-bold text-[#0875bd]">
                            SERVICIO 06
                        </span>

                        <h3 class="text-xl sm:text-2xl font-bold text-[#063d69] mt-2">
                            Nutrición
                        </h3>

                        <p class="text-sm text-slate-500 leading-7 mt-2">
                            Orientación nutricional para promover hábitos
                            de alimentación saludables.
                        </p>

                    </div>

                </article>

            </div>


            {{-- CONTROLES DEL CARRUSEL --}}
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-7">

                <button
                    type="button"
                    id="anteriorServicio"
                    class="w-full sm:w-auto px-5 py-3 rounded-xl bg-[#063d69] hover:bg-[#0875bd] text-white text-sm font-bold transition"
                >
                    ← Anterior
                </button>


                {{-- INDICADORES --}}
                <div
                    id="indicadoresServicios"
                    class="flex items-center justify-center gap-2"
                ></div>


                <button
                    type="button"
                    id="siguienteServicio"
                    class="w-full sm:w-auto px-5 py-3 rounded-xl bg-[#063d69] hover:bg-[#0875bd] text-white text-sm font-bold transition"
                >
                    Siguiente →
                </button>

            </div>

        </section>

    </div>


    {{-- JAVASCRIPT - FUNCIONAMIENTO DEL MODAL --}}
    <script>

        const botonAbrirServicios = document.getElementById('btnNuestrosServicios');

        const modalServicios = document.getElementById('modalServicios');

        const botonCerrarServicios = document.getElementById('cerrarServicios');

        const diapositivas = document.querySelectorAll('.diapositiva-servicio');

        const indicadores = document.getElementById('indicadoresServicios');

        const botonAnterior = document.getElementById('anteriorServicio');

        const botonSiguiente = document.getElementById('siguienteServicio');

        let servicioActual = 0;


        // CREAR INDICADORES
        diapositivas.forEach((diapositiva, indice) => {

            const punto = document.createElement('button');

            punto.type = 'button';

            punto.setAttribute('aria-label', 'Ver servicio ' + (indice + 1));

            punto.className = 'w-3 h-3 rounded-full bg-slate-300 hover:bg-[#0875bd] transition';

            punto.addEventListener('click', () => {

                mostrarServicio(indice);

            });

            indicadores.appendChild(punto);

        });


        // MOSTRAR SERVICIO
        function mostrarServicio(indice) {

            servicioActual = (indice + diapositivas.length) % diapositivas.length;

            diapositivas.forEach((diapositiva, i) => {

                if (i === servicioActual) {

                    diapositiva.hidden = false;

                    diapositiva.classList.add('diapositiva-activa');

                } else {

                    diapositiva.hidden = true;

                    diapositiva.classList.remove('diapositiva-activa');

                }

            });


            // ACTUALIZAR INDICADORES
            const puntos = indicadores.querySelectorAll('button');

            puntos.forEach((punto, i) => {

                if (i === servicioActual) {

                    punto.classList.remove('bg-slate-300');

                    punto.classList.add('bg-[#0875bd]', 'scale-125');

                    punto.setAttribute('aria-current', 'true');

                } else {

                    punto.classList.remove('bg-[#0875bd]', 'scale-125');

                    punto.classList.add('bg-slate-300');

                    punto.removeAttribute('aria-current');

                }

            });

        }


        // ABRIR MODAL
        function abrirModalServicios() {

            modalServicios.hidden = false;

            document.body.style.overflow = 'hidden';

            mostrarServicio(0);

            botonCerrarServicios.focus();

        }


        // CERRAR MODAL
        function cerrarModalServicios() {

            modalServicios.hidden = true;

            document.body.style.overflow = '';

            botonAbrirServicios.focus();

        }


        // EVENTOS DE LOS BOTONES
        botonAbrirServicios.addEventListener('click', abrirModalServicios);

        botonCerrarServicios.addEventListener('click', cerrarModalServicios);


        botonAnterior.addEventListener('click', () => {

            mostrarServicio(servicioActual - 1);

        });


        botonSiguiente.addEventListener('click', () => {

            mostrarServicio(servicioActual + 1);

        });


        // CERRAR AL HACER CLIC FUERA DE LA VENTANA
        modalServicios.addEventListener('click', (evento) => {

            if (evento.target === modalServicios) {

                cerrarModalServicios();

            }

        });


        // CERRAR CON ESCAPE Y NAVEGAR CON LAS FLECHAS
        document.addEventListener('keydown', (evento) => {

            if (modalServicios.hidden) {

                return;

            }

            if (evento.key === 'Escape') {

                cerrarModalServicios();

            }

            if (evento.key === 'ArrowRight') {

                mostrarServicio(servicioActual + 1);

            }

            if (evento.key === 'ArrowLeft') {

                mostrarServicio(servicioActual - 1);

            }

        });


        // MOSTRAR EL PRIMER SERVICIO
        mostrarServicio(0);

    </script>

</body>
</html>
