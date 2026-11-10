<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar sesión | SIGECIR</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .fondo {
            background: linear-gradient(135deg, #063d69 0%, #0875bd 55%, #20b8c4 100%);
        }

        .campo:focus {
            outline: none;
            border-color: #0875bd;
            box-shadow: 0 0 0 3px rgba(8, 117, 189, 0.12);
        }
    </style>
</head>

<body class="min-h-screen fondo flex items-center justify-center p-5">

    <main class="w-full max-w-md">

        <!-- Encabezado -->
        <div class="text-center mb-7">

            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/LogoSIGECIR.png') }}"
                    alt="Logo RENUEVA IPS"
                    class="w-24 h-24 object-contain">
            </div>

            <h1 class="text-3xl font-extrabold text-white tracking-wide">
                SIGECIR
            </h1>

            <p class="text-sky-100 text-sm mt-2">
                Sistema de Gestión de Citas y Registros
            </p>

            <p class="text-white/75 text-xs mt-1">
                RENUEVA IPS
            </p>

        </div>


        <!-- Tarjeta de inicio de sesión -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

            <div class="p-7 sm:p-9">

                <div class="text-center mb-7">

                    <h2 class="text-2xl font-bold text-slate-800">
                        ¡Bienvenido!
                    </h2>

                    <p class="text-sm text-slate-500 mt-2">
                        Ingresa tus datos para acceder al sistema.
                    </p>

                </div>


                <!-- Mensajes de error -->
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl p-3 mb-5 text-sm">
                        <p class="font-semibold mb-1">
                            No fue posible iniciar sesión.
                        </p>

                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form action="{{ route('login.procesar') }}"
                        method="POST"
                        class="space-y-5">

                    @csrf


                    
                    <!-- Correo o documento -->
                    <div>

                        <label for="identificador"
                            class="block text-sm font-semibold text-slate-700 mb-2">
                            Correo electrónico o número de documento
                        </label>

                        <div class="relative">

                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400"
                                    fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M3 7l9 6 9-6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>

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
                                class="campo w-full pl-11 pr-4 py-3 rounded-xl border border-slate-300 text-sm text-slate-700 transition @error('identificador') border-red-500 @enderror"
                            >

                        </div>

                        @error('identificador')
                            <p class="text-red-600 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    <!-- Contraseña -->
                    <div>

                        <label for="password"
                               class="block text-sm font-semibold text-slate-700 mb-2">

                            Contraseña

                        </label>

                        <div class="relative">

                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">

                                <svg class="w-5 h-5 text-slate-400"
                                     fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="1.8"
                                          d="M7 10V7a5 5 0 0110 0v3m-12 0h14v11H5V10z"/>

                                </svg>

                            </div>

                            <input
                                type="password"
                                name="password"
                                id="password"
                                required
                                autocomplete="current-password"
                                placeholder="Ingresa tu contraseña"
                                class="campo w-full pl-11 pr-4 py-3 rounded-xl border border-slate-300 text-sm text-slate-700 transition"
                            >

                        </div>

                        @error('password')
                            <p class="text-red-600 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    <!-- Recordarme -->
                    <div class="flex items-center">

                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                            id="remember"
                            class="w-4 h-4 rounded border-slate-300 text-sky-700 focus:ring-sky-600"
                        >

                        <label for="remember"
                               class="ml-2 text-sm text-slate-600">

                            Recordarme

                        </label>

                    </div>


                    <!-- Botón -->
                    <button
                        type="submit"
                        class="w-full py-3.5 rounded-xl bg-sky-700 hover:bg-sky-800 text-white font-bold text-sm shadow-lg shadow-sky-700/20 transition duration-200">

                        Ingresar al sistema

                    </button>
                    <!-- Registro de pacientes -->
                    <p class="text-center text-sm text-slate-600 mt-5">
                        ¿No tienes una cuenta?

                        <a href="{{ route('registro.paciente') }}"
                        class="font-bold text-sky-700 hover:text-sky-900">
                            Regístrate aquí
                        </a>
                    </p>
                </form>

            </div>


            <!-- Pie de tarjeta -->
            <div class="bg-slate-50 border-t border-slate-100 px-7 py-5 text-center">

                <p class="text-xs text-slate-500">
                    Sistema de Gestión de Citas y Registros
                </p>

                <p class="text-xs font-semibold text-sky-700 mt-1">
                    RENUEVA IPS © {{ date('Y') }}
                </p>

            </div>

        </div>


        <p class="text-center text-xs text-white/70 mt-6">
            Plataforma de gestión y atención de usuarios.
        </p>

    </main>

</body>
</html>
