
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ingreso de profesionales | SIGECIR2026</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            min-height: 100vh;
            background: #f1f5f9;
            color: #17324d;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
        }

        .contenedor-login {
            width: 100%;
            max-width: 1000px;
            min-height: 560px;
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            background: white;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 12px 40px rgba(23, 50, 77, 0.10);
        }

        .panel-institucional {
            background: linear-gradient(160deg, #effcfc, #dff4f5);
            padding: 45px 35px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .logo {
            width: 150px;
            height: 150px;
            object-fit: contain;
            margin-bottom: 25px;
        }

        .panel-institucional h1 {
            font-size: 27px;
            color: #123b56;
            margin-bottom: 12px;
        }

        .panel-institucional h1 span {
            color: #08a6ad;
        }

        .panel-institucional p {
            max-width: 320px;
            color: #52677c;
            font-size: 15px;
            line-height: 1.8;
        }

        .detalle {
            width: 55px;
            height: 4px;
            border-radius: 5px;
            background: #08a6ad;
            margin: 20px auto;
        }

        .panel-formulario {
            padding: 55px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .icono-profesional {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            background: #eee4ff;
            color: #7951d9;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 35px;
            margin-bottom: 22px;
        }

        .panel-formulario h2 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .introduccion {
            color: #64748b;
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        .campo {
            margin-bottom: 20px;
        }

        .campo label {
            display: block;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .campo input {
            width: 100%;
            padding: 14px 15px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            outline: none;
            font-size: 14px;
            background: #fff;
        }

        .campo input:focus {
            border-color: #08a6ad;
            box-shadow: 0 0 0 3px rgba(8, 166, 173, 0.12);
        }

        .opciones {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #52677c;
            margin: 0 0 25px;
        }

        .boton-ingresar {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 9px;
            background: #7951d9;
            color: white;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s;
        }

        .boton-ingresar:hover {
            background: #6540bf;
        }

        .volver {
            display: block;
            text-align: center;
            margin-top: 25px;
            color: #078f98;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .volver:hover {
            text-decoration: underline;
        }

        .nota {
            margin-top: 22px;
            padding: 12px;
            border-radius: 8px;
            background: #f8fafc;
            color: #64748b;
            font-size: 12px;
            line-height: 1.6;
            text-align: center;
        }

        @media (max-width: 750px) {
            body {
                padding: 12px;
            }

            .contenedor-login {
                grid-template-columns: 1fr;
            }

            .panel-institucional {
                padding: 30px 22px;
            }

            .logo {
                width: 100px;
                height: 100px;
                margin-bottom: 15px;
            }

            .panel-institucional h1 {
                font-size: 23px;
            }

            .panel-formulario {
                padding: 35px 25px;
            }

            .panel-formulario h2 {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

    <div class="contenedor-login">

        <section class="panel-institucional">

            <img
                src="{{ asset('images/logo.png') }}"
                alt="Logo SIGECIR2026"
                class="logo"
            >

            <h1>SIGECIR</h1>

            <div class="detalle"></div>

            <p>
                Sistema de Gestión de Citas para Renueva IPS.
                Un espacio diseñado para facilitar el trabajo
                de nuestros profesionales de la salud.
            </p>

        </section>

        <main class="panel-formulario">

            
            <h2>Bienvenido, profesional</h2>

            <p class="introduccion">
                Ingresa tus datos de acceso para continuar
                al portal de profesionales de Renueva IPS.
            </p>

            <form onsubmit="return false;">

                <div class="campo">
                    <label for="correo">Correo electrónico</label>

                    <input
                        type="email"
                        id="correo"
                        name="correo"
                        placeholder="nombre@correo.com"
                        autocomplete="off"
                    >
                </div>

                <div class="campo">
                    <label for="contrasena">Contraseña</label>

                    <input
                        type="password"
                        id="contrasena"
                        name="contrasena"
                        placeholder="Ingresa tu contraseña"
                        autocomplete="off"
                    >
                </div>

                <label class="opciones">
                    <input type="checkbox" id="mostrarContrasena"
                        onchange="document.getElementById('contrasena').type = this.checked ? 'text' : 'password'">
                    Mostrar contraseña
                </label>

                <button type="button" class="boton-ingresar"
                    onclick="alert('El inicio de sesión estará disponible cuando conectemos la autenticación del sistema.');">
                    Iniciar sesión
                </button>

            </form>

            <p class="nota">
                Acceso exclusivo para profesionales autorizados
                de Renueva IPS.
            </p>

            <a href="{{ url('/') }}" class="volver">
                ← Volver a la página principal
            </a>

        </main>

    </div>

</body>
</html>
