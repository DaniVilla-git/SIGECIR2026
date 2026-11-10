@extends('layouts.app')

@section('title', 'Editar Cita')

@section('content')

@php
    $horaInicial = old('hora_inicio', substr($citas->hora_inicio, 0, 5));
@endphp

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<div class="container mx-auto mt-10 px-4">

    <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">

        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800">
                Editar Cita
            </h2>
            <p class="text-gray-500 mt-1">
                Modifica la información de la cita
            </p>
        </div>

        @if($errors->any())
            <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg mb-6">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('citas.update', $citas->id) }}"
              method="POST"
              id="formCita"
              data-url="{{ route('citas.disponibilidad') }}"
              data-id-cita="{{ $citas->id }}">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- USUARIO --}}
                <div>
                    <label for="id_usuario" class="block text-gray-700 font-semibold mb-2">
                        Usuario
                    </label>

                    <select name="id_usuario" id="id_usuario"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500"
                            required>
                        <option value="">Seleccione un usuario</option>

                        @foreach($usuarios as $usuario)
                            <option value="{{ $usuario->id }}"
                                {{ old('id_usuario', $citas->id_usuario) == $usuario->id ? 'selected' : '' }}>
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
                    <label for="id_profesional" class="block text-gray-700 font-semibold mb-2">
                        Profesional
                    </label>

                    <select name="id_profesional" id="id_profesional"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500"
                            required>
                        <option value="">Seleccione un profesional</option>

                        @foreach($profesionales as $profesional)
                            <option value="{{ $profesional->id }}"
                                {{ old('id_profesional', $citas->id_profesional) == $profesional->id ? 'selected' : '' }}>
                                {{ $profesional->nombre_profesional }}
                                {{ $profesional->apellido_profesional }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- SERVICIO --}}
                <div>
                    <label for="id_servicios" class="block text-gray-700 font-semibold mb-2">
                        Servicio
                    </label>

                    <select name="id_servicios" id="id_servicios"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500"
                            required>
                        <option value="">Seleccione un servicio</option>

                        @foreach($servicios as $servicio)
                            <option value="{{ $servicio->id }}"
                                {{ old('id_servicios', $citas->id_servicios) == $servicio->id ? 'selected' : '' }}>
                                {{ $servicio->nombre_servicio }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- MODALIDAD --}}
                <div>
                    <label for="modalidad_cita" class="block text-gray-700 font-semibold mb-2">
                        Modalidad
                    </label>

                    <select name="modalidad_cita" id="modalidad_cita"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500"
                            required>
                        <option value="Presencial"
                            {{ old('modalidad_cita', $citas->modalidad_cita) == 'Presencial' ? 'selected' : '' }}>
                            Presencial
                        </option>

                        <option value="Virtual"
                            {{ old('modalidad_cita', $citas->modalidad_cita) == 'Virtual' ? 'selected' : '' }}>
                            Virtual
                        </option>
                    </select>
                </div>

                {{-- CONSULTORIO --}}
                <div>
                    <label for="consultorio" class="block text-gray-700 font-semibold mb-2">
                        Consultorio
                    </label>

                    <input type="text" name="consultorio" id="consultorio"
                           value="{{ old('consultorio', $citas->consultorio) }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500"
                           required>
                </div>

                {{-- FECHA --}}
                <div>
                    <label for="fecha_cita" class="block text-gray-700 font-semibold mb-2">
                        Fecha de la cita
                    </label>

                    <input type="text" name="fecha_cita" id="fecha_cita"
                           value="{{ old('fecha_cita', \Carbon\Carbon::parse($citas->fecha_cita)->format('Y-m-d')) }}"
                           placeholder="Seleccione una fecha"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500"
                           required>
                </div>

                {{-- HORA INICIO --}}
                <div>
                    <label for="hora_inicio" class="block text-gray-700 font-semibold mb-2">
                        Hora de inicio
                    </label>

                    <select name="hora_inicio" id="hora_inicio"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500"
                            required>
                        <option value="">Seleccione una hora</option>
                    </select>

                    <p id="mensajeHorarios" class="text-sm text-gray-500 mt-1">
                        Consultando horarios disponibles...
                    </p>
                </div>

                {{-- HORA FIN --}}
                <div>
                    <label for="hora_fin" class="block text-gray-700 font-semibold mb-2">
                        Hora de finalización
                    </label>

                    <input type="time" name="hora_fin" id="hora_fin"
                           value="{{ old('hora_fin', substr($citas->hora_fin, 0, 5)) }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 bg-gray-100"
                           readonly required>
                </div>

                {{-- ESTADO --}}
                <div>
                    <label for="estado_cita" class="block text-gray-700 font-semibold mb-2">
                        Estado
                    </label>

                    <select name="estado_cita" id="estado_cita"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500"
                            required>
                        @foreach(['Pendiente', 'Confirmada', 'Atendida', 'Cancelada', 'Inasistencia'] as $estado)
                            <option value="{{ $estado }}"
                                {{ old('estado_cita', $citas->estado_cita) == $estado ? 'selected' : '' }}>
                                {{ $estado }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- FECHA CREACIÓN --}}
                <div>
                    <label for="fecha_creacion_cita" class="block text-gray-700 font-semibold mb-2">
                        Fecha de creación
                    </label>

                    <input type="date" name="fecha_creacion_cita" id="fecha_creacion_cita"
                           value="{{ old('fecha_creacion_cita', \Carbon\Carbon::parse($citas->fecha_creacion_cita)->format('Y-m-d')) }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500"
                           required>
                </div>

                {{-- OBSERVACIONES --}}
                <div class="md:col-span-2">
                    <label for="observaciones_cita" class="block text-gray-700 font-semibold mb-2">
                        Observaciones
                    </label>

                    <textarea name="observaciones_cita" id="observaciones_cita"
                              rows="4"
                              class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500">{{ old('observaciones_cita', $citas->observaciones_cita) }}</textarea>
                </div>

            </div>

            {{-- BOTONES --}}
            <div class="flex flex-wrap gap-3 mt-8">

                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-lg">
                    Actualizar Cita
                </button>

                <a href="{{ route('citas.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-3 rounded-lg">
                    Cancelar
                </a>

            </div>

        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const formulario = document.getElementById('formCita');
    const servicio = document.getElementById('id_servicios');
    const fecha = document.getElementById('fecha_cita');
    const horaInicio = document.getElementById('hora_inicio');
    const horaFin = document.getElementById('hora_fin');
    const mensaje = document.getElementById('mensajeHorarios');

    const urlDisponibilidad = formulario.dataset.url;
    const idCita = formulario.dataset.idCita;

    const fechaInicial = fecha.value;
    const horaInicial = @json($horaInicial);
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

    function calcularHoraFin(hora) {
        if (!hora) {
            horaFin.value = '';
            return;
        }

        const partes = hora.split(':');
        const minutos = parseInt(partes[0]) * 60 + parseInt(partes[1]) + 30;

        const horasFinales = String(Math.floor(minutos / 60)).padStart(2, '0');
        const minutosFinales = String(minutos % 60).padStart(2, '0');

        horaFin.value = `${horasFinales}:${minutosFinales}`;
    }

    function limpiarHorarios(texto = 'Seleccione un servicio y una fecha.') {
        horaInicio.innerHTML = '<option value="">Seleccione una hora</option>';
        horaFin.value = '';
        mensaje.textContent = texto;
    }

    async function consultarDisponibilidad(mes, fechaSeleccionada = '') {

        const parametros = new URLSearchParams({
            mes: mes,
            id_servicios: servicio.value,
            id_cita: idCita
        });

        if (fechaSeleccionada) {
            parametros.append('fecha', fechaSeleccionada);
        }

        const respuesta = await fetch(urlDisponibilidad + '?' + parametros.toString(), {
            headers: {
                'Accept': 'application/json'
            }
        });

        if (!respuesta.ok) {
            throw new Error('No se pudo consultar la disponibilidad.');
        }

        return await respuesta.json();
    }

    async function cargarFechas(mes) {

        if (!servicio.value) {
            fechasOcupadas = [];
            return;
        }

        try {
            const datos = await consultarDisponibilidad(mes);
            fechasOcupadas = datos.fechas_ocupadas || [];

            calendario.redraw();

        } catch (error) {
            console.error(error);
            mensaje.textContent = 'Error al consultar la disponibilidad.';
        }
    }

    async function cargarHorarios(fechaSeleccionada) {

        if (!servicio.value || !fechaSeleccionada) {
            limpiarHorarios();
            return;
        }

        limpiarHorarios('Consultando horarios disponibles...');

        try {
            const mes = fechaSeleccionada.substring(0, 7);

            const datos = await consultarDisponibilidad(mes, fechaSeleccionada);
            const horasOcupadas = datos.horas_ocupadas || [];

            horaInicio.innerHTML = '<option value="">Seleccione una hora</option>';

            let disponibles = 0;

            horarios.forEach(function (hora) {

                if (!horasOcupadas.includes(hora)) {

                    const opcion = document.createElement('option');
                    opcion.value = hora;
                    opcion.textContent = hora;

                    if (hora === horaInicial && fechaSeleccionada === fechaInicial) {
                        opcion.selected = true;
                    }

                    horaInicio.appendChild(opcion);
                    disponibles++;
                }
            });

            if (disponibles === 0) {
                limpiarHorarios('No hay horarios disponibles para esta fecha.');
            } else {
                mensaje.textContent = 'Seleccione uno de los horarios disponibles.';
                calcularHoraFin(horaInicio.value);
            }

        } catch (error) {
            console.error(error);
            limpiarHorarios('Error al consultar horarios.');
        }
    }

    const calendario = flatpickr(fecha, {
        locale: 'es',
        dateFormat: 'Y-m-d',
        minDate: 'today',

        disable: [
            function(date) {
                const fechaFormato = calendario.formatDate(date, 'Y-m-d');
                return fechasOcupadas.includes(fechaFormato);
            }
        ],

        onMonthChange: function(selectedDates, dateStr, instance) {
            const mes = instance.currentYear + '-' +
                String(instance.currentMonth + 1).padStart(2, '0');

            cargarFechas(mes);
        },

        onChange: function(selectedDates, dateStr) {
            cargarHorarios(dateStr);
        }
    });

    servicio.addEventListener('change', async function() {

        limpiarHorarios();

        if (!servicio.value) {
            fechasOcupadas = [];
            calendario.redraw();
            return;
        }

        const mes = fecha.value
            ? fecha.value.substring(0, 7)
            : new Date().toISOString().substring(0, 7);

        await cargarFechas(mes);

        if (fecha.value) {
            await cargarHorarios(fecha.value);
        }
    });

    horaInicio.addEventListener('change', function() {
        calcularHoraFin(this.value);
    });

    // Cargar la disponibilidad inicial y conservar la cita actual.
    async function iniciar() {

        if (!servicio.value || !fecha.value) {
            limpiarHorarios();
            return;
        }

        await cargarFechas(fecha.value.substring(0, 7));
        await cargarHorarios(fecha.value);

        if (horaInicio.value) {
            calcularHoraFin(horaInicio.value);
        }
    }

    iniciar();

});
</script>

@endsection
