
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Panel del profesional</title>

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

        /* CONTENIDO PRINCIPAL */

        .principal {
            flex: 1;
            min-width: 0;
            padding: 30px;
        }

        /* VISTAS INDEPENDIENTES */

        .seccion-vista {
            display: none;
        }

        .seccion-vista.activa {
            display: block;
        }

        .barra-superior {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .barra-superior h1 {
            font-size: 26px;
            margin-bottom: 7px;
        }

        .barra-superior p {
            font-size: 14px;
            color: var(--gris);
        }

        .fecha {
            padding: 12px 16px;
            border: 1px solid var(--borde);
            background: var(--blanco);
            border-radius: 10px;
            color: #475569;
            font-size: 13px;
            white-space: nowrap;
        }

        /* BIENVENIDA */

        .bienvenida {
            background: linear-gradient(110deg, #EAF7EE, #F7FCF8);
            border: 1px solid #D3EEDB;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
        }

        .bienvenida h2 {
            font-size: 22px;
            margin-bottom: 9px;
            color: #176B32;
        }

        .bienvenida p {
            color: #52677C;
            font-size: 14px;
            line-height: 1.7;
        }

        .etiqueta {
            display: inline-block;
            margin-top: 15px;
            background: #D6F1DE;
            color: #176B32;
            border-radius: 20px;
            padding: 7px 12px;
            font-size: 12px;
            font-weight: 700;
        }

        /* ESTADÍSTICAS */

        .estadisticas {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 28px;
        }

        .tarjeta {
            background: var(--blanco);
            border: 1px solid var(--borde);
            border-radius: 13px;
            padding: 21px;
            min-width: 0;
        }

        .tarjeta-superior {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            margin-bottom: 17px;
        }

        .tarjeta-superior p {
            font-size: 13px;
            color: var(--gris);
        }

        .icono-tarjeta {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 39px;
            height: 39px;
            border-radius: 10px;
            background: var(--verde-claro);
            color: var(--verde-oscuro);
            font-size: 20px;
        }

        .tarjeta h3 {
            font-size: 29px;
            margin-bottom: 7px;
        }

        .tarjeta small {
            color: var(--gris);
            font-size: 12px;
        }

        /* AGENDA */

        .seccion-agenda {
            background: var(--blanco);
            border: 1px solid var(--borde);
            border-radius: 13px;
            overflow: hidden;
            margin-bottom: 25px;
        }

        .encabezado-agenda {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 22px;
            border-bottom: 1px solid var(--borde);
        }

        .encabezado-agenda h2 {
            font-size: 18px;
            margin-bottom: 6px;
        }

        .encabezado-agenda p {
            color: var(--gris);
            font-size: 13px;
        }

        .boton {
            background: var(--verde);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 11px 15px;
            font-weight: 700;
            font-size: 13px;
            cursor: pointer;
            text-decoration: none;
        }

        .boton:hover {
            background: var(--verde-oscuro);
        }

        .tabla-contenedor {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        thead {
            background: #F8FAFC;
        }

        th {
            color: #64748B;
            font-size: 12px;
            font-weight: 700;
            padding: 15px 18px;
            white-space: nowrap;
        }

        td {
            padding: 17px 18px;
            border-top: 1px solid #F1F5F9;
            font-size: 13px;
            white-space: nowrap;
        }

        .sin-datos {
            padding: 35px;
            text-align: center;
            color: var(--gris);
            font-size: 14px;
        }

        /* MI PERFIL */

        .seccion-perfil {
            background: var(--blanco);
            border: 1px solid var(--borde);
            border-radius: 13px;
            padding: 22px;
        }

        .encabezado-perfil {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 18px;
            border-bottom: 1px solid var(--borde);
            margin-bottom: 22px;
        }

        .encabezado-perfil i {
            color: var(--verde);
            font-size: 22px;
        }

        .encabezado-perfil h2 {
            font-size: 19px;
            color: #173653;
        }

        .contenido-perfil {
            display: flex;
            align-items: center;
            gap: 22px;
            margin-bottom: 25px;
        }

        .avatar-perfil {
            width: 90px;
            height: 90px;
            min-width: 90px;
            border-radius: 50%;
            background: var(--verde-claro);
            color: var(--verde-oscuro);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 38px;
        }

        .nombre-perfil h3 {
            font-size: 21px;
            margin-bottom: 7px;
        }

        .nombre-perfil p {
            color: var(--gris);
            font-size: 13px;
            margin-bottom: 10px;
        }

        .estado-perfil {
            display: inline-block;
            background: var(--verde-claro);
            color: var(--verde-oscuro);
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        .datos-perfil {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .dato-perfil label {
            display: block;
            color: var(--gris);
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .dato-perfil p {
            font-size: 14px;
            color: var(--texto);
            font-weight: 600;
            padding-bottom: 10px;
            border-bottom: 1px solid #F1F5F9;
        }

        .aviso-perfil {
            background: #F0F8F2;
            border-left: 4px solid var(--verde);
            padding: 15px;
            border-radius: 7px;
            color: #53677C;
            font-size: 13px;
            line-height: 1.6;
            margin-top: 22px;
        }

        .aviso-perfil i {
            color: var(--verde);
            margin-right: 5px;
        }

        /* PIE */

        .pie {
            text-align: center;
            padding: 25px 10px 5px;
            color: #94A3B8;
            font-size: 12px;
        }

        /* IMPRESIÓN */

        @media print {
            .menu,
            .barra-superior,
            .bienvenida,
            .estadisticas,
            .seccion-perfil,
            .boton,
            .pie {
                display: none !important;
            }

            body {
                background: white;
            }

            .principal {
                padding: 0;
            }

            .seccion-agenda {
                border: none;
                margin: 0;
            }
        }

        /* RESPONSIVE */

        @media (max-width: 1100px) {
            .estadisticas {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 760px) {
            .contenedor {
                display: block;
            }

            .menu {
                width: 100%;
                padding: 18px;
                border-right: none;
                border-bottom: 1px solid var(--borde);
            }

            .marca img {
                width: 58px;
                height: 58px;
            }

            .titulo-menu {
                margin-top: 18px;
            }

            .nota-menu {
                display: none;
            }

            .principal {
                padding: 20px 14px;
            }

            .barra-superior {
                align-items: flex-start;
                flex-direction: column;
                margin-bottom: 20px;
            }

            .barra-superior h1 {
                font-size: 23px;
            }

            .bienvenida {
                padding: 20px;
            }

            .bienvenida h2 {
                font-size: 20px;
            }

            .estadisticas {
                gap: 12px;
            }

            .tarjeta {
                padding: 15px;
            }

            .tarjeta h3 {
                font-size: 25px;
            }

            .encabezado-agenda {
                align-items: flex-start;
                flex-direction: column;
                padding: 18px;
            }

            .datos-perfil {
                grid-template-columns: 1fr;
            }

            .contenido-perfil {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 380px) {
            .estadisticas {
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
            <img src="{{ asset('images/logo.png') }}"
                 alt="Logo SIGECIR2026">

            <h2>SIGECIR</h2>
            <p>Portal de profesionales</p>
        </div>

        <p class="titulo-menu">Menú principal</p>

        <a href="#inicio"
           class="enlace-menu activo"
           data-vista="inicio">
            <i class="fa-solid fa-house icono-menu"></i>
            <span>Inicio</span>
        </a>

        <a href="{{ route('profesionales.agenda') }}"
           class="enlace-menu">
            <i class="fa-solid fa-calendar-days icono-menu"></i>
            <span>Mi agenda</span>
        </a>

        <a href="{{ route('profesionales.pacientes') }}"
           class="enlace-menu">
            <i class="fa-solid fa-users icono-menu"></i>
            <span>Mis pacientes</span>
        </a>

        <a href="{{ route('profesionales.notificaciones') }}"
           class="enlace-menu">
            <i class="fa-solid fa-bell icono-menu"></i>
            <span>Notificaciones</span>
        </a>

        <a href="{{ route('profesionales.horario') }}"
           class="enlace-menu">
            <i class="fa-solid fa-clock icono-menu"></i>
            <span>Mi horario</span>
        </a>

        <a href="#perfil"
           class="enlace-menu"
           data-vista="perfil">
            <i class="fa-solid fa-circle-user icono-menu"></i>
            <span>Mi perfil</span>
        </a>

        <p class="titulo-menu">Cuenta</p>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit">
                Cerrar sesión
            </button>
        </form>

        <div class="nota-menu">
            <strong>SIGECIR2026</strong><br>
            Sistema de Gestión de Citas para Renueva IPS.
        </div>

    </aside>

    <!-- CONTENIDO PRINCIPAL -->

    <main class="principal">

        
        <!-- VISTA INICIO -->
        

        <div class="seccion-vista activa" id="vista-inicio">

            <header class="barra-superior">

                <div>
                    <h1>Mi panel profesional</h1>
                    <p>Consulta tu agenda y organiza tu jornada de atención.</p>
                </div>

                <div class="fecha">
                    <i class="fa-regular fa-calendar"></i>
                    {{ now()->locale('es')->translatedFormat('l, d \d\e F \d\e Y') }}
                </div>

            </header>

            <!-- BIENVENIDA -->

            <section class="bienvenida">

                <h2>¡Bienvenido a tu espacio profesional!</h2>

                <p>
                    Desde aquí podrás consultar las citas programadas,
                    revisar los pacientes asignados y hacer seguimiento
                    al estado de tu jornada.
                </p>

                <span class="etiqueta">
                    ● Portal del profesional
                </span>

            </section>

            <!-- ESTADÍSTICAS -->

            <section class="estadisticas">

                <article class="tarjeta">
                    <div class="tarjeta-superior">
                        <p>Citas de hoy</p>
                        <span class="icono-tarjeta">
                            <i class="fa-solid fa-calendar-check"></i>
                        </span>
                    </div>

                    <h3>0</h3>
                    <small>Citas programadas</small>
                </article>

                <article class="tarjeta">
                    <div class="tarjeta-superior">
                        <p>Pendientes</p>
                        <span class="icono-tarjeta">
                            <i class="fa-solid fa-clock"></i>
                        </span>
                    </div>

                    <h3>0</h3>
                    <small>Por atender</small>
                </article>

                <article class="tarjeta">
                    <div class="tarjeta-superior">
                        <p>Atendidas</p>
                        <span class="icono-tarjeta">
                            <i class="fa-solid fa-check"></i>
                        </span>
                    </div>

                    <h3>0</h3>
                    <small>Atenciones completadas</small>
                </article>

                <article class="tarjeta">
                    <div class="tarjeta-superior">
                        <p>Canceladas</p>
                        <span class="icono-tarjeta">
                            <i class="fa-solid fa-xmark"></i>
                        </span>
                    </div>

                    <h3>0</h3>
                    <small>Citas canceladas</small>
                </article>

            </section>

            <!-- AGENDA -->

            <section class="seccion-agenda" id="agenda">

                <div class="encabezado-agenda">

                    <div>
                        <h2>Agenda de pacientes</h2>
                        <p>Consulta las citas asignadas para tu jornada.</p>
                    </div>

                    <button class="boton"
                            type="button"
                            onclick="window.print()">
                        <i class="fa-solid fa-print"></i>
                        Imprimir agenda
                    </button>

                </div>

                <div class="tabla-contenedor">

                    <table>

                        <thead>
                            <tr>
                                <th>Hora</th>
                                <th>Paciente</th>
                                <th>Servicio</th>
                                <th>Modalidad</th>
                                <th>Estado</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td colspan="5" class="sin-datos">
                                    <i class="fa-solid fa-calendar-xmark"></i>
                                    <br><br>
                                    La agenda se mostrará aquí cuando
                                    conectemos las citas de la base de datos.
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </section>

        </div>

        <!-- ===================================== -->
        <!-- VISTA MI PERFIL                       -->
        <!-- ===================================== -->

        <div class="seccion-vista" id="vista-perfil">

            <section class="seccion-perfil" id="perfil">

                <div class="encabezado-perfil">
                    <i class="fa-solid fa-circle-user"></i>
                    <h2>Mi perfil profesional</h2>
                </div>

                <div class="contenido-perfil">

                    <div class="avatar-perfil">
                        <i class="fa-solid fa-user-doctor"></i>
                    </div>

                    <div class="nombre-perfil">
                        <h3>Nombre del profesional</h3>
                        <p>Especialidad profesional</p>

                        <span class="estado-perfil">
                            <i class="fa-solid fa-circle-check"></i>
                            Profesional activo
                        </span>
                    </div>

                </div>

                <div class="datos-perfil">

                    <div class="dato-perfil">
                        <label>Nombres</label>
                        <p>Por registrar</p>
                    </div>

                    <div class="dato-perfil">
                        <label>Apellidos</label>
                        <p>Por registrar</p>
                    </div>

                    <div class="dato-perfil">
                        <label>Correo electrónico</label>
                        <p>Por registrar</p>
                    </div>

                    <div class="dato-perfil">
                        <label>Teléfono</label>
                        <p>Por registrar</p>
                    </div>

                    <div class="dato-perfil">
                        <label>Especialidad</label>
                        <p>Por registrar</p>
                    </div>

                    <div class="dato-perfil">
                        <label>Consultorio asignado</label>
                        <p>Por registrar</p>
                    </div>

                </div>

                <div class="aviso-perfil">
                    <i class="fa-solid fa-circle-info"></i>
                    Esta información corresponde al perfil del profesional.
                    Los datos podrán consultarse y actualizarse según los
                    permisos asignados por el administrador.
                </div>

            </section>

        </div>

        <!-- PIE DE PÁGINA -->

        <footer class="pie">
            SIGECIR2026 · Renueva IPS · Portal de profesionales
        </footer>

    </main>

</div>

<!-- ===================================== -->
<!-- CONTROL DE NAVEGACIÓN ENTRE VISTAS    -->
<!-- ===================================== -->

<script>
document.addEventListener('DOMContentLoaded', function () {

    const enlacesVista = document.querySelectorAll('[data-vista]');
    const vistas = document.querySelectorAll('.seccion-vista');

    function mostrarVista(nombre) {

        const vistaSeleccionada = document.getElementById('vista-' + nombre);

        if (!vistaSeleccionada) {
            nombre = 'inicio';
        }

        // Ocultar todas las vistas
        vistas.forEach(function(vista) {
            vista.classList.remove('activa');
        });

        // Quitar selección de los enlaces del menú
        enlacesVista.forEach(function(enlace) {
            enlace.classList.remove('activo');
        });

        // Mostrar solamente la vista seleccionada
        document.getElementById('vista-' + nombre).classList.add('activa');

        // Activar el enlace correspondiente
        const enlaceActivo = document.querySelector(
            '[data-vista="' + nombre + '"]'
        );

        if (enlaceActivo) {
            enlaceActivo.classList.add('activo');
        }

        // Volver al inicio de la vista
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    // Navegación al pulsar Inicio o Mi perfil
    enlacesVista.forEach(function(enlace) {

        enlace.addEventListener('click', function(event) {

            event.preventDefault();

            const nombreVista = this.getAttribute('data-vista');

            mostrarVista(nombreVista);

            // Actualizar la dirección sin recargar la página
            history.pushState(
                { vista: nombreVista },
                '',
                '#' + nombreVista
            );

        });

    });

    // Revisar si se abrió directamente con #perfil
    function cargarVistaDesdeURL() {

        const seccion = window.location.hash.replace('#', '');

        if (seccion === 'perfil') {
            mostrarVista('perfil');
        } else {
            mostrarVista('inicio');
        }
    }

    cargarVistaDesdeURL();

    // Permitir que los botones atrás y adelante del navegador funcionen
    window.addEventListener('popstate', function() {
        cargarVistaDesdeURL();
    });

});
</script>

</body>
</html>
