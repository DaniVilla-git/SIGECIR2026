<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro de pacientes | SIGECIR</title>

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

<body class="min-h-screen fondo py-10 px-4">

    <main class="max-w-3xl mx-auto">

        <!-- Encabezado -->
        <div class="text-center mb-7">

            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/LogoSIGECIR.png') }}"
                     alt="Logo RENUEVA IPS"
                     class="w-24 h-24 object-contain">
            </div>

            <h1 class="text-3xl font-extrabold text-white">
                SIGECIR
            </h1>

            <p class="text-sky-100 text-sm mt-2">
                Sistema de Gestión de Citas y Registros
            </p>

            <p class="text-white/75 text-xs mt-1">
                RENUEVA IPS
            </p>

        </div>

        <!-- Formulario -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

            <div class="p-6 sm:p-9">

                <div class="text-center mb-7">

                    <h2 class="text-2xl font-bold text-slate-800">
                        Registro de pacientes
                    </h2>

                    <p class="text-sm text-slate-500 mt-2">
                        Completa tus datos para crear tu cuenta.
                    </p>

                </div>

                <!-- Errores -->
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl p-4 mb-6 text-sm">

                        <p class="font-semibold mb-2">
                            Por favor, revisa los siguientes datos:
                        </p>

                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>
                @endif

                <form action="{{ route('registro.paciente.store') }}"
                      method="POST"
                      class="space-y-6">

                    @csrf

                    <!-- Datos personales -->
                    <div>

                        <h3 class="text-lg font-bold text-sky-800 mb-4 border-b pb-2">
                            Datos personales
                        </h3>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Número de documento *
                                </label>

                                <input type="text"
                                       name="documento_identidad"
                                       value="{{ old('documento_identidad') }}"
                                       required
                                       placeholder="Número de documento"
                                       class="campo w-full px-4 py-3 rounded-xl border border-slate-300 text-sm">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Primer nombre *
                                </label>

                                <input type="text"
                                       name="primer_nombre"
                                       value="{{ old('primer_nombre') }}"
                                       required
                                       placeholder="Primer nombre"
                                       class="campo w-full px-4 py-3 rounded-xl border border-slate-300 text-sm">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Segundo nombre
                                </label>

                                <input type="text"
                                       name="segundo_nombre"
                                       value="{{ old('segundo_nombre') }}"
                                       placeholder="Segundo nombre"
                                       class="campo w-full px-4 py-3 rounded-xl border border-slate-300 text-sm">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Primer apellido *
                                </label>

                                <input type="text"
                                       name="primer_apellido"
                                       value="{{ old('primer_apellido') }}"
                                       required
                                       placeholder="Primer apellido"
                                       class="campo w-full px-4 py-3 rounded-xl border border-slate-300 text-sm">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Segundo apellido
                                </label>

                                <input type="text"
                                       name="segundo_apellido"
                                       value="{{ old('segundo_apellido') }}"
                                       placeholder="Segundo apellido"
                                       class="campo w-full px-4 py-3 rounded-xl border border-slate-300 text-sm">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Teléfono *
                                </label>

                                <input type="tel"
                                       name="telefono_usuario"
                                       value="{{ old('telefono_usuario') }}"
                                       required
                                       placeholder="Número de teléfono"
                                       class="campo w-full px-4 py-3 rounded-xl border border-slate-300 text-sm">
                            </div>

                            <div class="sm:col-span-2">
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Correo electrónico *
                                </label>

                                <input type="email"
                                       name="correo_usuario"
                                       value="{{ old('correo_usuario') }}"
                                       required
                                       placeholder="ejemplo@correo.com"
                                       class="campo w-full px-4 py-3 rounded-xl border border-slate-300 text-sm">
                            </div>

                        </div>

                    </div>

                    <!-- Información de salud -->
                    <div>

                        <h3 class="text-lg font-bold text-sky-800 mb-4 border-b pb-2">
                            Información de salud
                        </h3>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    EPS *
                                </label>

                                <input type="text"
                                       name="eps_usuario"
                                       value="{{ old('eps_usuario') }}"
                                       required
                                       placeholder="Nombre de la EPS"
                                       class="campo w-full px-4 py-3 rounded-xl border border-slate-300 text-sm">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Régimen *
                                </label>

                                <select name="regimen_usuario"
                                        required
                                        class="campo w-full px-4 py-3 rounded-xl border border-slate-300 text-sm bg-white">

                                    <option value="">Selecciona tu régimen</option>

                                    <option value="Contributivo" @selected(old('regimen_usuario') == 'Contributivo')>
                                        Contributivo
                                    </option>

                                    <option value="Subsidiado" @selected(old('regimen_usuario') == 'Subsidiado')>
                                        Subsidiado
                                    </option>

                                    <option value="Especial" @selected(old('regimen_usuario') == 'Especial')>
                                        Especial
                                    </option>

                                </select>
                            </div>

                        </div>

                    </div>

                    <!-- Datos de acceso -->
                    <div>

                        <h3 class="text-lg font-bold text-sky-800 mb-4 border-b pb-2">
                            Datos de acceso
                        </h3>

                        <div class="space-y-4">

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Usuario
                                </label>

                                <input type="text"
                                       value="Tu número de documento"
                                       readonly
                                       class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-100 text-sm text-slate-500">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Contraseña *
                                </label>

                                <input type="password"
                                       name="password"
                                       required
                                       minlength="8"
                                       autocomplete="new-password"
                                       placeholder="Crea una contraseña (mínimo 8 caracteres)"
                                       class="campo w-full px-4 py-3 rounded-xl border border-slate-300 text-sm">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Confirmar contraseña *
                                </label>

                                <input type="password"
                                       name="password_confirmation"
                                       required
                                       minlength="8"
                                       autocomplete="new-password"
                                       placeholder="Escribe nuevamente tu contraseña"
                                       class="campo w-full px-4 py-3 rounded-xl border border-slate-300 text-sm">
                            </div>

                        </div>

                    </div>

                    <!-- Botones -->
                    <div class="space-y-3 pt-2">

                        <button type="submit"
                                class="w-full py-3.5 rounded-xl bg-sky-700 hover:bg-sky-800 text-white font-bold text-sm shadow-lg transition duration-200">
                            Crear mi cuenta
                        </button>

                        <a href="{{ route('login') }}"
                           class="block text-center w-full py-3 rounded-xl border border-slate-300 text-slate-600 hover:bg-slate-50 font-semibold text-sm transition">
                            Ya tengo una cuenta. Iniciar sesión
                        </a>

                    </div>

                </form>

            </div>

            <div class="bg-slate-50 border-t border-slate-100 px-7 py-5 text-center">

                <p class="text-xs text-slate-500">
                    Sistema de Gestión de Citas y Registros
                </p>

                <p class="text-xs font-semibold text-sky-700 mt-1">
                    RENUEVA IPS © {{ date('Y') }}
                </p>

            </div>

        </div>

    </main>

</body>
</html>
