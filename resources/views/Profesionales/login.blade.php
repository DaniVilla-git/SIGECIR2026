<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ingreso de profesionales | SIGECIR2026</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #e6f7fc, #f1f5f9, #eaf4fa);
            color: #063d69;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
        }

        .contenedor-login {
            width: 100%;
            max-width: 1050px;
            min-height: 600px;
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 15px 45px rgba(6, 61, 105, 0.15);
            border: 1px solid #dbe7ef;
        }

        /* PANEL INSTITUCIONAL */

        .panel-institucional {
            background: linear-gradient(155deg, #063d69, #0875bd, #20a4a7);
            padding: 45px 35px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .panel-institucional::before {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            border: 1px solid rgba(255,255,255,0.13);
            border-radius: 50%;
            top: -120px;
            right: -110px;
        }

        .panel-institucional::after {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            border: 1px solid rgba(255,255,255,0.13);
            border-radius: 50%;
            bottom: -100px;
            left: -90px;
        }

        .logo {
            width: 155px;
            height: 155px;
            object-fit: contain;
            margin-bottom: 25px;
            background: white;
            padding: 12px;
            border-radius: 25px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            position: relative;
            z-index: 1;
        }

        .panel-institucional h1 {
            font-size: 34px;
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 5px;
            position: relative;
            z-index: 1;
        }

        .subtitulo-institucional {
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 3px;
            color: #d9faff;
            position: relative;
            z-index: 1;
        }

        .detalle {
            width: 65px;
            height: 4px;
            border-radius: 5px;
            background: #20a4a7;
            margin: 22px auto;
            position: relative;
            z-index: 1;
        }

        .panel-institucional p {
            max-width: 330px;
            color: #e6f7fc;
            font-size: 15px;
            line-height: 1.9;
            position: relative;
            z-index: 1;
        }

        .texto-institucional {
            margin-top: 30px;
            padding: 12px 18px;
            border: 1px solid rgba(255,255,255,0.25);
            border-radius: 12px;
            background: rgba(255,255,255,0.10);
            font-size: 12px;
            color: white;
            position: relative;
            z-index: 1;
        }

        /* PANEL FORMULARIO */

        .panel-formulario {
            padding: 55px 65px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .icono-profesional {
            width: 68px;
            height: 68px;
            border-radius: 20px;
            background: #e6f7fc;
            color: #0875bd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            margin-bottom: 22px;
        }

        .panel-formulario h2 {
            font-size: 28px;
            font-weight: 800;
            color: #063d69;
            margin-bottom: 10px;
        }

        .introduccion {
            color: #64748b;
            font-size: 14px;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .campo {
            margin-bottom: 22px;
        }

        .campo label {
            display: block;
            font-size: 14px;
            font-weight: 700;
            color: #063d69;
            margin-bottom: 9px;
        }

        .contenedor-input {
            position: relative;
        }

        .contenedor-input i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #0875bd;
            font-size: 15px;
        }

        .campo input {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 1px solid #cbd5e1;
            border-radius: 11px;
            outline: none;
            font-size: 14px;
            background: #f8fafc;
            color: #17324d;
            transition: all 0.2s ease;
        }

        .campo input:focus {
            border-color: #0875bd;
            background: white;
            box-shadow: 0 0 0 3px rgba(8, 117, 189, 0.12);
        }

        .campo input::placeholder {
            color: #94a3b8;
        }

        /* RECUPERAR CONTRASEÑA */

        .recuperar-contrasena {
            display: flex;
            justify-content: flex-end;
            margin-top: -12px;
            margin-bottom: 22px;
        }

        .recuperar-contrasena a {
            color: #0875bd;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .recuperar-contrasena a:hover {
            color: #20a4a7;
            text-decoration: underline;
        }

        /* MOSTRAR CONTRASEÑA */

        .opciones {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 13px;
            color: #52677c;
            margin: 0 0 27px;
            cursor: pointer;
        }

        .opciones input {
            width: 16px;
            height: 16px;
            accent-color: #0875bd;
            cursor: pointer;
        }

        /* BOTÓN */

        .boton-ingresar {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 11px;
            background: linear-gradient(90deg, #063d69, #0875bd);
            color: white;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 5px 15px rgba(8, 117, 189, 0.20);
        }

        .boton-ingresar:hover {
            background: linear-gradient(90deg, #0875bd, #20a4a7);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(8, 117, 189, 0.25);
        }

        .boton-ingresar i {
            margin-right: 8px;
        }

        /* MENSAJES */

        .mensaje-error {
            background: #fee2e2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            padding: 13px 15px;
            border-radius: 10px;
            font-size: 13px;
            margin-bottom: 20px;
            line-height: 1.7;
        }

        .mensaje-exito {
            background: #dcfce7;
            border: 1px solid #bbf7d0;
            color: #166534;
            padding: 13px 15px;
            border-radius: 10px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        /* NOTA */

        .nota {
            margin-top: 25px;
            padding: 14px;
            border-radius: 11px;
            background: #e6f7fc;
            border: 1px solid #c8eaf4;
            color: #0875bd;
            font-size: 12px;
            line-height: 1.7;
            text-align: center;
        }

        .nota i {
            margin-right: 5px;
        }

        /* VOLVER */

        .volver {
            display: block;
            text-align: center;
            margin-top: 25px;
            color: #0875bd;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            transition: color 0.2s;
        }

        .volver:hover {
            color: #20a4a7;
            text-decoration: underline;
        }

        /* RESPONSIVE */

        @media (max-width: 750px) {

            body {
                padding: 12px;
            }

            .contenedor-login {
                grid-template-columns: 1fr;
                max-width: 480px;
            }

            .panel-institucional {
                padding: 30px 22px;
            }

            .logo {
                width: 105px;
                height: 105px;
                margin-bottom: 15px;
                border-radius: 18px;
            }

            .panel-institucional h1 {
                font-size: 27px;
            }

            .panel-institucional p {
                font-size: 13px;
            }

            .detalle {
                margin: 15px auto;
            }

            .texto-institucional {
                margin-top: 18px;
            }

            .panel-formulario {
                padding: 35px 25px;
            }

            .panel-formulario h2 {
                font-size: 25px;
            }
        }

        @media (max-width: 380px) {

            .panel-formulario {
                padding: 30px 18px;
            }

            .panel-institucional {
                padding: 25px 18px;
            }
        }
    </style>
</head>

<body>

    <div class="contenedor-login">

        {{-- PANEL INSTITUCIONAL --}}
        <section class="panel-institucional">

            <img
                src="{{ asset('images/logo.png') }}"
                alt="Logo SIGECIR2026"
                class="logo"
            >

            <h1>SIGECIR</h1>

            <span class="subtitulo-institucional">
                RENUEVA IPS
            </span>

            <div class="detalle"></div>

            <p>
                Sistema de Gestión de Citas para Renueva IPS.
                Un espacio diseñado para facilitar el trabajo
                de nuestros profesionales de la salud.
            </p>

            <div class="texto-institucional">
                <i class="fas fa-heartbeat"></i>
                Tecnología al servicio de la salud
            </div>

        </section>

        {{-- PANEL FORMULARIO --}}
        <main class="panel-formulario">

            <div class="icono-profesional">
                <i class="fas fa-user-doctor"></i>
            </div>

            <h2>Bienvenido, profesional</h2>

            <p class="introduccion">
                Ingresa tus datos de acceso para continuar
                al portal de profesionales de Renueva IPS.
            </p>

            {{-- MENSAJE DE ÉXITO --}}
            @if (session('status'))
                <div class="mensaje-exito">
                    <i class="fas fa-circle-check"></i>
                    {{ session('status') }}
                </div>
            @endif

            {{-- MENSAJES DE ERROR --}}
            @if ($errors->any())
                <div class="mensaje-error">
                    <strong>
                        <i class="fas fa-circle-exclamation"></i>
                        No fue posible iniciar sesión.
                    </strong>

                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            {{-- FORMULARIO --}}
            <form action="{{ route('login.procesar') }}" method="POST">

                @csrf

                {{-- IDENTIFICADOR --}}
                <div class="campo">

                    <label for="identificador">
                        Correo electrónico o número de documento
                    </label>

                    <div class="contenedor-input">
                        <i class="fas fa-envelope"></i>

                        <input
                            type="text"
                            id="identificador"
                            name="identificador"
                            placeholder="Ingresa tu correo o documento"
                            value="{{ old('identificador') }}"
                            autocomplete="username"
                            required
                        >
                    </div>

                </div>

                {{-- CONTRASEÑA --}}
                <div class="campo">

                    <label for="password">
                        Contraseña
                    </label>

                    <div class="contenedor-input">
                        <i class="fas fa-lock"></i>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Ingresa tu contraseña"
                            autocomplete="current-password"
                            required
                        >
                    </div>

                </div>

                {{-- RECUPERAR CONTRASEÑA --}}
                <div class="recuperar-contrasena">

                    <a href="{{ route('password.request') }}">
                        <i class="fas fa-key"></i>
                        ¿Olvidaste tu contraseña?
                    </a>

                </div>

                {{-- MOSTRAR CONTRASEÑA --}}
                <label class="opciones">

                    <input
                        type="checkbox"
                        id="mostrarContrasena"
                        onchange="
                            document.getElementById('password').type =
                            this.checked ? 'text' : 'password'
                        "
                    >

                    Mostrar contraseña

                </label>

                {{-- BOTÓN INGRESAR --}}
                <button
                    type="submit"
                    class="boton-ingresar"
                >
                    <i class="fas fa-right-to-bracket"></i>
                    Iniciar sesión
                </button>

            </form>

            {{-- NOTA --}}
            <p class="nota">
                <i class="fas fa-shield-halved"></i>
                Acceso exclusivo para profesionales autorizados
                de Renueva IPS.
            </p>

            {{-- VOLVER --}}
            <a href="{{ route('inicio') }}" class="volver">

                <i class="fas fa-arrow-left"></i>
                Volver a la página principal

            </a>

        </main>

    </div>

</body>
</html>
