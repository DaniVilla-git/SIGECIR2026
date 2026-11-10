
@extends('layouts.paciente')

@section('titulo', 'Solicitar Cita')

@section('content')

<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<style>
    .campo-cita {
        width: 100%;
        border: 1px solid #dbe4ee;
        border-radius: 12px;
        padding: 13px 15px;
        background: #fff;
        outline: none;
        transition: all .2s;
    }

    .campo-cita:focus {
        border-color: #0891b2;
        box-shadow: 0 0 0 3px rgba(8,145,178,.12);
    }

    .campo-cita:disabled,
    .campo-cita[readonly] {
        background: #f1f5f9;
        color: #475569;
        cursor: not-allowed;
    }

    .etiqueta-cita {
        display: block;
        font-size: 14px;
        font-weight: 700;
        color: #334155;
        margin-bottom: 8px;
    }

    .icono-campo {
        display: inline-flex;
        width: 38px;
        height: 38px;
        align-items: center;
        justify-content: center;
        border-radius: 11px;
        background: #ecfeff;
        color: #0e7490;
        margin-right: 10px;
    }

    .flatpickr-calendar {
        border-radius: 14px !important;
        box-shadow: 0 10px 30px rgba(15,23,42,.15) !important;
    }
</style>

<div class="max-w-6xl mx-auto px-4 py-8">

    {{-- ENCABEZADO --}}
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-sky-800 via-cyan-700 to-teal-500 p-8 md:p-10 mb-8 shadow-xl">

        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">

            <div class="text-white">

                <span class="inline-flex items-center gap-2 bg-white/15 px-4 py-2 rounded-full text-sm mb-4">
                    <span>✚</span>
                    
                </span>

                <h1 class="text-3xl md:text-4xl font-extrabold mb-3">
                    Solicita tu cita médica
                </h1>

                <p class="text-cyan-50 text-base md:text-lg max-w-xl">
                    Agenda tu atención médica de manera fácil y rápida.
                    Selecciona el servicio y consulta los horarios disponibles.
                </p>

            </div>

            <div class="hidden md:flex bg-white/15 rounded-2xl p-6">
                <img src="{{ asset('images/LogoSIGECIR.png') }}"
                     alt="RENUEVA IPS"
                     class="w-28 h-28 object-contain">
            </div>

        </div>

        <div class="absolute -right-12 -bottom-24 w-72 h-72 bg-white/10 rounded-full"></div>
        <div class="absolute right-44 -top-24 w-48 h-48 bg-white/10 rounded-full"></div>

    </div>

    {{-- MENSAJE INFORMATIVO --}}
    <div class="bg-cyan-50 border border-cyan-100 rounded-2xl p-5 mb-7 flex gap-4">

        <div class="text-cyan-700 text-2xl">ℹ</div>

        <div>
            <h3 class="font-bold text-cyan-900">
                Información importante
            </h3>

            <p class="text-sm text-cyan-800 mt-1">
                Tu solicitud quedará en estado pendiente hasta que sea revisada
                por el personal de RENUEVA IPS.
            </p>
        </div>

    </div>

    {{-- ERRORES --}}
    @if($errors->any())

        <div class="bg-red-50 border border-red-200 text-red-700 rounded-2xl p-5 mb-7">

            <h3 class="font-bold mb-2">
                No se pudo registrar la solicitud
            </h3>

            <ul class="list-disc list-inside text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif

    {{-- FORMULARIO --}}
    <form action="{{ route('paciente.guardar-cita') }}"
          method="POST"
          enctype="multipart/form-data"
          id="formCita"
          data-url="{{ route('paciente.citas.disponibilidad') }}"
          data-profesional-url="{{ route('paciente.servicio.profesional', ['id' => '__ID__']) }}">

        @csrf

        <div class="bg-white rounded-3xl border border-slate-200 shadow-xl overflow-hidden">

            {{-- TITULO DEL FORMULARIO --}}
            <div class="px-6 md:px-9 py-7 border-b border-slate-100">

                <div class="flex items-center gap-3">

                    <div class="bg-sky-100 text-sky-700 p-3 rounded-xl text-2xl">
                        ✚
                    </div>

                    <div>
                        <h2 class="text-xl md:text-2xl font-bold text-slate-800">
                            Datos de tu cita
                        </h2>

                        <p class="text-sm text-slate-500 mt-1">
                            Completa la información para solicitar tu atención.
                        </p>
                    </div>

                </div>

            </div>

            <div class="p-6 md:p-9">

                {{-- SECCION SERVICIO --}}
                <div class="mb-9">

                    <h3 class="text-lg font-bold text-slate-800 mb-5 flex items-center">
                        <span class="icono-campo">01</span>
                        Servicio y profesional
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- SERVICIO --}}
                        <div class="md:col-span-2">

                            <label for="id_servicios" class="etiqueta-cita">
                                Selecciona el servicio que necesitas
                            </label>

                            <select name="id_servicios"
                                    id="id_servicios"
                                    class="campo-cita"
                                    required>

                                <option value="">Selecciona un servicio</option>

                                @foreach($servicios as $servicio)
                                    <option value="{{ $servicio->id }}"
                                        {{ old('id_servicios') == $servicio->id ? 'selected' : '' }}>
                                        {{ $servicio->nombre_servicio }}
                                    </option>
                                @endforeach

                            </select>

                            <p class="text-xs text-slate-500 mt-2">
                                Al seleccionar el servicio, se asignará automáticamente el profesional correspondiente.
                            </p>

                        </div>

                        {{-- PROFESIONAL --}}
                        <div>

                            <label for="profesional" class="etiqueta-cita">
                                Profesional asignado
                            </label>

                            <input type="text"
                                   id="profesional"
                                   class="campo-cita"
                                   placeholder="Se completará automáticamente"
                                   readonly>

                        </div>

                        {{-- CONSULTORIO --}}
                        <div>

                            <label for="consultorio" class="etiqueta-cita">
                                Consultorio
                            </label>

                            <input type="text"
                                   id="consultorio"
                                   class="campo-cita"
                                   placeholder="Se completará automáticamente"
                                   readonly>

                        </div>

                        {{-- MODALIDAD --}}
                        <div class="md:col-span-2">

                            <label for="modalidad_cita" class="etiqueta-cita">
                                Modalidad de atención
                            </label>

                            <select name="modalidad_cita"
                                    id="modalidad_cita"
                                    class="campo-cita"
                                    required>

                                <option value="">Selecciona la modalidad</option>

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

                    </div>

                </div>

                <div class="border-t border-slate-100 my-8"></div>

                {{-- SECCION FECHA Y HORA --}}
                <div class="mb-9">

                    <h3 class="text-lg font-bold text-slate-800 mb-5 flex items-center">
                        <span class="icono-campo">02</span>
                        Fecha y horario
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- FECHA --}}
                        <div>

                            <label for="fecha_cita" class="etiqueta-cita">
                                Fecha de la cita
                            </label>

                            <input type="text"
                                   name="fecha_cita"
                                   id="fecha_cita"
                                   value="{{ old('fecha_cita') }}"
                                   placeholder="Selecciona primero un servicio"
                                   autocomplete="off"
                                   class="campo-cita"
                                   required>

                            <p id="mensajeFecha" class="text-xs text-slate-500 mt-2">
                                Selecciona un servicio para consultar las fechas disponibles.
                            </p>

                        </div>

                        {{-- HORA --}}
                        <div>

                            <label for="hora_inicio" class="etiqueta-cita">
                                Hora disponible
                            </label>

                            <select name="hora_inicio"
                                    id="hora_inicio"
                                    class="campo-cita"
                                    required>

                                <option value="">Selecciona servicio y fecha</option>

                            </select>

                            <p id="mensajeHora" class="text-xs text-slate-500 mt-2">
                                Aquí aparecerán los horarios disponibles.
                            </p>

                        </div>

                    </div>

                    <div class="mt-5 bg-slate-50 border border-slate-200 rounded-xl p-4 flex items-center gap-3">

                        <div class="bg-white rounded-lg p-3 text-sky-700">
                            ⏱
                        </div>

                        <div>
                            <p class="font-semibold text-slate-700 text-sm">
                                Duración de la atención
                            </p>

                            <p class="text-xs text-slate-500">
                                Cada cita tiene una duración de 30 minutos.
                            </p>
                        </div>

                    </div>

                </div>

                <div class="border-t border-slate-100 my-8"></div>

                {{-- OBSERVACIONES --}}
                <div>

                    <h3 class="text-lg font-bold text-slate-800 mb-5 flex items-center">
                        <span class="icono-campo">03</span>
                        Información adicional
                    </h3>

                    <label for="observaciones_cita" class="etiqueta-cita">
                        Observaciones (opcional)
                    </label>

                    <textarea name="observaciones_cita"
                              id="observaciones_cita"
                              rows="4"
                              maxlength="2000"
                              placeholder="Escribe alguna información que consideres importante para tu solicitud..."
                              class="campo-cita resize-none">{{ old('observaciones_cita') }}</textarea>

                </div>
                {{-- ORDEN MÉDICA OPCIONAL --}}
                <div class="mt-6">

                    <label for="orden_medica" class="etiqueta-cita">
                        Orden médica
                        <span class="text-slate-400 font-normal">(Opcional)</span>
                    </label>

                    <div class="border-2 border-dashed border-cyan-200 bg-cyan-50 rounded-2xl p-6 text-center">

                        <div class="text-4xl mb-3">📄</div>

                        <p class="font-bold text-slate-700">
                            Adjunta tu orden médica
                        </p>

                        <p class="text-sm text-slate-500 mt-1 mb-4">
                            Puedes cargar archivos PDF, JPG, JPEG o PNG.
                            Máximo 10 MB.
                        </p>

                        <input type="file"
                            name="orden_medica"
                            id="orden_medica"
                            accept=".pdf,.jpg,.jpeg,.png"
                            class="campo-cita">

                        <p id="nombreArchivo" class="text-sm text-cyan-700 mt-3"></p>

                    </div>

                </div>

                {{-- RESUMEN --}}
                <div class="mt-8 bg-sky-50 border border-sky-100 rounded-2xl p-5">

                    <div class="flex items-center gap-3 mb-2">

                        <span class="text-xl">📋</span>

                        <h3 class="font-bold text-sky-900">
                            Ten en cuenta
                        </h3>

                    </div>

                    <p class="text-sm text-sky-800 leading-relaxed">
                        Al enviar esta solicitud, la cita quedará registrada como
                        <strong>Pendiente</strong>. Recibirás la información correspondiente
                        cuando sea revisada por RENUEVA IPS.
                    </p>

                </div>

                {{-- BOTONES --}}
                <div class="flex flex-col sm:flex-row justify-between gap-4 mt-9">

                    <a href="{{ route('paciente.inicio') }}"
                       class="inline-flex justify-center items-center gap-2 border border-slate-300 text-slate-600 hover:bg-slate-100 font-semibold px-7 py-3 rounded-xl transition">

                        ← Volver al Inicio

                    </a>

                    <button type="submit"
                            id="btnGuardar"
                            class="inline-flex justify-center items-center gap-2 bg-gradient-to-r from-sky-700 to-cyan-600 hover:from-sky-800 hover:to-cyan-700 text-white font-bold px-8 py-3 rounded-xl shadow-lg hover:shadow-xl transition">

                        ✓ Solicitar mi cita

                    </button>

                </div>

            </div>

        </div>

    </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const formulario = document.getElementById('formCita');

    const servicio = document.getElementById('id_servicios');
    const profesional = document.getElementById('profesional');
    const consultorio = document.getElementById('consultorio');

    const fecha = document.getElementById('fecha_cita');
    const horaInicio = document.getElementById('hora_inicio');

    const mensajeFecha = document.getElementById('mensajeFecha');
    const mensajeHora = document.getElementById('mensajeHora');

    const urlDisponibilidad = formulario.dataset.url;
    const urlProfesional = formulario.dataset.profesionalUrl;

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
    let consultaActual = 0;

    const fechaAnterior = @json(old('fecha_cita'));
    const horaAnterior = @json(old('hora_inicio'));

    // AUTOCOMPLETAR PROFESIONAL Y CONSULTORIO
    async function cargarProfesional() {

        const numeroConsulta = ++consultaActual;

        profesional.value = '';
        consultorio.value = '';

        if (!servicio.value) {
            return;
        }

        profesional.value = 'Consultando...';
        consultorio.value = 'Consultando...';

        try {

            const url = urlProfesional.replace('__ID__', servicio.value);

            const respuesta = await fetch(url, {
                headers: {
                    'Accept': 'application/json'
                }
            });

            if (!respuesta.ok) {
                throw new Error('No fue posible consultar el profesional.');
            }

            const datos = await respuesta.json();

            if (numeroConsulta !== consultaActual) {
                return;
            }

            profesional.value = datos.profesional || '';
            consultorio.value = datos.consultorio || '';

            if (!datos.profesional) {

                profesional.value = 'Sin profesional asignado';
                consultorio.value = 'No disponible';

                alert('El servicio seleccionado no tiene un profesional asignado.');
            }

        } catch (error) {

            if (numeroConsulta !== consultaActual) {
                return;
            }

            profesional.value = '';
            consultorio.value = '';

            alert(error.message);
        }
    }

    // CONSULTAR DISPONIBILIDAD
    async function consultarDisponibilidad(mes, fechaSeleccionada = '') {

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

    // ACTUALIZAR FECHAS OCUPADAS
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

                return fechaFormateada < fechaMinima ||
                    fechasOcupadas.includes(fechaFormateada);
            }
        ]);

        mensajeFecha.textContent =
            'Selecciona un día que tenga disponibilidad.';

        mensajeFecha.classList.remove('text-red-600');
    }

    // FECHA ACTUAL
    const hoy = new Date();
    const fechaMinima =
        hoy.getFullYear() + '-' +
        String(hoy.getMonth() + 1).padStart(2, '0') + '-' +
        String(hoy.getDate()).padStart(2, '0');

    // CONSULTAR HORARIOS
    async function actualizarHorarios() {

        horaInicio.innerHTML = '';
        horaInicio.disabled = true;

        if (!servicio.value || !fecha.value) {

            horaInicio.innerHTML =
                '<option value="">Selecciona servicio y fecha</option>';

            mensajeHora.textContent =
                'Selecciona un servicio y una fecha.';

            return;
        }

        const mes = fecha.value.substring(0, 7);

        horaInicio.innerHTML =
            '<option value="">Consultando horarios...</option>';

        const datos = await consultarDisponibilidad(mes, fecha.value);

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
            '<option value="">Selecciona una hora</option>';

        disponibles.forEach(function (hora) {

            const opcion = document.createElement('option');

            opcion.value = hora;
            opcion.textContent = hora;

            if (hora === horaAnterior) {
                opcion.selected = true;
            }

            horaInicio.appendChild(opcion);
        });

        horaInicio.disabled = disponibles.length === 0;

        if (disponibles.length === 0) {

            horaInicio.innerHTML =
                '<option value="">No hay horarios disponibles</option>';

            mensajeHora.textContent =
                'No hay horarios disponibles para esta fecha.';

        } else {

            mensajeHora.textContent =
                'Hay ' + disponibles.length +
                ' horarios disponibles.';

        }
    }

    // CONFIGURAR CALENDARIO
    calendario = flatpickr(fecha, {

        locale: 'es',

        dateFormat: 'Y-m-d',

        minDate: 'today',

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

    // CAMBIAR SERVICIO
    servicio.addEventListener('change', async function () {

        await cargarProfesional();

        calendario.clear();

        horaInicio.innerHTML =
            '<option value="">Selecciona una fecha</option>';

        horaInicio.disabled = true;

        fechasOcupadas = [];

        if (!servicio.value) {

            mensajeFecha.textContent =
                'Selecciona un servicio para consultar las fechas disponibles.';

            mensajeHora.textContent =
                'Aquí aparecerán los horarios disponibles.';

            return;
        }

        await actualizarFechasOcupadas();
    });

    // VALIDAR ANTES DE ENVIAR
    formulario.addEventListener('submit', function (event) {

        if (!servicio.value ||
            !profesional.value ||
            !consultorio.value ||
            !fecha.value ||
            !horaInicio.value) {

            event.preventDefault();

            alert('Completa el servicio, profesional, consultorio, fecha y horario.');

            return;
        }

        if (fechasOcupadas.includes(fecha.value)) {

            event.preventDefault();

            alert('La fecha seleccionada ya no tiene disponibilidad.');
        }

    });

    // RECUPERAR DATOS ANTERIORES
    async function recuperarDatos() {

        if (!servicio.value) {
            return;
        }

        await cargarProfesional();
        await actualizarFechasOcupadas();

        if (fechaAnterior) {
            calendario.setDate(fechaAnterior, true);
        }
    }

    recuperarDatos();

});
</script>

@endsection
