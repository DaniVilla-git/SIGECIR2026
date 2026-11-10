
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi perfil </title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        :root {
            --verde: #20A447;
            --verde-oscuro: #188638;
            --verde-claro: #EAF7EE;
            --fondo: #F5F7F8;
            --texto: #243447;
            --gris: #64748B;
            --borde: #E2E8F0;
            --blanco: #FFFFFF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: var(--fondo);
            color: var(--texto);
        }

        .contenedor {
            display: flex;
            min-height: 100vh;
        }

        /* MENÚ LATERAL */

        .menu {
            width: 250px;
            background: var(--blanco);
            border-right: 1px solid var(--borde);
            padding: 28px 18px;
            flex-shrink: 0;
        }

        .marca {
            text-align: center;
            padding-bottom: 28px;
            border-bottom: 1px solid var(--borde);
        }

        .marca img {
            width: 76px;
            height: 76px;
            object-fit: contain;
            margin-bottom: 8px;
        }

        .marca h2 {
            font-size: 21px;
            color: #17324D;
        }

        .marca p {
            color: var(--gris);
            font-size: 12px;
            margin-top: 7px;
        }

        .titulo-menu {
            color: #94A3B8;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            margin: 28px 10px 12px;
            text-transform: uppercase;
        }

        .enlace-menu {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 14px;
            margin-bottom: 7px;
            border-radius: 9px;
            color: #52677C;
            text-decoration: none;
            font-size: 14px;
            transition: 0.2s;
        }

        .enlace-menu:hover,
        .enlace-menu.activo {
            background: var(--verde-claro);
            color: var(--verde-oscuro);
            font-weight: 700;
        }

        .icono-menu {
            width: 22px;
            min-width: 22px;
            text-align: center;
            font-size: 17px;
            color: var(--verde);
        }

        .nota-menu {
            margin-top: 35px;
            padding: 15px;
            background: #F8FAFC;
            border-radius: 10px;
            font-size: 12px;
            line-height: 1.7;
            color: var(--gris);
        }

        /* CONTENIDO */

        .principal {
            flex: 1;
            min-width: 0;
            padding: 30px;
        }

        .barra-superior {
            margin-bottom: 28px;
        }

        .barra-superior h1 {
            font-size: 26px;
            margin-bottom: 7px;
        }

        .barra-superior p {
            font-size: 14px;
            color: var(--gris);
        }

        /* TARJETA PRINCIPAL */

        .perfil-principal {
            background: var(--blanco);
            border: 1px solid var(--borde);
            border-radius: 14px;
            padding: 25px;
            display: flex;
            align-items: center;
            gap: 22px;
            margin-bottom: 24px;
        }

        .avatar {
            width: 105px;
            height: 105px;
            min-width: 105px;
            border-radius: 50%;
            background: var(--verde-claro);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--verde-oscuro);
            font-size: 43px;
        }

        .datos-principales {
            flex: 1;
        }

        .datos-principales h2 {
            font-size: 23px;
            margin-bottom: 7px;
        }

        .datos-principales p {
            color: var(--gris);
            font-size: 14px;
            margin-bottom: 12px;
        }

        .estado-activo {
            display: inline-block;
            background: var(--verde-claro);
            color: var(--verde-oscuro);
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .estado-activo i {
            margin-right: 5px;
        }

        .etiqueta-demo {
            color: #92400E;
            background: #FEF3C7;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
        }

        /* SECCIONES */

        .seccion {
            background: var(--blanco);
            border: 1px solid var(--borde);
            border-radius: 13px;
            padding: 23px;
            margin-bottom: 22px;
        }

        .titulo-seccion {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-bottom: 17px;
            border-bottom: 1px solid var(--borde);
            margin-bottom: 20px;
        }

        .titulo-seccion i {
            color: var(--verde);
            font-size: 18px;
        }

        .titulo-seccion h2 {
            font-size: 17px;
        }

        .rejilla {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .dato label {
            display: block;
            color: var(--gris);
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .dato p {
            font-size: 14px;
            font-weight: 600;
            color: var(--texto);
            padding-bottom: 10px;
            border-bottom: 1px solid #F1F5F9;
            min-height: 34px;
        }

        .dato p i {
            color: var(--verde);
            margin-right: 7px;
        }

        .aviso {
            background: #F8FAFC;
            border-left: 4px solid var(--verde);
            padding: 15px;
            border-radius: 7px;
            color: var(--gris);
            font-size: 13px;
            line-height: 1.7;
        }

        .pie {
            text-align: center;
            padding: 25px 10px 5px;
            color: #94A3B8;
            font-size: 12px;
        }

        @media (max-width: 760px) {
            .contenedor {
                display: block;
            }

            .menu {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid var(--borde);
            }

            .principal {
                padding: 20px 14px;
            }

            .perfil-principal {
                align-items: flex-start;
                flex-direction: column;
            }

            .rejilla {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<div class="contenedor">

    <!-- MENÚ LATERAL -->

    <aside class="menu">

        <div class="marca">
            <img src="{{ asset('images/logo.png') }}" alt="Logo SIGECIR">
            <h2>SIGECIR</h2>
            <p>Portal de profesionales</p>
        </div>

        <p class="titulo-menu">Menú principal</p>

        <a href="{{ route('profesionales.dashboard') }}" class="enlace-menu">
            <i class="fa-solid fa-house icono-menu"></i>
            Inicio
        </a>

        <a href="{{ route('profesionales.agenda') }}" class="enlace-menu">
            <i class="fa-solid fa-calendar-days icono-menu"></i>
            Mi agenda
        </a>

        <a href="{{ route('profesionales.pacientes') }}" class="enlace-menu">
            <i class="fa-solid fa-users icono-menu"></i>
            Mis pacientes
        </a>

        <a href="{{ route('profesionales.notificaciones') }}" class="enlace-menu">
            <i class="fa-solid fa-bell icono-menu"></i>
            Notificaciones
        </a>

        <a href="{{ route('profesionales.horario') }}" class="enlace-menu">
            <i class="fa-solid fa-clock icono-menu"></i>
            Mi horario
        </a>

        <a href="{{ route('profesionales.perfil') }}" class="enlace-menu activo">
            <i class="fa-solid fa-circle-user icono-menu"></i>
            Mi perfil
        </a>

        <p class="titulo-menu">Cuenta</p>

        <a href="{{ url('/') }}" class="enlace-menu">
            <i class="fa-solid fa-right-from-bracket icono-menu"></i>
            Cerrar sesión
        </a>

        <div class="nota-menu">
            <strong>SIGECIR2026</strong><br>
            Sistema de Gestión de Citas para Renueva IPS.
        </div>

    </aside>

    <!-- CONTENIDO PRINCIPAL -->

    <main class="principal">

        <header class="barra-superior">
            <h1>Mi perfil</h1>
            <p>Consulta tu información personal y profesional.</p>
        </header>

        <!-- INFORMACIÓN PRINCIPAL -->

        <section class="perfil-principal">

            <div class="avatar">
                <i class="fa-solid fa-user-doctor"></i>
            </div>

            <div class="datos-principales">
                <h2>María Fernanda López</h2>
                <p>Psicóloga · Consultorio 2</p>

                <span class="estado-activo">
                    <i class="fa-solid fa-circle-check"></i>
                    Profesional activo
                </span>
            </div>

            <span class="etiqueta-demo">
                Información de ejemplo
            </span>

        </section>

        <!-- INFORMACIÓN PERSONAL -->

        <section class="seccion">

            <div class="titulo-seccion">
                <i class="fa-solid fa-user"></i>
                <h2>Información personal</h2>
            </div>

            <div class="rejilla">

                <div class="dato">
                    <label>Nombres</label>
                    <p>María Fernanda</p>
                </div>

                <div class="dato">
                    <label>Apellidos</label>
                    <p>López Ramírez</p>
                </div>

                <div class="dato">
                    <label>Documento de identidad</label>
                    <p>Por registrar</p>
                </div>

                <div class="dato">
                    <label>Teléfono</label>
                    <p><i class="fa-solid fa-phone"></i> Por registrar</p>
                </div>

                <div class="dato">
                    <label>Correo electrónico</label>
                    <p><i class="fa-solid fa-envelope"></i> profesional@renuevaips.com</p>
                </div>

            </div>

        </section>

        <!-- INFORMACIÓN PROFESIONAL -->

        <section class="seccion">

            <div class="titulo-seccion">
                <i class="fa-solid fa-briefcase"></i>
                <h2>Información profesional</h2>
            </div>

            <div class="rejilla">

                <div class="dato">
                    <label>Especialidad</label>
                    <p>Psicología</p>
                </div>

                <div class="dato">
                    <label>Consultorio asignado</label>
                    <p>Consultorio 2</p>
                </div>

                <div class="dato">
                    <label>Institución</label>
                    <p>Renueva IPS</p>
                </div>

                <div class="dato">
                    <label>Estado</label>
                    <p><i class="fa-solid fa-circle-check"></i> Activo</p>
                </div>

            </div>

        </section>

        <!-- SEGURIDAD -->

        <section class="seccion">

            <div class="titulo-seccion">
                <i class="fa-solid fa-shield-halved"></i>
                <h2>Seguridad de la cuenta</h2>
            </div>

            <div class="rejilla">

                <div class="dato">
                    <label>Usuario de acceso</label>
                    <p>profesional@renuevaips.com</p>
                </div>

                <div class="dato">
                    <label>Contraseña</label>
                    <p>••••••••••••</p>
                </div>

            </div>

            <div class="aviso" style="margin-top:20px;">
                <i class="fa-solid fa-circle-info"></i>
                Los datos de acceso son administrados mediante el sistema
                de usuarios de SIGECIR. Si necesitas actualizar tu información,
                puedes solicitar el cambio al administrador.
            </div>

        </section>

        <footer class="pie">
            SIGECIR2026 · Renueva IPS · Portal de profesionales
        </footer>

    </main>

</div>

</body>
</html>
