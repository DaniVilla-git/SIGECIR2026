
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mi horario</title>

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
            --rojo-claro: #FEF2F2;
            --rojo: #DC2626;
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
            min-width: 250px;
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

        .barra-superior {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 28px;
        }

        .barra-superior h1 {
            font-size: 26px;
            margin-bottom: 7px;
            color: #173653;
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

        /* TARJETAS DE RESUMEN */

        .resumen {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 25px;
        }

        .tarjeta {
            background: var(--blanco);
            border: 1px solid var(--borde);
            border-radius: 13px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .tarjeta .icono {
            width: 48px;
            height: 48px;
            min-width: 48px;
            border-radius: 12px;
            background: var(--verde-claro);
            color: var(--verde-oscuro);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
        }

        .tarjeta h2 {
            font-size: 27px;
            color: #173653;
            margin-bottom: 5px;
        }

        .tarjeta p {
            color: var(--gris);
            font-size: 13px;
        }

        /* PANEL DEL HORARIO */

        .panel {
            background: var(--blanco);
            border: 1px solid var(--borde);
            border-radius: 13px;
            padding: 22px;
            margin-bottom: 22px;
        }

        .encabezado-panel {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 18px;
        }

        .encabezado-panel h2 {
            font-size: 18px;
            color: #173653;
        }

        .encabezado-panel h2 i {
            color: var(--verde);
            margin-right: 7px;
        }

        .etiqueta {
            background: var(--verde-claro);
            color: var(--verde-oscuro);
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        /* TABLA */

        .tabla-contenedor {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 650px;
            border-collapse: collapse;
            text-align: left;
        }

        thead {
            background: #F8FAFC;
        }

        th {
            color: #64748B;
            font-size: 12px;
            padding: 15px;
            white-space: nowrap;
        }

        td {
            padding: 16px 15px;
            border-top: 1px solid #F1F5F9;
            font-size: 13px;
            color: #53677C;
            white-space: nowrap;
        }

        .dia {
            font-weight: 700;
            color: #173653;
        }

        .hora {
            color: var(--verde-oscuro);
            font-weight: 700;
        }

        .estado {
            display: inline-block;
            border-radius: 20px;
            padding: 6px 10px;
            font-size: 11px;
            font-weight: 700;
            background: var(--verde-claro);
            color: var(--verde-oscuro);
        }

        .estado-descanso {
            display: inline-block;
            border-radius: 20px;
            padding: 6px 10px;
            font-size: 11px;
            font-weight: 700;
            background: var(--rojo-claro);
            color: var(--rojo);
        }

        .sin-servicio {
            color: var(--gris);
            font-style: italic;
        }

        /* DURACIÓN DE ATENCIONES */

        .duracion {
            display: flex;
            align-items: center;
            gap: 12px;
            background: var(--verde-claro);
            border: 1px solid #D9EFDF;
            border-radius: 10px;
            padding: 16px;
            margin-top: 20px;
        }

        .duracion i {
            color: var(--verde);
            font-size: 23px;
        }

        .duracion strong {
            color: #173653;
            font-size: 14px;
        }

        .duracion p {
            color: var(--gris);
            font-size: 12px;
            margin-top: 4px;
        }

        /* INFORMACIÓN IMPORTANTE */

        .nota {
            display: flex;
            align-items: flex-start;
            gap: 13px;
            background: #F0F8F2;
            border: 1px solid #D9EFDF;
            border-left: 4px solid var(--verde);
            padding: 18px;
            border-radius: 9px;
            color: #53677C;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 22px;
        }

        .nota i {
            color: var(--verde);
            font-size: 19px;
            margin-top: 2px;
        }

        .nota strong {
            color: #173653;
        }

        /* PIE DE PÁGINA */

        .pie {
            text-align: center;
            padding: 25px 10px 5px;
            color: #94A3B8;
            font-size: 12px;
        }

        /* RESPONSIVE */

        @media (max-width: 1000px) {
            .resumen {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 760px) {
            .contenedor {
                display: block;
            }

            .menu {
                width: 100%;
                min-width: 0;
                border-right: none;
                border-bottom: 1px solid var(--borde);
            }

            .principal {
                padding: 20px 14px;
            }

            .barra-superior {
                align-items: flex-start;
                flex-direction: column;
            }

            .resumen {
                grid-template-columns: 1fr;
            }

            .encabezado-panel {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        .enlace-menu .icono-menu {
            color: var(--verde) !important;
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
            <span>Mis pacientes</span>
        </a>

        <a href="{{ route('profesionales.notificaciones') }}" class="enlace-menu">
            <i class="fa-solid fa-bell icono-menu"></i>
            Notificaciones
        </a>

        <a href="{{ route('profesionales.horario') }}"
           class="enlace-menu activo">
            <i class="fa-solid fa-clock icono-menu"
               style="color: #20A447 !important;"></i>
            <span>Mi horario</span>
        </a>

        <a href="{{ route('profesionales.dashboard') }}#perfil"
           class="enlace-menu">
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

            <div>
                <h1>Mi horario</h1>
                <p>Consulta los días y las horas asignadas para tu atención profesional.</p>
            </div>

            <div class="fecha">
                <i class="fa-regular fa-calendar"></i>
                {{ now()->locale('es')->translatedFormat('l, d \d\e F \d\e Y') }}
            </div>

        </header>

        <!-- TARJETAS DE RESUMEN -->

        <section class="resumen">

            <article class="tarjeta">
                <div class="icono">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>

                <div>
                    <h2>6</h2>
                    <p>Días de atención</p>
                </div>
            </article>

            <article class="tarjeta">
                <div class="icono">
                    <i class="fa-solid fa-clock"></i>
                </div>

                <div>
                    <h2>54</h2>
                    <p>Horas semanales</p>
                </div>
            </article>

            <article class="tarjeta">
                <div class="icono">
                    <i class="fa-solid fa-calendar-day"></i>
                </div>

                <div>
                    <h2>07:00 AM</h2>
                    <p>Hora de inicio</p>
                </div>
            </article>

        </section>

        <!-- TABLA DE HORARIOS -->

        <section class="panel">

            <div class="encabezado-panel">

                <h2>
                    <i class="fa-solid fa-calendar-week"></i>
                    Horario asignado
                </h2>

                <span class="etiqueta">Solo consulta</span>

            </div>

            <div class="tabla-contenedor">

                <table>

                    <thead>
                        <tr>
                            <th>Día</th>
                            <th>Jornada de mañana</th>
                            <th>Almuerzo</th>
                            <th>Jornada de tarde</th>
                            <th>Estado</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td class="dia">Lunes</td>
                            <td class="hora">07:00 AM - 12:00 PM</td>
                            <td>12:00 PM - 01:00 PM</td>
                            <td class="hora">01:00 PM - 06:00 PM</td>
                            <td><span class="estado">Asignado</span></td>
                        </tr>

                        <tr>
                            <td class="dia">Martes</td>
                            <td class="hora">07:00 AM - 12:00 PM</td>
                            <td>12:00 PM - 01:00 PM</td>
                            <td class="hora">01:00 PM - 06:00 PM</td>
                            <td><span class="estado">Asignado</span></td>
                        </tr>

                        <tr>
                            <td class="dia">Miércoles</td>
                            <td class="hora">07:00 AM - 12:00 PM</td>
                            <td>12:00 PM - 01:00 PM</td>
                            <td class="hora">01:00 PM - 06:00 PM</td>
                            <td><span class="estado">Asignado</span></td>
                        </tr>

                        <tr>
                            <td class="dia">Jueves</td>
                            <td class="hora">07:00 AM - 12:00 PM</td>
                            <td>12:00 PM - 01:00 PM</td>
                            <td class="hora">01:00 PM - 06:00 PM</td>
                            <td><span class="estado">Asignado</span></td>
                        </tr>

                        <tr>
                            <td class="dia">Viernes</td>
                            <td class="hora">07:00 AM - 12:00 PM</td>
                            <td>12:00 PM - 01:00 PM</td>
                            <td class="hora">01:00 PM - 06:00 PM</td>
                            <td><span class="estado">Asignado</span></td>
                        </tr>

                        <tr>
                            <td class="dia">Sábado</td>
                            <td class="hora">08:00 AM - 12:00 PM</td>
                            <td class="sin-servicio">No aplica</td>
                            <td class="sin-servicio">No se presta servicio</td>
                            <td><span class="estado">Asignado</span></td>
                        </tr>

                        <tr>
                            <td class="dia">Domingo</td>
                            <td class="sin-servicio" colspan="3">No se presta servicio</td>
                            <td><span class="estado-descanso">Descanso</span></td>
                        </tr>

                    </tbody>

                </table>

            </div>

            <!-- DURACIÓN DE LAS ATENCIONES -->

            <div class="duracion">

                <i class="fa-solid fa-stopwatch"></i>

                <div>
                    <strong>Duración de cada atención: 30 minutos</strong>
                    <p>
                        Los espacios de atención se organizan en intervalos
                        de 30 minutos durante las jornadas disponibles.
                    </p>
                </div>

            </div>

        </section>

        <!-- INFORMACIÓN IMPORTANTE -->

        <section class="nota">

            <i class="fa-solid fa-circle-info"></i>

            <div>
                <strong>Información importante</strong><br>

                El horario de lunes a viernes incluye una hora de almuerzo
                de 12:00 p. m. a 1:00 p. m. Los sábados se presta servicio
                de 8:00 a. m. a 12:00 p. m. Los domingos no hay atención.

                Cada espacio de atención tiene una duración de 30 minutos,
                para un total de 108 espacios semanales disponibles,
                siempre que se utilice toda la disponibilidad.
            </div>

        </section>

        <footer class="pie">
            SIGECIR2026 · Renueva IPS · Portal de profesionales
        </footer>

    </main>

</div>

</body>
</html>
