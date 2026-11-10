<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi agenda</title>

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
            padding: 20px;
        }

        .tarjeta p {
            color: var(--gris);
            font-size: 13px;
            margin-bottom: 12px;
        }

        .tarjeta h2 {
            font-size: 27px;
        }

        .tarjeta i {
            color: var(--verde);
            margin-right: 7px;
        }

        /* FILTROS */

        .panel {
            background: var(--blanco);
            border: 1px solid var(--borde);
            border-radius: 13px;
            padding: 22px;
            margin-bottom: 22px;
        }

        .panel h2 {
            font-size: 18px;
            margin-bottom: 18px;
        }

        .filtros {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr;
            gap: 15px;
        }

        .campo label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 8px;
            color: #475569;
        }

        .campo input,
        .campo select {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid var(--borde);
            border-radius: 8px;
            font-size: 13px;
            outline: none;
            background: white;
        }

        .campo input:focus,
        .campo select:focus {
            border-color: var(--verde);
        }

        /* TABLA */

        .encabezado-tabla {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 18px;
        }

        .encabezado-tabla h2 {
            font-size: 18px;
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
            padding: 15px;
            white-space: nowrap;
        }

        td {
            padding: 16px 15px;
            border-top: 1px solid #F1F5F9;
            font-size: 13px;
            white-space: nowrap;
        }

        .estado {
            display: inline-block;
            border-radius: 20px;
            padding: 6px 10px;
            font-size: 11px;
            font-weight: 700;
        }

        .programada {
            background: #DBEAFE;
            color: #1D4ED8;
        }

        .pendiente {
            background: #FEF3C7;
            color: #92400E;
        }

        .atendida {
            background: #DCFCE7;
            color: #166534;
        }

        .cancelada {
            background: #FEE2E2;
            color: #991B1B;
        }

        .sin-resultados {
            text-align: center;
            padding: 25px;
            color: var(--gris);
            display: none;
        }

        .pie {
            text-align: center;
            padding: 25px 10px 5px;
            color: #94A3B8;
            font-size: 12px;
        }

        @media (max-width: 1000px) {
            .resumen {
                grid-template-columns: repeat(2, 1fr);
            }

            .filtros {
                grid-template-columns: 1fr 1fr;
            }
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

            .barra-superior {
                align-items: flex-start;
                flex-direction: column;
            }

            .resumen,
            .filtros {
                grid-template-columns: 1fr;
            }

            .encabezado-tabla {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media print {

        /* Ocultar toda la página */
        body * {
            visibility: hidden;
        }

        /* Mostrar únicamente el cuadro de citas */
        .seccion-impresion,
        .seccion-impresion * {
            visibility: visible;
        }

        .seccion-impresion {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            margin: 0;
            padding: 10px;
            border: none;
            box-shadow: none;
            background: white;
        }

        /* Ocultar el botón de imprimir */
        .seccion-impresion .boton {
            display: none !important;
        }

        /* Ajustar la tabla para impresión */
        .tabla-contenedor {
            overflow: visible !important;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #999 !important;
            padding: 10px !important;
            font-size: 11px !important;
            white-space: normal !important;
        }

        thead {
            background: #EAF7EE !important;
        }

        .sin-resultados {
            display: none !important;
        }

        @page {
            size: landscape;
            margin: 1cm;
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

        <a href="{{ route('profesionales.agenda') }}" class="enlace-menu activo">
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

        <a href="{{ route('profesionales.horario') }}" class="enlace-menu">
            <i class="fa-solid fa-clock icono-menu"></i>
            <span>Mi horario</span>
        </a>

        <a href="{{ route('profesionales.dashboard') }}#perfil" class="enlace-menu">
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
                <h1>Mi agenda</h1>
                <p>Consulta y organiza tus citas asignadas.</p>
            </div>

            <div class="fecha">
                <i class="fa-regular fa-calendar"></i>
                {{ now()->locale('es')->translatedFormat('l, d \d\e F \d\e Y') }}
            </div>
        </header>

        <!-- RESUMEN DE CITAS -->

        <section class="resumen">

            <article class="tarjeta">
                <p><i class="fa-solid fa-calendar-check"></i> Total de citas</p>
                <h2 id="totalCitas">4</h2>
            </article>

            <article class="tarjeta">
                <p><i class="fa-solid fa-clock"></i> Pendientes</p>
                <h2 id="totalPendientes">1</h2>
            </article>

            <article class="tarjeta">
                <p><i class="fa-solid fa-check-circle"></i> Atendidas</p>
                <h2 id="totalAtendidas">1</h2>
            </article>

        </section>

        <!-- FILTROS -->

        <section class="panel">

            <h2><i class="fa-solid fa-filter"></i> Buscar y filtrar citas</h2>

            <div class="filtros">

                <div class="campo">
                    <label for="buscar">Buscar paciente</label>
                    <input type="text" id="buscar"
                           placeholder="Escribe el nombre del paciente...">
                </div>

                <div class="campo">
                    <label for="fechaFiltro">Fecha</label>
                    <input type="date" id="fechaFiltro">
                </div>

                <div class="campo">
                    <label for="estadoFiltro">Estado de la cita</label>
                    <select id="estadoFiltro">
                        <option value="">Todos los estados</option>
                        <option value="programada">Programada</option>
                        <option value="pendiente">En espera</option>
                        <option value="atendida">Atendida</option>
                        <option value="cancelada">Cancelada</option>
                    </select>
                </div>

            </div>

        </section>

        <!-- TABLA DE CITAS -->

        <section class="panel seccion-impresion">

            <div class="encabezado-tabla">
                <div>
                    <h2>Listado de citas</h2>
                    <p style="color:#64748B; font-size:13px; margin-top:6px;">
                        Citas asignadas al profesional.
                    </p>
                </div>

                <button class="boton" onclick="window.print()">
                    <i class="fa-solid fa-print"></i>
                    Imprimir agenda
                </button>
            </div>

            <div class="tabla-contenedor">

                <table id="tablaCitas">

                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Paciente</th>
                            <th>Servicio</th>
                            <th>Modalidad</th>
                            <th>Estado</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr data-paciente="maria perez"
                            data-fecha="2026-11-04"
                            data-estado="pendiente">
                            <td>04/11/2026</td>
                            <td>8:00 a. m.</td>
                            <td>María Pérez</td>
                            <td>Psicología</td>
                            <td>Presencial</td>
                            <td><span class="estado pendiente">En espera</span></td>
                        </tr>

                        <tr data-paciente="juan diaz"
                            data-fecha="2026-11-04"
                            data-estado="atendida">
                            <td>04/11/2026</td>
                            <td>9:00 a. m.</td>
                            <td>Juan Díaz</td>
                            <td>Fisioterapia</td>
                            <td>Presencial</td>
                            <td><span class="estado atendida">Atendida</span></td>
                        </tr>

                        <tr data-paciente="laura gomez"
                            data-fecha="2026-11-05"
                            data-estado="programada">
                            <td>05/11/2026</td>
                            <td>10:00 a. m.</td>
                            <td>Laura Gómez</td>
                            <td>Terapia ocupacional</td>
                            <td>Presencial</td>
                            <td><span class="estado programada">Programada</span></td>
                        </tr>

                        <tr data-paciente="carlos ruiz"
                            data-fecha="2026-11-05"
                            data-estado="cancelada">
                            <td>05/11/2026</td>
                            <td>11:00 a. m.</td>
                            <td>Carlos Ruiz</td>
                            <td>Fonoaudiología</td>
                            <td>Virtual</td>
                            <td><span class="estado cancelada">Cancelada</span></td>
                        </tr>

                    </tbody>

                </table>

                <p class="sin-resultados" id="sinResultados">
                    No se encontraron citas con los filtros seleccionados.
                </p>

            </div>

        </section>

        <footer class="pie">
            SIGECIR2026 · Renueva IPS · Portal de profesionales
        </footer>

    </main>

</div>

<script>
    const buscar = document.getElementById('buscar');
    const fechaFiltro = document.getElementById('fechaFiltro');
    const estadoFiltro = document.getElementById('estadoFiltro');

    const filas = document.querySelectorAll('#tablaCitas tbody tr');

    function filtrarCitas() {
        const nombre = buscar.value.toLowerCase().trim();
        const fecha = fechaFiltro.value;
        const estado = estadoFiltro.value;

        let visibles = 0;

        filas.forEach(fila => {
            const paciente = fila.dataset.paciente;
            const fechaCita = fila.dataset.fecha;
            const estadoCita = fila.dataset.estado;

            const coincideNombre = paciente.includes(nombre);
            const coincideFecha = !fecha || fechaCita === fecha;
            const coincideEstado = !estado || estadoCita === estado;

            const mostrar = coincideNombre && coincideFecha && coincideEstado;

            fila.style.display = mostrar ? '' : 'none';

            if (mostrar) {
                visibles++;
            }
        });

        document.getElementById('sinResultados').style.display =
            visibles === 0 ? 'block' : 'none';
    }

    buscar.addEventListener('input', filtrarCitas);
    fechaFiltro.addEventListener('change', filtrarCitas);
    estadoFiltro.addEventListener('change', filtrarCitas);
</script>

</body>
</html>
