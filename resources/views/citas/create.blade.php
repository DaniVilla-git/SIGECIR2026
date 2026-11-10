@extends('layouts.app')

@section('title', 'Nueva Cita')

@section('content')

{{-- Calendario --}}
<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<div class="container mx-auto mt-10 px-4">

    <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">

        {{-- ENCABEZADO --}}
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-bold text-gray-800">
                Nueva Cita
            </h2>

            <p class="text-gray-500 mt-2">
                Registra una nueva cita en el sistema
            </p>
        </div>

        {{-- ERRORES --}}
        @if($errors->any())
            <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl mb-6">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('citas.store') }}"
              method="POST"
              id="formCita"
              data-url="{{ route('citas.disponibilidad') }}">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- USUARIO --}}
                <div>
                    <label for="id_usuario"
                           class="block text-sm font-semibold text-gray-700 mb-2">
                        Usuario
                    </label>

                    <select name="id_usuario" id="id_usuario"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 outline-none"
                        required>

                        <option value="">Seleccione un usuario</option>

                        @foreach($usuarios as $usuario)
                            <option value="{{ $usuario->id }}"
                                {{ old('id_usuario') == $usuario->id ? 'selected' : '' }}>
                                {{ $usuario->primer_nombre }}
                                {{ $usuario->segundo_nombre }}
                                {{ $usuario->primer_apellido }}
                                {{ $usuario->segundo_apellido }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- PROFESIONAL --}}
                <div>
                    <label for="profesional"
                        class="block text-sm font-semibold text-gray-700 mb-2">
                        Nombre Profesional
                    </label>

                    <input type="text"
                        id="profesional"
                        readonly
                        placeholder="Se completará al seleccionar el servicio"
                        class="w-full border border-gray-300 bg-gray-100 rounded-xl px-4 py-3 outline-none">
                </div>
                <input type="hidden"
                name="id_profesional"
                id="id_profesional"
                value="{{ old('id_profesional') }}">

                {{-- SERVICIO --}}
                <div>
                    <label for="id_servicios"
                           class="block text-sm font-semibold text-gray-700 mb-2">
                        Servicio
                    </label>

                    <select name="id_servicios" id="id_servicios"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 outline-none"
                        required>

                        <option value="">Seleccione un servicio</option>

                        @foreach($servicios as $servicio)
                            <option value="{{ $servicio->id }}"
                                {{ old('id_servicios') == $servicio->id ? 'selected' : '' }}>
                                {{ $servicio->nombre_servicio }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- MODALIDAD --}}
                <div>
                    <label for="modalidad_cita"
                           class="block text-sm font-semibold text-gray-700 mb-2">
                        Modalidad Cita
                    </label>

                    <select name="modalidad_cita" id="modalidad_cita"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 outline-none"
                        required>

                        <option value="">Seleccione una modalidad</option>

                        <option value="Presencial"
                            {{ old('modalidad_cita') == 'Presencial' ? 'selected' : '' }}>
                            Presencial
                        </option>

                        <option value="Virtual"
                            {{ old('modalidad_cita') == 'Virtual' ? 'selected' : '' }}>
                            Virtual
                        </option>

                    </select>
                </div>

                {{-- CONSULTORIO --}}
                <div>
                    <label for="consultorio"
                        class="block text-sm font-semibold text-gray-700 mb-2">
                        Consultorio
                    </label>

                    <input type="text"
                        name="consultorio"
                        id="consultorio"
                        value="{{ old('consultorio') }}"
                        readonly
                        placeholder="Se completará automáticamente"
                        class="w-full border border-gray-300 bg-gray-100 rounded-xl px-4 py-3 outline-none"
                        required>
                </div>

                {{-- FECHA CITA --}}
                <div>
                    <label for="fecha_cita"
                           class="block text-sm font-semibold text-gray-700 mb-2">
                        Fecha Cita
                    </label>

                    <input type="text" name="fecha_cita" id="fecha_cita"
                        value="{{ old('fecha_cita') }}"
                        placeholder="Seleccione primero un servicio"
                        autocomplete="off"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 outline-none"
                        required>

                    <p id="mensajeFecha" class="text-sm text-gray-500 mt-2">
                        Seleccione un servicio para consultar las fechas disponibles.
                    </p>
                </div>

                {{-- HORA INICIO --}}
                <div>
                    <label for="hora_inicio"
                           class="block text-sm font-semibold text-gray-700 mb-2">
                        Hora Inicio
                    </label>

                    <select name="hora_inicio" id="hora_inicio"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 outline-none"
                        required>

                        <option value="">Seleccione primero servicio y fecha</option>

                    </select>

                    <p id="mensajeHora" class="text-sm text-gray-500 mt-2">
                        Los horarios disponibles aparecerán aquí.
                    </p>
                </div>

                {{-- HORA FIN --}}
                <div>
                    <label for="hora_fin"
                           class="block text-sm font-semibold text-gray-700 mb-2">
                        Hora Fin
                    </label>

                    <input type="time" name="hora_fin" id="hora_fin"
                        value="{{ old('hora_fin') }}"
                        readonly
                        class="w-full border border-gray-300 bg-gray-100 rounded-xl px-4 py-3 outline-none"
                        required>

                    <p class="text-sm text-gray-500 mt-2">
                        La duración de cada cita es de 30 minutos.
                    </p>
                </div>

                {{-- ESTADO --}}
                <div>
                    <label for="estado_cita"
                           class="block text-sm font-semibold text-gray-700 mb-2">
                        Estado Cita
                    </label>

                    <select name="estado_cita" id="estado_cita"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 outline-none"
                        required>

                        <option value="">Seleccione un estado</option>

                        <option value="Pendiente"
                            {{ old('estado_cita') == 'Pendiente' ? 'selected' : '' }}>
                            Pendiente
                        </option>

                        <option value="Confirmada"
                            {{ old('estado_cita') == 'Confirmada' ? 'selected' : '' }}>
                            Confirmada
                        </option>

                        <option value="Atendida"
                            {{ old('estado_cita') == 'Atendida' ? 'selected' : '' }}>
                            Atendida
                        </option>

                        <option value="Cancelada"
                            {{ old('estado_cita') == 'Cancelada' ? 'selected' : '' }}>
                            Cancelada
                        </option>

                        <option value="Inasistencia"
                            {{ old('estado_cita') == 'Inasistencia' ? 'selected' : '' }}>
                            Inasistencia
                        </option>

                    </select>
                </div>

                {{-- FECHA CREACIÓN --}}
                <div>
                    <label for="fecha_creacion_cita"
                           class="block text-sm font-semibold text-gray-700 mb-2">
                        Fecha de creación
                    </label>

                    <input type="date" name="fecha_creacion_cita"
                        id="fecha_creacion_cita"
                        value="{{ old('fecha_creacion_cita', date('Y-m-d')) }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 outline-none"
                        required>
                </div>

                {{-- OBSERVACIONES --}}
                <div class="md:col-span-2">
                    <label for="observaciones_cita"
                           class="block text-sm font-semibold text-gray-700 mb-2">
                        Observaciones
                    </label>

                    <textarea name="observaciones_cita"
                        id="observaciones_cita"
                        rows="4"
                        placeholder="Ingrese las observaciones de la cita..."
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 outline-none">{{ old('observaciones_cita') }}</textarea>
                </div>

            </div>

            {{-- BOTONES --}}
            <div class="flex flex-col sm:flex-row justify-center gap-4 mt-8">

                <button type="submit"
                    id="btnGuardar"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-8 py-3 rounded-xl shadow-md transition duration-200">
                    Guardar Cita
                </button>

                <a href="{{ route('citas.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-8 py-3 rounded-xl text-center shadow-md transition duration-200">
                    Cancelar
                </a>

            </div>

        </form>

    </div>

</div>

{{-- LIBRERÍAS DEL CALENDARIO --}}
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const formulario = document.getElementById('formCita');

    const servicio = document.getElementById('id_servicios');
    const profesional = document.getElementById('profesional');
    const consultorio = document.getElementById('consultorio');
    const idProfesional = document.getElementById('id_profesional');

    const fecha = document.getElementById('fecha_cita');
    const horaInicio = document.getElementById('hora_inicio');
    const horaFin = document.getElementById('hora_fin');

    const mensajeFecha = document.getElementById('mensajeFecha');
    const mensajeHora = document.getElementById('mensajeHora');

    const urlDisponibilidad = formulario.dataset.url;

    const urlProfesional = @json(route('servicios.profesional', ['id' => '__ID__']));

    const horarios = [
        '08:00', '08:30',
        '09:00', '09:30',
        '10:00', '10:30',
        '11:00', '11:30',
        '14:00', '14:30',
        '15:00', '15:30',
        '16:00', '16:30',
        '17:00', '17:30'
    ];

    let fechasOcupadas = [];
    let calendario;
    let consultaProfesional = 0;

    const fechaAnterior = @json(old('fecha_cita'));
    const horaAnterior = @json(old('hora_inicio'));

    // AUTOCOMPLETAR PROFESIONAL Y CONSULTORIO
    async function cargarProfesional() {

        const consultaActual = ++consultaProfesional;

        profesional.value = '';
        consultorio.value = '';
        idProfesional.value = '';

        if (!servicio.value) {
            return;
        }

        profesional.value = 'Consultando profesional...';
        consultorio.value = 'Consultando consultorio...';

        try {

            const url = urlProfesional.replace('__ID__', servicio.value);

            const respuesta = await fetch(url, {
                headers: {
                    'Accept': 'application/json'
                }
            });

            if (!respuesta.ok) {
                throw new Error('No se pudo consultar el profesional.');
            }

            const datos = await respuesta.json();

            // Evitar mostrar resultados de una selección anterior
            if (consultaActual !== consultaProfesional) {
                return;
            }

            profesional.value = datos.profesional || '';
            consultorio.value = datos.consultorio || '';
            idProfesional.value = datos.id_profesional || '';

            if (!datos.profesional) {
                profesional.value = 'Sin profesional asignado';
                consultorio.value = 'No disponible';
                alert('Este servicio no tiene un profesional asignado.');
            }

        } catch (error) {

            if (consultaActual !== consultaProfesional) {
                return;
            }

            profesional.value = '';
            consultorio.value = '';

            alert(error.message);
        }
    }

    // CALCULAR HORA FINAL
    function calcularHoraFin() {

        if (!horaInicio.value) {
            horaFin.value = '';
            return;
        }

        const partes = horaInicio.value.split(':');

        let horas = parseInt(partes[0]);
        let minutos = parseInt(partes[1]);

        minutos += 30;

        if (minutos >= 60) {
            minutos -= 60;
            horas++;
        }

        horaFin.value =
            String(horas).padStart(2, '0') + ':' +
            String(minutos).padStart(2, '0');
    }

    // CONSULTAR DISPONIBILIDAD AL SERVIDOR
    async function consultarDisponibilidad(mes, fechaSeleccionada = '') {

        if (!servicio.value) {
            return null;
        }

        const parametros = new URLSearchParams({
            mes: mes,
            id_servicios: servicio.value
        });

        if (fechaSeleccionada) {
            parametros.append('fecha', fechaSeleccionada);
        }

        try {

            const respuesta = await fetch(
                urlDisponibilidad + '?' + parametros.toString(),
                {
                    headers: {
                        'Accept': 'application/json'
                    }
                }
            );

            if (!respuesta.ok) {
                throw new Error('No se pudo consultar la disponibilidad.');
            }

            return await respuesta.json();

        } catch (error) {

            mensajeFecha.textContent = error.message;
            mensajeFecha.classList.add('text-red-600');

            return null;
        }
    }

    // ACTUALIZAR LOS DÍAS OCUPADOS DEL CALENDARIO
    async function actualizarFechasOcupadas() {

        if (!servicio.value || !calendario) {
            return;
        }

        const mes = calendario.currentYear + '-' +
            String(calendario.currentMonth + 1).padStart(2, '0');

        const datos = await consultarDisponibilidad(mes);

        if (!datos) {
            return;
        }

        fechasOcupadas = datos.fechas_ocupadas || [];

        calendario.set('disable', [
            function (date) {

                const fechaFormateada =
                    date.getFullYear() + '-' +
                    String(date.getMonth() + 1).padStart(2, '0') + '-' +
                    String(date.getDate()).padStart(2, '0');

                return fechasOcupadas.includes(fechaFormateada);
            }
        ]);

        mensajeFecha.textContent =
            'Los días sin disponibilidad completa están deshabilitados.';

        mensajeFecha.classList.remove('text-red-600');
    }

    // CONSULTAR HORARIOS DISPONIBLES PARA LA FECHA
    async function actualizarHorarios() {

        horaInicio.innerHTML = '';
        horaFin.value = '';

        if (!servicio.value || !fecha.value) {

            horaInicio.innerHTML =
                '<option value="">Seleccione primero servicio y fecha</option>';

            mensajeHora.textContent =
                'Seleccione un servicio y una fecha.';

            return;
        }

        const fechaSeleccionada = fecha.value;
        const mes = fechaSeleccionada.substring(0, 7);

        horaInicio.innerHTML =
            '<option value="">Consultando horarios...</option>';

        const datos = await consultarDisponibilidad(
            mes,
            fechaSeleccionada
        );

        if (!datos) {

            horaInicio.innerHTML =
                '<option value="">Error al consultar horarios</option>';

            return;
        }

        const ocupadas = datos.horas_ocupadas || [];

        const disponibles = horarios.filter(function (hora) {
            return !ocupadas.includes(hora);
        });

        horaInicio.innerHTML =
            '<option value="">Seleccione una hora disponible</option>';

        disponibles.forEach(function (hora) {

            const opcion = document.createElement('option');

            opcion.value = hora;
            opcion.textContent = hora;

            if (hora === horaAnterior) {
                opcion.selected = true;
            }

            horaInicio.appendChild(opcion);
        });

        if (disponibles.length === 0) {

            horaInicio.innerHTML =
                '<option value="">No hay horarios disponibles</option>';

            mensajeHora.textContent =
                'Este servicio ya no tiene horarios disponibles en esta fecha.';

        } else {

            mensajeHora.textContent =
                'Hay ' + disponibles.length +
                ' horarios disponibles para esta fecha.';
        }

        calcularHoraFin();
    }

    // CONFIGURAR CALENDARIO
    calendario = flatpickr(fecha, {

        locale: 'es',

        dateFormat: 'Y-m-d',

        allowInput: false,

        disable: [],

        onReady: function () {

            if (servicio.value) {
                actualizarFechasOcupadas();
            }
        },

        onMonthChange: function () {
            actualizarFechasOcupadas();
        },

        onChange: function () {
            actualizarHorarios();
        }
    });

    // AL CAMBIAR EL SERVICIO
    servicio.addEventListener('change', async function () {

        // Autocompletar profesional y consultorio
        await cargarProfesional();

        // Limpiar fecha y horarios anteriores
        calendario.clear();

        horaInicio.innerHTML =
            '<option value="">Seleccione una fecha</option>';

        horaFin.value = '';

        fechasOcupadas = [];

        if (!servicio.value) {

            mensajeFecha.textContent =
                'Seleccione un servicio para consultar las fechas disponibles.';

            mensajeHora.textContent =
                'Los horarios disponibles aparecerán aquí.';

            return;
        }

        await actualizarFechasOcupadas();

    });

    // AL CAMBIAR LA HORA
    horaInicio.addEventListener('change', function () {
        calcularHoraFin();
    });

    // COMPROBAR CAMPOS ANTES DE GUARDAR
    formulario.addEventListener('submit', function (event) {

        calcularHoraFin();

        if (!servicio.value || !fecha.value ||
            !horaInicio.value || !horaFin.value ||
            !profesional.value || !consultorio.value ||
            !idProfesional.value) {

            event.preventDefault();

            alert('Complete el servicio, profesional, consultorio, fecha y horario.');

            return;
        }

        if (fechasOcupadas.includes(fecha.value)) {

            event.preventDefault();

            alert('Esta fecha ya no tiene horarios disponibles para el servicio seleccionado.');
        }

    });

    // RECUPERAR DATOS SI HUBO ERRORES DE VALIDACIÓN
    async function recuperarDatosAnteriores() {

        if (!servicio.value) {
            return;
        }

        await cargarProfesional();
        await actualizarFechasOcupadas();

        if (fechaAnterior) {
            calendario.setDate(fechaAnterior, true);
        }
    }

    recuperarDatosAnteriores();

});
</script>

@endsection
