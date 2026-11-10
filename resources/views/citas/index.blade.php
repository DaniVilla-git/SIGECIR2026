@extends('layouts.app')

@section('titulo')
    Citas
@endsection

@section('content')

<div class="container mx-auto mt-8 px-4 pb-8">

    <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-xl">

        {{-- ENCABEZADO --}}
        <div class="bg-gradient-to-r from-[#063d69] via-[#0875bd] to-[#20a4a7] px-6 py-7">

            <div class="flex flex-col gap-5 md:flex-row md:items-center md:justify-between">

                <div class="flex items-center gap-4">

                    <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-white/15 text-white shadow-inner">
                        @include('layouts.partials.icons', ['icon' => 'cita'])
                    </div>

                    <div>
                        <h1 class="text-2xl font-bold text-white md:text-3xl">
                            Listado de Citas
                        </h1>

                        <p class="mt-1 text-sm text-blue-100">
                            Administra y consulta las citas registradas.
                        </p>
                    </div>

                </div>

                <a href="{{ route('citas.create') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 font-semibold text-[#0875bd] shadow-lg transition duration-200 hover:-translate-y-0.5 hover:bg-blue-50">

                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>

                    Nueva Cita
                </a>

            </div>

        </div>

        <div class="p-6">

            {{-- MENSAJES --}}
            @if(session('success'))
                <div class="mb-4 flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-700">
                    <i class="fa-solid fa-circle-check"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('actualizar'))
                <div class="mb-4 flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-700">
                    <i class="fa-solid fa-circle-check"></i>
                    {{ session('actualizar') }}
                </div>
            @endif

            @if(session('eliminar'))
                <div class="mb-4 flex items-center gap-3 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-700">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    {{ session('eliminar') }}
                </div>
            @endif

            {{-- RESUMEN --}}
            <div class="mb-6 flex flex-col gap-3 rounded-xl border border-blue-100 bg-blue-50/70 p-4 sm:flex-row sm:items-center sm:justify-between">

                <div class="flex items-center gap-3">
                    <div>
                        <p class="font-bold text-gray-800">
                            Gestión de citas
                        </p>
                        <p class="text-sm text-gray-500">
                            Consulta y administra las citas del sistema.
                        </p>
                    </div>
                </div>

                <div class="rounded-lg bg-white px-4 py-2 text-center shadow-sm">
                    <p class="text-xs font-medium text-gray-500">
                        Total de citas
                    </p>
                    <p class="text-xl font-bold text-[#0875bd]">
                        {{ $citas->count() }}
                    </p>
                </div>

            </div>

            {{-- BUSCADOR Y FILTROS --}}
            <div class="mb-6">

                <x-filtros-tabla
                    buscador-id="buscarCita"
                    placeholder="Buscar por usuario, profesional o servicio..."
                    contador-id="contadorCitas"
                    limpiar-id="limpiarFiltrosCitas"
                    :filtros="[
                        [
                            'id' => 'filtroEstado',
                            'label' => 'Estado de la cita',
                            'todos' => 'Todos los estados',
                            'opciones' => [
                                'Confirmada' => 'Confirmada',
                                'Pendiente' => 'Pendiente',
                                'En atención' => 'En atención',
                                'Atendida' => 'Atendida',
                                'Cancelada' => 'Cancelada',
                                'No asistió' => 'No asistió',
                            ],
                        ],
                        [
                            'id' => 'filtroFecha',
                            'label' => 'Fecha de la cita',
                            'tipo' => 'date',
                        ],
                    ]"
                />

            </div>

            {{-- TABLA --}}
            <div class="overflow-x-auto rounded-xl border border-gray-200">

                <table class="min-w-full text-sm text-gray-700">

                    <thead class="bg-[#063d69] text-xs uppercase tracking-wider text-white">

                        <tr>
                            <th class="px-5 py-4 text-center">ID</th>
                            <th class="px-5 py-4 text-center">Usuario</th>
                            <th class="px-5 py-4 text-center">Profesional</th>
                            <th class="px-5 py-4 text-center">Servicio</th>
                            <th class="px-5 py-4 text-center">Modalidad</th>
                            <th class="px-5 py-4 text-center">Consultorio</th>
                            <th class="px-5 py-4 text-center">Fecha</th>
                            <th class="px-5 py-4 text-center">Hora inicio</th>
                            <th class="px-5 py-4 text-center">Hora fin</th>
                            <th class="px-5 py-4 text-center">Estado</th>
                            <th class="px-5 py-4 text-center">Observaciones</th>
                            <th class="px-5 py-4 text-center">Fecha creación</th>
                            <th class="px-5 py-4 text-center">Acciones</th>
                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse ($citas as $cita)

                            @php
                                $nombreUsuario = $cita->usuario
                                    ? trim($cita->usuario->primer_nombre . ' ' .
                                        $cita->usuario->segundo_nombre . ' ' .
                                        $cita->usuario->primer_apellido . ' ' .
                                        $cita->usuario->segundo_apellido)
                                    : 'Usuario no encontrado';

                                $nombreProfesional = $cita->profesional
                                    ? trim($cita->profesional->nombre_profesional . ' ' .
                                        $cita->profesional->apellido_profesional)
                                    : 'Profesional no encontrado';

                                $nombreServicio = $cita->servicio
                                    ? $cita->servicio->nombre_servicio
                                    : 'Servicio no encontrado';
                            @endphp

                            <tr class="filaCita text-center transition duration-150 hover:bg-blue-50/70"
                                data-usuario="{{ $nombreUsuario }}"
                                data-profesional="{{ $nombreProfesional }}"
                                data-servicio="{{ $nombreServicio }}"
                                data-estado="{{ $cita->estado_cita }}"
                                data-fecha="{{ $cita->fecha_cita }}">

                                {{-- ID --}}
                                <td class="whitespace-nowrap px-5 py-4 font-semibold text-gray-600">
                                    #{{ $cita->id }}
                                </td>

                                {{-- USUARIO --}}
                                <td class="px-5 py-4 font-semibold text-gray-800">
                                    {{ $nombreUsuario }}
                                </td>

                                {{-- PROFESIONAL --}}
                                <td class="px-5 py-4 text-gray-700">
                                    {{ $nombreProfesional }}
                                </td>

                                {{-- SERVICIO --}}
                                <td class="px-5 py-4 font-medium text-gray-700">
                                    {{ $nombreServicio }}
                                </td>

                                {{-- MODALIDAD --}}
                                <td class="whitespace-nowrap px-5 py-4">
                                    <span class="inline-flex rounded-lg bg-blue-50 px-3 py-1.5 font-medium text-blue-700">
                                        {{ $cita->modalidad_cita }}
                                    </span>
                                </td>

                                {{-- CONSULTORIO --}}
                                <td class="px-5 py-4 text-gray-700">
                                    {{ $cita->consultorio }}
                                </td>

                                {{-- FECHA --}}
                                <td class="whitespace-nowrap px-5 py-4 font-medium text-gray-700">
                                    <div class="flex items-center justify-center gap-2">
                                        <i class="fa-regular fa-calendar text-[#0875bd]"></i>
                                        {{ $cita->fecha_cita }}
                                    </div>
                                </td>

                                {{-- HORA INICIO --}}
                                <td class="whitespace-nowrap px-5 py-4">
                                    <span class="inline-flex rounded-lg bg-blue-100 px-3 py-1.5 font-semibold text-blue-700">
                                        <i class="fa-regular fa-clock mr-1.5 mt-0.5"></i>
                                        {{ $cita->hora_inicio }}
                                    </span>
                                </td>

                                {{-- HORA FIN --}}
                                <td class="whitespace-nowrap px-5 py-4">
                                    <span class="inline-flex rounded-lg bg-teal-50 px-3 py-1.5 font-semibold text-teal-700">
                                        <i class="fa-regular fa-clock mr-1.5 mt-0.5"></i>
                                        {{ $cita->hora_fin }}
                                    </span>
                                </td>

                                {{-- ESTADO --}}
                                <td class="whitespace-nowrap px-5 py-4">

                                    @if($cita->estado_cita == 'Confirmada')

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-green-100 px-3 py-1.5 font-semibold text-green-700">
                                            <i class="fa-solid fa-circle-check text-xs"></i>
                                            {{ $cita->estado_cita }}
                                        </span>

                                    @elseif($cita->estado_cita == 'Pendiente')

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-100 px-3 py-1.5 font-semibold text-amber-700">
                                            <i class="fa-solid fa-clock text-xs"></i>
                                            {{ $cita->estado_cita }}
                                        </span>

                                    @elseif($cita->estado_cita == 'En atención')

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-100 px-3 py-1.5 font-semibold text-blue-700">
                                            <i class="fa-solid fa-stethoscope text-xs"></i>
                                            {{ $cita->estado_cita }}
                                        </span>

                                    @elseif($cita->estado_cita == 'Atendida')

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-3 py-1.5 font-semibold text-emerald-700">
                                            <i class="fa-solid fa-check-double text-xs"></i>
                                            {{ $cita->estado_cita }}
                                        </span>

                                    @elseif($cita->estado_cita == 'Cancelada')

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-red-100 px-3 py-1.5 font-semibold text-red-700">
                                            <i class="fa-solid fa-circle-xmark text-xs"></i>
                                            {{ $cita->estado_cita }}
                                        </span>

                                    @elseif($cita->estado_cita == 'No asistió')

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-rose-100 px-3 py-1.5 font-semibold text-rose-700">
                                            <i class="fa-solid fa-user-xmark text-xs"></i>
                                            {{ $cita->estado_cita }}
                                        </span>

                                    @else

                                        <span class="inline-flex rounded-full bg-gray-100 px-3 py-1.5 font-semibold text-gray-700">
                                            {{ $cita->estado_cita }}
                                        </span>

                                    @endif

                                </td>

                                {{-- OBSERVACIONES --}}
                                <td class="max-w-xs px-5 py-4 text-gray-600">
                                    {{ $cita->observaciones_cita }}
                                </td>

                                {{-- FECHA CREACIÓN --}}
                                <td class="whitespace-nowrap px-5 py-4 text-gray-600">
                                    {{ $cita->fecha_creacion_cita }}
                                </td>

                                {{-- ACCIONES --}}
                                <td class="whitespace-nowrap px-5 py-4">

                                    <div class="flex items-center justify-center gap-2">

                                        {{-- EDITAR --}}
                                        <a href="{{ route('citas.edit', $cita->id) }}"
                                            class="rounded-lg bg-blue-50 p-2.5 text-blue-600 transition hover:bg-blue-100 hover:text-blue-800"
                                            title="Editar cita">

                                            @include('layouts.partials.icons', ['icon' => 'editar'])

                                        </a>

                                        {{-- ELIMINAR --}}
                                        <form action="{{ route('citas.destroy', $cita->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('¿Estás seguro de eliminar esta cita?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="rounded-lg bg-rose-50 p-2.5 text-rose-600 transition hover:bg-rose-100 hover:text-rose-800"
                                                title="Eliminar cita">

                                                @include('layouts.partials.icons', ['icon' => 'eliminar'])

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="13" class="px-5 py-10 text-center">
                                    <div class="flex flex-col items-center gap-2 text-gray-400">
                                        <i class="fa-regular fa-calendar-xmark text-3xl"></i>
                                        <p class="font-medium text-gray-500">
                                            No hay citas registradas.
                                        </p>
                                    </div>
                                </td>
                            </tr>

                        @endforelse

                        {{-- SIN RESULTADOS --}}
                        <tr id="sinResultadosCitas" class="hidden">
                            <td colspan="13" class="px-5 py-8 text-center text-gray-500">
                                <i class="fa-solid fa-magnifying-glass mb-2 text-2xl text-gray-400"></i>
                                <p>No se encontraron citas con los filtros seleccionados.</p>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>
        </div>

    </div>

</div>

{{-- JAVASCRIPT: BUSCADOR Y FILTROS --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const buscador = document.getElementById('buscarCita');
    const filtroEstado = document.getElementById('filtroEstado');
    const filtroFecha = document.getElementById('filtroFecha');
    const botonLimpiar = document.getElementById('limpiarFiltrosCitas');
    const botonBuscar = document.querySelector('[data-filtros-buscar]');
    const contador = document.getElementById('contadorCitas');
    const mensaje = document.getElementById('sinResultadosCitas');

    const filas = Array.from(document.querySelectorAll('.filaCita'));

    function normalizarTexto(texto) {
        return (texto || '')
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .toLowerCase()
            .trim();
    }

    function filtrarCitas() {

        const texto = normalizarTexto(buscador ? buscador.value : '');
        const estado = filtroEstado ? filtroEstado.value : '';
        const fecha = filtroFecha ? filtroFecha.value : '';

        let visibles = 0;

        filas.forEach(function (fila) {

            const usuario = normalizarTexto(fila.dataset.usuario);
            const profesional = normalizarTexto(fila.dataset.profesional);
            const servicio = normalizarTexto(fila.dataset.servicio);

            const coincideTexto =
                texto === '' ||
                usuario.includes(texto) ||
                profesional.includes(texto) ||
                servicio.includes(texto);

            const coincideEstado =
                estado === '' || fila.dataset.estado === estado;

            const coincideFecha =
                fecha === '' || fila.dataset.fecha === fecha;

            const mostrar = coincideTexto && coincideEstado && coincideFecha;

            fila.classList.toggle('hidden', !mostrar);

            if (mostrar) {
                visibles++;
            }

        });

        if (contador) {
            contador.textContent =
                `Mostrando ${visibles} de ${filas.length} citas`;
        }

        if (mensaje) {
            mensaje.classList.toggle('hidden', visibles !== 0);
        }

    }

    // BOTÓN BUSCAR
    if (botonBuscar) {
        botonBuscar.addEventListener('click', filtrarCitas);
    }

    // BUSCAR CON ENTER
    if (buscador) {
        buscador.addEventListener('keydown', function (evento) {

            if (evento.key === 'Enter') {
                evento.preventDefault();
                filtrarCitas();
            }

        });
    }

    // FILTRAR POR ESTADO
    if (filtroEstado) {
        filtroEstado.addEventListener('change', filtrarCitas);
    }

    // FILTRAR POR FECHA
    if (filtroFecha) {
        filtroFecha.addEventListener('change', filtrarCitas);
    }

    // LIMPIAR FILTROS
    if (botonLimpiar) {
        botonLimpiar.addEventListener('click', function () {

            if (buscador) buscador.value = '';
            if (filtroEstado) filtroEstado.value = '';
            if (filtroFecha) filtroFecha.value = '';

            filtrarCitas();

            if (buscador) buscador.focus();

        });
    }

    // INICIALIZAR
    filtrarCitas();

});
</script>

@endsection