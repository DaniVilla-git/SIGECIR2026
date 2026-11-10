
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mis pacientes</title>

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

        /* BIENVENIDA */

        .bienvenida {
            background: linear-gradient(110deg, #EAF7EE, #F7FCF8);
            border: 1px solid #D3EEDB;
            border-radius: 15px;
            padding: 23px;
            margin-bottom: 25px;
        }

        .bienvenida h2 {
            font-size: 21px;
            margin-bottom: 9px;
            color: #176B32;
        }

        .bienvenida p {
            color: #52677C;
            font-size: 14px;
            line-height: 1.7;
        }

        /* ESTADÍSTICAS */

        .estadisticas {
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
            margin-bottom: 16px;
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

        /* SECCIÓN DE PACIENTES */

        .seccion-pacientes {
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

        /* BUSCADOR Y FILTROS */

        .filtros {
            display: flex;
            gap: 12px;
            padding: 20px 22px;
            flex-wrap: wrap;
            border-bottom: 1px solid var(--borde);
        }

        .campo-busqueda {
            flex: 1;
            min-width: 220px;
            position: relative;
        }

        .campo-busqueda i {
            position: absolute;
            left: 13px;
            top: 13px;
            color: #94A3B8;
        }

        .campo-busqueda input,
        .filtros select {
            width: 100%;
            height: 42px;
            border: 1px solid var(--borde);
            border-radius: 8px;
            padding: 0 13px;
            font-size: 13px;
            outline: none;
            background: white;
            color: var(--texto);
        }

        .campo-busqueda input {
            padding-left: 38px;
        }

        .campo-busqueda input:focus,
        .filtros select:focus {
            border-color: var(--verde);
        }

        .filtros select {
            width: 200px;
        }

        /* TABLA */

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

        .nombre-paciente {
            font-weight: 700;
            color: #334155;
        }

        .subtexto {
            display: block;
            color: var(--gris);
            font-size: 12px;
            margin-top: 5px;
        }

        .estado {
            display: inline-block;
            border-radius: 20px;
            padding: 6px 10px;
            font-size: 11px;
            font-weight: 700;
        }

        .activo {
            color: #166534;
            background: #DCFCE7;
        }

        .inactivo {
            color: #92400E;
            background: #FEF3C7;
        }

        .sin-datos {
            padding: 35px;
            text-align: center;
            color: var(--gris);
            font-size: 14px;
        }

        .pie {
            text-align: center;
            padding: 25px 10px 5px;
            color: #94A3B8;
            font-size: 12px;
        }

        /* RESPONSIVE */

        @media (max-width: 1000px) {
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

            .estadisticas {
                gap: 12px;
            }

            .encabezado-seccion {
                align-items: flex-start;
                flex-direction: column;
            }

            .filtros {
                flex-direction: column;
            }

            .filtros select {
                width: 100%;
            }
        }

        @media (max-width: 430px) {
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

        <a href="{{ route('profesionales.pacientes') }}" class="enlace-menu activo">
            <i class="fa-solid fa-users icono-menu"></i>
            <span>Mis pacientes</span>
        </a>

        <a href="{{ route('profesionales.notificaciones') }}" class="enlace-menu">
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
                <h1>Mis pacientes</h1>
                <p>Consulta la información de los pacientes asignados.</p>
            </div>

            <div class="fecha">
                <i class="fa-regular fa-calendar"></i>
                {{ now()->locale('es')->translatedFormat('l, d \d\e F \d\e Y') }}
            </div>
        </header>

        <!-- BIENVENIDA -->
        <section class="bienvenida">
            <h2>Directorio de pacientes</h2>
            <p>
                Desde este espacio puedes consultar los datos básicos
                de tus pacientes y revisar los servicios relacionados
                con su atención.
            </p>
        </section>

        <!-- ESTADÍSTICAS -->
        <section class="estadisticas">

            <article class="tarjeta">
                <div class="tarjeta-superior">
                    <p>Total de pacientes</p>
                    <span class="icono-tarjeta">
                        <i class="fa-solid fa-users"></i>
                    </span>
                </div>
                <h3 id="totalPacientes">4</h3>
                <small>Pacientes registrados en el ejemplo</small>
            </article>

            <article class="tarjeta">
                <div class="tarjeta-superior">
                    <p>Pacientes activos</p>
                    <span class="icono-tarjeta">
                        <i class="fa-solid fa-user-check"></i>
                    </span>
                </div>
                <h3 id="pacientesActivos">3</h3>
                <small>Con atención activa</small>
            </article>

            <article class="tarjeta">
                <div class="tarjeta-superior">
                    <p>Pacientes inactivos</p>
                    <span class="icono-tarjeta">
                        <i class="fa-solid fa-user-clock"></i>
                    </span>
                </div>
                <h3 id="pacientesInactivos">1</h3>
                <small>Sin atención activa</small>
            </article>

        </section>

        <!-- LISTADO DE PACIENTES -->
        <section class="seccion-pacientes">

            <div class="encabezado-seccion">
                <div>
                    <h2>Listado de pacientes</h2>
                    <p>Información de los pacientes asignados al profesional.</p>
                </div>
            </div>

            <!-- BUSCADOR Y FILTROS -->
            <div class="filtros">

                <div class="campo-busqueda">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input
                        type="text"
                        id="buscarPaciente"
                        placeholder="Buscar por nombre o documento...">
                </div>

                <select id="filtroServicio">
                    <option value="">Todos los servicios</option>
                    <option value="Fonoaudiología">Fonoaudiología</option>
                    <option value="Psicología">Psicología</option>
                    <option value="Fisioterapia">Fisioterapia</option>
                    <option value="Terapia ocupacional">Terapia ocupacional</option>
                </select>

                <select id="filtroEstado">
                    <option value="">Todos los estados</option>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>

            </div>

            <!-- TABLA -->
            <div class="tabla-contenedor">

                <table>
                    <thead>
                        <tr>
                            <th>Paciente</th>
                            <th>Documento</th>
                            <th>Teléfono</th>
                            <th>Servicio</th>
                            <th>Estado</th>
                        </tr>
                    </thead>

                    <tbody id="tablaPacientes">

                        <tr data-servicio="Fonoaudiología" data-estado="Activo">
                            <td>
                                <span class="nombre-paciente">María Pérez</span>
                                <span class="subtexto">Paciente de ejemplo</span>
                            </td>
                            <td>000000001</td>
                            <td>300 000 0001</td>
                            <td>Fonoaudiología</td>
                            <td><span class="estado activo">Activo</span></td>
                        </tr>

                        <tr data-servicio="Psicología" data-estado="Activo">
                            <td>
                                <span class="nombre-paciente">Juan Díaz</span>
                                <span class="subtexto">Paciente de ejemplo</span>
                            </td>
                            <td>000000002</td>
                            <td>300 000 0002</td>
                            <td>Psicología</td>
                            <td><span class="estado activo">Activo</span></td>
                        </tr>

                        <tr data-servicio="Fisioterapia" data-estado="Inactivo">
                            <td>
                                <span class="nombre-paciente">Laura Gómez</span>
                                <span class="subtexto">Paciente de ejemplo</span>
                            </td>
                            <td>000000003</td>
                            <td>300 000 0003</td>
                            <td>Fisioterapia</td>
                            <td><span class="estado inactivo">Inactivo</span></td>
                        </tr>

                        <tr data-servicio="Terapia ocupacional" data-estado="Activo">
                            <td>
                                <span class="nombre-paciente">Carlos Ruiz</span>
                                <span class="subtexto">Paciente de ejemplo</span>
                            </td>
                            <td>000000004</td>
                            <td>300 000 0004</td>
                            <td>Terapia ocupacional</td>
                            <td><span class="estado activo">Activo</span></td>
                        </tr>

                        <tr id="mensajeSinResultados" style="display:none;">
                            <td colspan="5" class="sin-datos">
                                No se encontraron pacientes con esos criterios.
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>

        </section>

        <footer class="pie">
            SIGECIR2026 · Renueva IPS · Portal de profesionales
        </footer>

    </main>

</div>

<!-- BUSCADOR Y FILTROS -->
<script>
    const buscarPaciente = document.getElementById('buscarPaciente');
    const filtroServicio = document.getElementById('filtroServicio');
    const filtroEstado = document.getElementById('filtroEstado');

    const filas = document.querySelectorAll(
        '#tablaPacientes tr[data-servicio]'
    );

    const mensajeSinResultados = document.getElementById(
        'mensajeSinResultados'
    );

    function filtrarPacientes() {

        const texto = buscarPaciente.value.toLowerCase().trim();
        const servicio = filtroServicio.value;
        const estado = filtroEstado.value;

        let visibles = 0;

        filas.forEach(fila => {

            const contenido = fila.innerText.toLowerCase();
            const servicioFila = fila.dataset.servicio;
            const estadoFila = fila.dataset.estado;

            const coincideTexto = contenido.includes(texto);
            const coincideServicio = !servicio || servicioFila === servicio;
            const coincideEstado = !estado || estadoFila === estado;

            if (coincideTexto && coincideServicio && coincideEstado) {
                fila.style.display = '';
                visibles++;
            } else {
                fila.style.display = 'none';
            }

        });

        mensajeSinResultados.style.display =
            visibles === 0 ? '' : 'none';
    }

    buscarPaciente.addEventListener('input', filtrarPacientes);
    filtroServicio.addEventListener('change', filtrarPacientes);
    filtroEstado.addEventListener('change', filtrarPacientes);
</script>

</body>
</html>
