
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Notificaciones</title>

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

        /* RESUMEN */

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
            padding: 21px;
        }

        .tarjeta-superior {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
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
            font-size: 18px;
        }

        .tarjeta h3 {
            font-size: 28px;
            margin-bottom: 6px;
        }

        .tarjeta small {
            color: var(--gris);
            font-size: 12px;
        }

        /* SECCIÓN NOTIFICACIONES */

        .seccion-notificaciones {
            background: var(--blanco);
            border: 1px solid var(--borde);
            border-radius: 13px;
            overflow: hidden;
        }

        .encabezado-seccion {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 22px;
            border-bottom: 1px solid var(--borde);
        }

        .encabezado-seccion h2 {
            font-size: 18px;
            margin-bottom: 6px;
        }

        .encabezado-seccion p {
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
            font-size: 12px;
            cursor: pointer;
        }

        .boton:hover {
            background: var(--verde-oscuro);
        }

        /* FILTROS */

        .filtros {
            display: flex;
            gap: 12px;
            padding: 18px 22px;
            border-bottom: 1px solid var(--borde);
            flex-wrap: wrap;
        }

        .filtros select {
            height: 40px;
            min-width: 190px;
            border: 1px solid var(--borde);
            border-radius: 8px;
            padding: 0 12px;
            background: white;
            color: var(--texto);
            outline: none;
            font-size: 13px;
        }

        /* TARJETAS DE NOTIFICACIÓN */

        .lista-notificaciones {
            padding: 10px 22px;
        }

        .notificacion {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            padding: 20px 10px;
            border-bottom: 1px solid #F1F5F9;
            transition: 0.2s;
        }

        .notificacion:last-child {
            border-bottom: none;
        }

        .notificacion:hover {
            background: #FAFCFB;
        }

        .icono-notificacion {
            width: 45px;
            height: 45px;
            min-width: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: var(--verde-claro);
            color: var(--verde-oscuro);
            font-size: 19px;
        }

        .icono-notificacion.azul {
            background: #EFF6FF;
            color: #2563EB;
        }

        .icono-notificacion.rojo {
            background: #FEF2F2;
            color: #DC2626;
        }

        .contenido-notificacion {
            flex: 1;
            min-width: 0;
        }

        .contenido-notificacion h3 {
            font-size: 14px;
            margin-bottom: 6px;
            color: #334155;
        }

        .contenido-notificacion p {
            font-size: 13px;
            color: var(--gris);
            line-height: 1.6;
        }

        .contenido-notificacion small {
            display: block;
            margin-top: 9px;
            color: #94A3B8;
            font-size: 11px;
        }

        .no-leida {
            background: #F7FCF8;
        }

        .punto {
            width: 9px;
            height: 9px;
            background: var(--verde);
            border-radius: 50%;
            margin-top: 7px;
            flex-shrink: 0;
        }

        .leida {
            background: #CBD5E1;
        }

        /* BOTÓN VER DETALLES */

        .boton-detalles {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 13px;
            background: var(--verde-claro);
            color: var(--verde-oscuro);
            border: 1px solid #CDEBD5;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        .boton-detalles:hover {
            background: #D8F0DF;
        }

        /* VENTANA DE DETALLES */

        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.55);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .modal.mostrar {
            display: flex;
        }

        .modal-contenido {
            background: white;
            width: 100%;
            max-width: 520px;
            max-height: 85vh;
            overflow-y: auto;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.18);
        }

        .modal-encabezado {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            border-bottom: 1px solid var(--borde);
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .modal-encabezado h2 {
            font-size: 19px;
        }

        .cerrar-modal {
            border: none;
            background: transparent;
            font-size: 23px;
            color: var(--gris);
            cursor: pointer;
        }

        .detalle-item {
            margin-bottom: 16px;
        }

        .detalle-item strong {
            display: block;
            font-size: 12px;
            color: var(--gris);
            margin-bottom: 5px;
        }

        .detalle-item p {
            font-size: 14px;
            color: var(--texto);
            line-height: 1.5;
        }

        .modal-pie {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        /* SIN NOTIFICACIONES */

        .sin-datos {
            padding: 35px;
            text-align: center;
            color: var(--gris);
            font-size: 14px;
            display: none;
        }

        .sin-datos i {
            font-size: 25px;
            margin-bottom: 10px;
        }

        .pie {
            text-align: center;
            padding: 25px 10px 5px;
            color: #94A3B8;
            font-size: 12px;
        }

        /* RESPONSIVE */

        @media (max-width: 1000px) {
            .resumen {
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

            .nota-menu {
                display: none;
            }

            .principal {
                padding: 20px 14px;
            }

            .barra-superior {
                align-items: flex-start;
                flex-direction: column;
            }

            .encabezado-seccion {
                align-items: flex-start;
                flex-direction: column;
            }

            .resumen {
                gap: 12px;
            }

            .notificacion {
                padding: 17px 5px;
            }

            .filtros select {
                width: 100%;
            }
        }

        @media (max-width: 430px) {
            .resumen {
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
            <span>Inicio</span>
        </a>

        <a href="{{ route('profesionales.agenda') }}" class="enlace-menu">
            <i class="fa-solid fa-calendar-days icono-menu"></i>
            <span>Mi agenda</span>
        </a>

        <a href="{{ route('profesionales.pacientes') }}" class="enlace-menu">
            <i class="fa-solid fa-users icono-menu"></i>
            <span>Mis pacientes</span>
        </a>

        <a href="{{ route('profesionales.notificaciones') }}" class="enlace-menu activo">
            <i class="fa-solid fa-bell icono-menu"></i>
            <span>Notificaciones</span>
        </a>

        <a href="{{ route('profesionales.horario') }}" class="enlace-menu">
            <i class="fa-solid fa-clock icono-menu"></i>
            <span>Mi horario</span>
        </a>

        <a href="{{ route('profesionales.dashboard') }}#perfil" class="enlace-menu">
            <i class="fa-solid fa-circle-user icono-menu"></i>
            <span>Mi perfil</span>
        </a>

        <p class="titulo-menu">Cuenta</p>

        <a href="{{ url('/') }}" class="enlace-menu">
            <i class="fa-solid fa-right-from-bracket icono-menu"></i>
            <span>Cerrar sesión</span>
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
                <h1>Notificaciones</h1>
                <p>Consulta los avisos y novedades de tu actividad profesional.</p>
            </div>

            <div class="fecha">
                <i class="fa-regular fa-calendar"></i>
                {{ now()->locale('es')->translatedFormat('l, d \d\e F \d\e Y') }}
            </div>

        </header>

        <!-- RESUMEN -->

        <section class="resumen">

            <article class="tarjeta">

                <div class="tarjeta-superior">
                    <p>Total de notificaciones</p>

                    <span class="icono-tarjeta">
                        <i class="fa-solid fa-bell"></i>
                    </span>
                </div>

                <h3 id="totalNotificaciones">4</h3>
                <small>Avisos recibidos</small>

            </article>

            <article class="tarjeta">

                <div class="tarjeta-superior">
                    <p>No leídas</p>

                    <span class="icono-tarjeta">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                </div>

                <h3 id="totalNoLeidas">3</h3>
                <small>Pendientes por consultar</small>

            </article>

            <article class="tarjeta">

                <div class="tarjeta-superior">
                    <p>Leídas</p>

                    <span class="icono-tarjeta">
                        <i class="fa-solid fa-envelope-open"></i>
                    </span>
                </div>

                <h3 id="totalLeidas">1</h3>
                <small>Notificaciones consultadas</small>

            </article>

        </section>

        <!-- LISTADO DE NOTIFICACIONES -->

        <section class="seccion-notificaciones">

            <div class="encabezado-seccion">

                <div>
                    <h2>Centro de notificaciones</h2>
                    <p>Aquí puedes revisar los avisos relacionados con tus citas y actividades.</p>
                </div>

                <button type="button" class="boton" id="marcarTodas">
                    <i class="fa-solid fa-check-double"></i>
                    Marcar todas como leídas
                </button>

            </div>

            <!-- FILTROS -->

            <div class="filtros">

                <select id="filtroTipo">
                    <option value="">Todos los tipos</option>
                    <option value="Cita">Citas</option>
                    <option value="Horario">Horarios</option>
                    <option value="Recordatorio">Recordatorios</option>
                    <option value="Cancelación">Cancelaciones</option>
                </select>

                <select id="filtroLectura">
                    <option value="">Todas las notificaciones</option>
                    <option value="no-leida">No leídas</option>
                    <option value="leida">Leídas</option>
                </select>

            </div>

            <!-- NOTIFICACIONES -->

            <div class="lista-notificaciones" id="listaNotificaciones">

                <!-- NUEVA CITA -->

                <article class="notificacion no-leida"
                         data-tipo="Cita"
                         data-lectura="no-leida">

                    <div class="icono-notificacion">
                        <i class="fa-solid fa-calendar-plus"></i>
                    </div>

                    <div class="contenido-notificacion">

                        <h3>Nueva cita asignada</h3>

                        <p>
                            Se te ha asignado una nueva cita para el paciente
                            María Pérez. Consulta los detalles en tu agenda.
                        </p>

                        <small>Hoy · 8:00 a. m. · Citas</small>

                        <button type="button"
                                class="boton-detalles"
                                data-detalle="cita">
                            <i class="fa-solid fa-eye"></i>
                            Ver detalles
                        </button>

                    </div>

                    <span class="punto"></span>

                </article>

                <!-- ACTUALIZACIÓN DE HORARIO -->

                <article class="notificacion no-leida"
                         data-tipo="Horario"
                         data-lectura="no-leida">

                    <div class="icono-notificacion azul">
                        <i class="fa-solid fa-clock"></i>
                    </div>

                    <div class="contenido-notificacion">

                        <h3>Actualización de horario</h3>

                        <p>
                            Se ha realizado una actualización en tu horario
                            de atención. Revisa la información correspondiente.
                        </p>

                        <small>Ayer · 3:30 p. m. · Horarios</small>

                        <button type="button"
                                class="boton-detalles"
                                data-detalle="horario">
                            <i class="fa-solid fa-eye"></i>
                            Ver detalles
                        </button>

                    </div>

                    <span class="punto"></span>

                </article>

                <!-- RECORDATORIO -->

                <article class="notificacion no-leida"
                         data-tipo="Recordatorio"
                         data-lectura="no-leida">

                    <div class="icono-notificacion">
                        <i class="fa-solid fa-bell"></i>
                    </div>

                    <div class="contenido-notificacion">

                        <h3>Recordatorio de atención</h3>

                        <p>
                            Recuerda revisar las citas programadas
                            para tu próxima jornada de atención.
                        </p>

                        <small>Ayer · 10:00 a. m. · Recordatorio</small>

                        <button type="button"
                                class="boton-detalles"
                                data-detalle="recordatorio">
                            <i class="fa-solid fa-eye"></i>
                            Ver detalles
                        </button>

                    </div>

                    <span class="punto"></span>

                </article>

                <!-- CITA CANCELADA -->

                <article class="notificacion"
                         data-tipo="Cancelación"
                         data-lectura="leida">

                    <div class="icono-notificacion rojo">
                        <i class="fa-solid fa-calendar-xmark"></i>
                    </div>

                    <div class="contenido-notificacion">

                        <h3>Cita cancelada</h3>

                        <p>
                            Se ha cancelado una cita que estaba programada
                            en tu agenda. Consulta los cambios realizados.
                        </p>

                        <small>30 de octubre · 2:00 p. m. · Cancelaciones</small>

                        <button type="button"
                                class="boton-detalles"
                                data-detalle="cancelacion">
                            <i class="fa-solid fa-eye"></i>
                            Ver detalles
                        </button>

                    </div>

                    <span class="punto leida"></span>

                </article>

                <!-- MENSAJE CUANDO NO HAY RESULTADOS -->

                <div class="sin-datos" id="sinNotificaciones">
                    <i class="fa-regular fa-bell-slash"></i>
                    <p>No hay notificaciones para mostrar.</p>
                </div>

            </div>

        </section>

        <footer class="pie">
            SIGECIR2026 · Renueva IPS · Portal de profesionales
        </footer>

    </main>

</div>

<!-- VENTANA EMERGENTE DE DETALLES -->

<div class="modal" id="modalDetalles">

    <div class="modal-contenido">

        <div class="modal-encabezado">

            <h2 id="tituloDetalle">Detalles de notificación</h2>

            <button type="button"
                    class="cerrar-modal"
                    id="cerrarModal"
                    aria-label="Cerrar ventana">
                &times;
            </button>

        </div>

        <div id="contenidoDetalle"></div>

        <div class="modal-pie">

            <button type="button" class="boton" id="cerrarBoton">
                Cerrar
            </button>

        </div>

    </div>

</div>

<!-- FUNCIONES DE NOTIFICACIONES -->

<script>

    const notificaciones = document.querySelectorAll('.notificacion');

    const filtroTipo = document.getElementById('filtroTipo');
    const filtroLectura = document.getElementById('filtroLectura');
    const mensajeVacio = document.getElementById('sinNotificaciones');

    const modal = document.getElementById('modalDetalles');
    const tituloDetalle = document.getElementById('tituloDetalle');
    const contenidoDetalle = document.getElementById('contenidoDetalle');

    /* INFORMACIÓN DE EJEMPLO */

    const detalles = {

        cita: {
            titulo: 'Detalles de la nueva cita',

            contenido: `
                <div class="detalle-item">
                    <strong>Paciente</strong>
                    <p>María Pérez</p>
                </div>

                <div class="detalle-item">
                    <strong>Fecha de la cita</strong>
                    <p>4 de noviembre de 2026</p>
                </div>

                <div class="detalle-item">
                    <strong>Hora</strong>
                    <p>8:00 a. m. - 8:30 a. m.</p>
                </div>

                <div class="detalle-item">
                    <strong>Servicio</strong>
                    <p>Consulta de fisioterapia</p>
                </div>

                <div class="detalle-item">
                    <strong>Modalidad</strong>
                    <p>Presencial</p>
                </div>

                <div class="detalle-item">
                    <strong>Consultorio</strong>
                    <p>Consultorio 2</p>
                </div>

                <div class="detalle-item">
                    <strong>Estado</strong>
                    <p>En espera</p>
                </div>
            `
        },

        horario: {
            titulo: 'Detalles de actualización de horario',

            contenido: `
                <div class="detalle-item">
                    <strong>Fecha de actualización</strong>
                    <p>3 de noviembre de 2026</p>
                </div>

                <div class="detalle-item">
                    <strong>Horario anterior</strong>
                    <p>Martes: 2:00 p. m. - 6:00 p. m.</p>
                </div>

                <div class="detalle-item">
                    <strong>Nuevo horario</strong>
                    <p>Martes: 3:00 p. m. - 7:00 p. m.</p>
                </div>

                <div class="detalle-item">
                    <strong>Información</strong>
                    <p>El horario fue actualizado por el administrador.</p>
                </div>
            `
        },

        recordatorio: {
            titulo: 'Detalles del recordatorio',

            contenido: `
                <div class="detalle-item">
                    <strong>Próxima jornada</strong>
                    <p>5 de noviembre de 2026</p>
                </div>

                <div class="detalle-item">
                    <strong>Horario de atención</strong>
                    <p>8:00 a. m. - 12:00 p. m.</p>
                </div>

                <div class="detalle-item">
                    <strong>Citas programadas</strong>
                    <p>4 citas pendientes de atención.</p>
                </div>

                <div class="detalle-item">
                    <strong>Recomendación</strong>
                    <p>Revisa tu agenda antes de iniciar la jornada.</p>
                </div>
            `
        },

        cancelacion: {
            titulo: 'Detalles de la cita cancelada',

            contenido: `
                <div class="detalle-item">
                    <strong>Paciente</strong>
                    <p>Juan Rodríguez</p>
                </div>

                <div class="detalle-item">
                    <strong>Fecha de la cita</strong>
                    <p>30 de octubre de 2026</p>
                </div>

                <div class="detalle-item">
                    <strong>Hora</strong>
                    <p>2:00 p. m.</p>
                </div>

                <div class="detalle-item">
                    <strong>Servicio</strong>
                    <p>Consulta de fisioterapia</p>
                </div>

                <div class="detalle-item">
                    <strong>Estado</strong>
                    <p>Cancelada</p>
                </div>

                <div class="detalle-item">
                    <strong>Motivo</strong>
                    <p>No se ha registrado un motivo de cancelación.</p>
                </div>
            `
        }

    };

    /* ACTUALIZAR CONTADORES */

    function actualizarContadores() {

        const total = notificaciones.length;

        const noLeidas = document.querySelectorAll(
            '.notificacion[data-lectura="no-leida"]'
        ).length;

        const leidas = document.querySelectorAll(
            '.notificacion[data-lectura="leida"]'
        ).length;

        document.getElementById('totalNotificaciones').textContent = total;

        document.getElementById('totalNoLeidas').textContent = noLeidas;

        document.getElementById('totalLeidas').textContent = leidas;
    }

    /* FILTRAR NOTIFICACIONES */

    function filtrarNotificaciones() {

        const tipo = filtroTipo.value;
        const lectura = filtroLectura.value;

        let visibles = 0;

        notificaciones.forEach(notificacion => {

            const tipoNotificacion = notificacion.dataset.tipo;
            const estadoLectura = notificacion.dataset.lectura;

            const coincideTipo = !tipo || tipoNotificacion === tipo;

            const coincideLectura = !lectura || estadoLectura === lectura;

            if (coincideTipo && coincideLectura) {

                notificacion.style.display = 'flex';

                visibles++;

            } else {

                notificacion.style.display = 'none';

            }

        });

        mensajeVacio.style.display = visibles === 0 ? 'block' : 'none';
    }

    /* MARCAR UNA NOTIFICACIÓN COMO LEÍDA */

    function marcarComoLeida(notificacion) {

        notificacion.dataset.lectura = 'leida';

        notificacion.classList.remove('no-leida');

        const punto = notificacion.querySelector('.punto');

        punto.classList.add('leida');

        actualizarContadores();

        filtrarNotificaciones();
    }

    /* ABRIR DETALLES */

    function abrirDetalles(tipo) {

        const detalle = detalles[tipo];

        if (!detalle) return;

        tituloDetalle.textContent = detalle.titulo;

        contenidoDetalle.innerHTML = detalle.contenido;

        modal.classList.add('mostrar');
    }

    /* BOTONES VER DETALLES */

    document.querySelectorAll('.boton-detalles').forEach(boton => {

        boton.addEventListener('click', function(event) {

            event.stopPropagation();

            const notificacion = this.closest('.notificacion');

            marcarComoLeida(notificacion);

            abrirDetalles(this.dataset.detalle);

        });

    });

    /* MARCAR TODAS COMO LEÍDAS */

    document.getElementById('marcarTodas').addEventListener('click', () => {

        notificaciones.forEach(notificacion => {

            notificacion.dataset.lectura = 'leida';

            notificacion.classList.remove('no-leida');

            const punto = notificacion.querySelector('.punto');

            punto.classList.add('leida');

        });

        actualizarContadores();

        filtrarNotificaciones();

    });

    /* CERRAR VENTANA */

    function cerrarModal() {

        modal.classList.remove('mostrar');

    }

    document.getElementById('cerrarModal').addEventListener('click', cerrarModal);

    document.getElementById('cerrarBoton').addEventListener('click', cerrarModal);

    modal.addEventListener('click', function(event) {

        if (event.target === modal) {

            cerrarModal();

        }

    });

    /* CERRAR CON LA TECLA ESC */

    document.addEventListener('keydown', function(event) {

        if (event.key === 'Escape') {

            cerrarModal();

        }

    });

    /* EVENTOS DE LOS FILTROS */

    filtroTipo.addEventListener('change', filtrarNotificaciones);

    filtroLectura.addEventListener('change', filtrarNotificaciones);

    /* INICIAR CONTADORES */

    actualizarContadores();

</script>

</body>
</html>
