@extends('profesionales.layouts.appProfesional')

@section('title', 'Mis pacientes')

@section('content')

<div class="container mx-auto mt-8 px-4 pb-10">

    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl">

        {{-- ENCABEZADO --}}
        <div class="relative overflow-hidden bg-gradient-to-r from-[#063d69] via-[#0875bd] to-[#20a4a7] px-6 py-8 md:px-8">

            <div class="absolute -right-10 -top-16 h-52 w-52 rounded-full bg-white/10"></div>
            <div class="absolute -bottom-20 right-40 h-48 w-48 rounded-full bg-white/10"></div>

            <div class="relative flex flex-col justify-between gap-5 md:flex-row md:items-center">

                <div>
                    <div class="mb-3 flex items-center gap-2 text-sm font-medium text-blue-100">
                        <i class="fa-solid fa-users"></i>
                        <span>Gestión de pacientes</span>
                    </div>

                    <h1 class="text-3xl font-extrabold tracking-tight text-white">
                        Mis pacientes
                    </h1>

                    <p class="mt-2 max-w-xl text-sm text-blue-100">
                        Consulta la información de tus pacientes y revisa sus documentos médicos adjuntos.
                    </p>
                </div>

                <div class="inline-flex w-fit items-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-bold text-[#063d69] shadow-lg">
                    <i class="fa-regular fa-calendar text-[#0875bd]"></i>
                    {{ now()->locale('es')->translatedFormat('l, d \d\e F \d\e Y') }}
                </div>

            </div>
        </div>

        <div class="p-5 md:p-8">

            {{-- BIENVENIDA --}}
            <section class="mb-7 rounded-xl border border-blue-100 bg-gradient-to-r from-blue-50 to-white p-5 md:p-6">

                <div class="flex items-start gap-4">

                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white text-xl text-[#0875bd] shadow-sm">
                        <i class="fa-solid fa-users"></i>
                    </div>

                    <div>
                        <h2 class="text-lg font-bold text-[#063d69]">
                            Directorio de pacientes
                        </h2>

                        <p class="mt-2 max-w-3xl text-sm leading-6 text-slate-600">
                            Desde este espacio puedes consultar los datos básicos de tus pacientes,
                            los servicios relacionados con su atención y las órdenes médicas adjuntadas.
                        </p>
                    </div>

                </div>

            </section>

            {{-- ESTADÍSTICAS --}}
            <section class="mb-7 grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3">

                <article class="rounded-xl border border-slate-200 bg-slate-50/80 p-5 transition duration-200 hover:-translate-y-1 hover:shadow-md">

                    <div class="mb-4 flex items-center justify-between">
                        <p class="text-sm font-semibold text-slate-500">
                            Total de pacientes
                        </p>

                        <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-100 text-lg text-[#0875bd]">
                            <i class="fa-solid fa-users"></i>
                        </span>
                    </div>

                    <h3 id="totalPacientes" class="text-3xl font-extrabold text-[#063d69]">
                        {{ $citas->pluck('id_usuario')->unique()->count() }}
                    </h3>

                    <p class="mt-1 text-xs text-slate-400">
                        Pacientes con citas asignadas
                    </p>

                </article>

                <article class="rounded-xl border border-slate-200 bg-slate-50/80 p-5 transition duration-200 hover:-translate-y-1 hover:shadow-md">

                    <div class="mb-4 flex items-center justify-between">
                        <p class="text-sm font-semibold text-slate-500">
                            Pacientes activos
                        </p>

                        <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-green-100 text-lg text-green-600">
                            <i class="fa-solid fa-user-check"></i>
                        </span>
                    </div>

                    <h3 id="pacientesActivos" class="text-3xl font-extrabold text-slate-800">
                        0
                    </h3>

                    <p class="mt-1 text-xs text-slate-400">
                        Con citas confirmadas o en atención
                    </p>

                </article>

                <article class="rounded-xl border border-slate-200 bg-slate-50/80 p-5 transition duration-200 hover:-translate-y-1 hover:shadow-md">

                    <div class="mb-4 flex items-center justify-between">
                        <p class="text-sm font-semibold text-slate-500">
                            Pacientes inactivos
                        </p>

                        <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-100 text-lg text-amber-600">
                            <i class="fa-solid fa-user-clock"></i>
                        </span>
                    </div>

                    <h3 id="pacientesInactivos" class="text-3xl font-extrabold text-slate-800">
                        0
                    </h3>

                    <p class="mt-1 text-xs text-slate-400">
                        Sin citas activas
                    </p>

                </article>

            </section>

            {{-- LISTADO DE PACIENTES --}}
            <section class="overflow-hidden rounded-xl border border-slate-200">

                <div class="border-b border-slate-200 bg-white px-5 py-5 md:px-6">

                    <div class="flex flex-wrap items-center justify-between gap-3">

                        <div>
                            <h2 class="text-lg font-bold text-[#063d69]">
                                Listado de pacientes
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                Información de los pacientes asignados al profesional.
                            </p>
                        </div>

                        <span class="rounded-lg bg-blue-100 px-3 py-1.5 text-xs font-bold text-[#0875bd]">
                            <i class="fa-solid fa-address-book mr-1"></i>
                            Directorio de pacientes
                        </span>

                    </div>

                </div>

                {{-- BUSCADOR Y FILTROS --}}
                <div class="grid grid-cols-1 gap-4 border-b border-slate-200 bg-slate-50/80 p-5 md:grid-cols-2 xl:grid-cols-3">

                    <div>
                        <label for="buscarPaciente" class="mb-2 block text-sm font-semibold text-slate-600">
                            Buscar paciente
                        </label>

                        <div class="relative">
                            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>

                            <input
                                type="text"
                                id="buscarPaciente"
                                placeholder="Buscar por nombre o documento..."
                                class="h-11 w-full rounded-xl border border-slate-200 bg-white pl-10 pr-4 text-sm text-slate-700 outline-none transition focus:border-[#009fd4] focus:ring-2 focus:ring-[#009fd4]/20">
                        </div>
                    </div>

                    <div>
                        <label for="filtroServicio" class="mb-2 block text-sm font-semibold text-slate-600">
                            Filtrar por servicio
                        </label>

                        <select
                            id="filtroServicio"
                            class="h-11 w-full rounded-xl border border-slate-200 bg-white px-4 text-sm text-slate-700 outline-none transition focus:border-[#009fd4] focus:ring-2 focus:ring-[#009fd4]/20">

                            <option value="">Todos los servicios</option>
                            <option value="fonoaudiología">Fonoaudiología</option>
                            <option value="psicología">Psicología</option>
                            <option value="fisioterapia">Fisioterapia</option>
                            <option value="terapia ocupacional">Terapia ocupacional</option>

                        </select>
                    </div>

                    <div>
                        <label for="filtroEstado" class="mb-2 block text-sm font-semibold text-slate-600">
                            Filtrar por estado
                        </label>

                        <select
                            id="filtroEstado"
                            class="h-11 w-full rounded-xl border border-slate-200 bg-white px-4 text-sm text-slate-700 outline-none transition focus:border-[#009fd4] focus:ring-2 focus:ring-[#009fd4]/20">

                            <option value="">Todos los estados</option>
                            <option value="confirmada">Confirmada</option>
                            <option value="pendiente">Pendiente</option>
                            <option value="en atención">En atención</option>
                            <option value="atendida">Atendida</option>
                            <option value="cancelada">Cancelada</option>
                            <option value="no asistió">No asistió</option>

                        </select>
                    </div>

                </div>

                {{-- TABLA --}}
                <div class="overflow-x-auto">

                    <table id="tablaPacientes" class="min-w-full whitespace-nowrap text-left text-sm text-slate-700">

                        <thead class="bg-[#063d69] text-xs uppercase tracking-wider text-white">
                            <tr>
                                <th class="px-5 py-4 text-center">Nombre</th>
                                <th class="px-5 py-4 text-center">Documento</th>
                                <th class="px-5 py-4 text-center">Teléfono</th>
                                <th class="px-5 py-4 text-center">Servicio</th>
                                <th class="px-5 py-4 text-center">Estado</th>
                                <th class="px-5 py-4 text-center">Documento adjunto</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100 bg-white">

                            @forelse($citas as $cita)

                                @php
                                    $paciente = $cita->usuario;

                                    $nombreUsuario = trim(
                                        ($paciente->primer_nombre ?? '') . ' ' .
                                        ($paciente->segundo_nombre ?? '') . ' ' .
                                        ($paciente->primer_apellido ?? '') . ' ' .
                                        ($paciente->segundo_apellido ?? '')
                                    );

                                    $nombreServicio = $cita->servicio?->nombre_servicio ?? 'Sin servicio';

                                    $estado = mb_strtolower(trim($cita->estado_cita ?? ''));

                                    $servicioNormalizado = mb_strtolower(trim($nombreServicio));
                                @endphp

                                <tr
                                    class="filaUsuario text-center transition duration-150 hover:bg-sky-50/70"
                                    data-documento="{{ $paciente->documento_identidad ?? '' }}"
                                    data-paciente="{{ $cita->id_usuario }}"
                                    data-servicio="{{ $servicioNormalizado }}"
                                    data-estado="{{ $estado }}">

                                    {{-- NOMBRE --}}
                                    <td class="px-5 py-4 font-semibold text-[#063d69]">
                                        {{ $nombreUsuario ?: 'Sin nombre' }}
                                    </td>

                                    {{-- DOCUMENTO --}}
                                    <td class="px-5 py-4 font-bold text-[#063d69]">
                                        {{ $paciente->documento_identidad ?? 'Sin documento' }}
                                    </td>

                                    {{-- TELÉFONO --}}
                                    <td class="px-5 py-4 text-slate-600">
                                        {{ $paciente->telefono_usuario ?? 'Sin teléfono' }}
                                    </td>

                                    {{-- SERVICIO --}}
                                    <td class="px-5 py-4 font-medium text-slate-700">
                                        {{ $nombreServicio }}
                                    </td>

                                    {{-- ESTADO --}}
                                    <td class="whitespace-nowrap px-5 py-4">

                                        @if($estado == 'confirmada')

                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-green-100 px-3 py-1.5 font-semibold text-green-700">
                                                <i class="fa-solid fa-circle-check text-xs"></i>
                                                Confirmada
                                            </span>

                                        @elseif($estado == 'pendiente')

                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-100 px-3 py-1.5 font-semibold text-amber-700">
                                                <i class="fa-solid fa-clock text-xs"></i>
                                                Pendiente
                                            </span>

                                        @elseif($estado == 'en atención')

                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-100 px-3 py-1.5 font-semibold text-blue-700">
                                                <i class="fa-solid fa-stethoscope text-xs"></i>
                                                {{ $cita->estado_cita }}
                                            </span>

                                        @elseif($estado == 'atendida')

                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-3 py-1.5 font-semibold text-emerald-700">
                                                <i class="fa-solid fa-check-double text-xs"></i>
                                                {{ $cita->estado_cita }}
                                            </span>

                                        @elseif($estado == 'cancelada')

                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-red-100 px-3 py-1.5 font-semibold text-red-700">
                                                <i class="fa-solid fa-circle-xmark text-xs"></i>
                                                {{ $cita->estado_cita }}
                                            </span>

                                        @elseif($estado == 'no asistió')

                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-rose-100 px-3 py-1.5 font-semibold text-rose-700">
                                                <i class="fa-solid fa-user-xmark text-xs"></i>
                                                {{ $cita->estado_cita }}
                                            </span>

                                        @else

                                            <span class="inline-flex rounded-full bg-gray-100 px-3 py-1.5 font-semibold text-gray-700">
                                                {{ $cita->estado_cita ?? 'Sin estado' }}
                                            </span>

                                        @endif

                                    </td>

                                    {{-- DOCUMENTO ADJUNTO --}}
                                    <td class="px-5 py-4 text-center">

                                        @forelse($cita->documentos as $documento)

                                            <a
                                                href="{{ route('documento', $documento->id) }}"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                class="inline-flex items-center gap-2 rounded-lg bg-cyan-100 px-3 py-2 text-xs font-bold text-cyan-800 transition hover:bg-cyan-200">

                                                <i class="fa-solid fa-file-pdf"></i>
                                                Ver orden médica

                                            </a>

                                        @empty

                                            <span class="inline-flex items-center gap-2 rounded-lg bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-500">
                                                <i class="fa-solid fa-file-circle-xmark"></i>
                                                Sin documento
                                            </span>

                                        @endforelse

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center">

                                        <i class="fa-solid fa-folder-open mb-3 text-3xl text-slate-300"></i>

                                        <p class="font-semibold text-slate-600">
                                            No hay pacientes asignados
                                        </p>

                                        <p class="mt-1 text-sm text-slate-400">
                                            Los pacientes aparecerán aquí cuando tengan citas asignadas a tu usuario profesional.
                                        </p>

                                    </td>
                                </tr>

                            @endforelse

                            {{-- SIN RESULTADOS --}}
                            @if($citas->isNotEmpty())

                                <tr id="mensajeSinResultados" class="hidden">
                                    <td colspan="6" class="px-6 py-12 text-center">

                                        <i class="fa-solid fa-folder-open mb-3 text-3xl text-slate-300"></i>

                                        <p class="font-semibold text-slate-600">
                                            No se encontraron pacientes
                                        </p>

                                        <p class="mt-1 text-sm text-slate-400">
                                            Intenta cambiar los criterios de búsqueda.
                                        </p>

                                    </td>
                                </tr>

                            @endif

                        </tbody>

                    </table>

                </div>

                {{-- PIE DE TABLA --}}
                <div class="border-t border-slate-100 bg-slate-50 px-5 py-3">
                    <p class="text-xs text-slate-500">
                        <i class="fa-solid fa-circle-info mr-1 text-[#009fd4]"></i>
                        Información obtenida de los usuarios registrados, sus citas y documentos adjuntos.
                    </p>
                </div>

            </section>

            <footer class="pt-6 text-center text-xs text-slate-400">
                SIGECIR2026 · Renueva IPS · Portal de profesionales
            </footer>

        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    const buscarPaciente = document.getElementById('buscarPaciente');
    const filtroServicio = document.getElementById('filtroServicio');
    const filtroEstado = document.getElementById('filtroEstado');

    const filas = document.querySelectorAll(
        '#tablaPacientes tbody tr.filaUsuario'
    );

    const mensajeSinResultados = document.getElementById(
        'mensajeSinResultados'
    );

    const totalPacientes = document.getElementById('totalPacientes');
    const pacientesActivos = document.getElementById('pacientesActivos');
    const pacientesInactivos = document.getElementById('pacientesInactivos');

    function filtrarPacientes() {

        const texto = buscarPaciente.value.toLowerCase().trim();
        const servicio = filtroServicio.value.toLowerCase().trim();
        const estado = filtroEstado.value.toLowerCase().trim();

        const pacientes = new Map();

        let visibles = 0;

        filas.forEach(function (fila) {

            const contenido = fila.innerText.toLowerCase();
            const servicioFila = fila.dataset.servicio.toLowerCase();
            const estadoFila = fila.dataset.estado.toLowerCase();

            const coincideTexto = contenido.includes(texto);
            const coincideServicio = !servicio || servicioFila === servicio;
            const coincideEstado = !estado || estadoFila === estado;

            if (coincideTexto && coincideServicio && coincideEstado) {

                fila.style.display = '';
                visibles++;

                const idPaciente = fila.dataset.paciente;

                if (!pacientes.has(idPaciente)) {
                    pacientes.set(idPaciente, false);
                }

                if (['confirmada', 'en atención'].includes(estadoFila)) {
                    pacientes.set(idPaciente, true);
                }

            } else {

                fila.style.display = 'none';

            }

        });

        let activos = 0;
        let inactivos = 0;

        pacientes.forEach(function (tieneCitaActiva) {

            if (tieneCitaActiva) {
                activos++;
            } else {
                inactivos++;
            }

        });

        totalPacientes.textContent = pacientes.size;
        pacientesActivos.textContent = activos;
        pacientesInactivos.textContent = inactivos;

        if (mensajeSinResultados) {
            mensajeSinResultados.classList.toggle('hidden', visibles !== 0);
        }

    }

    buscarPaciente.addEventListener('input', filtrarPacientes);
    filtroServicio.addEventListener('change', filtrarPacientes);
    filtroEstado.addEventListener('change', filtrarPacientes);

    filtrarPacientes();

});
</script>

@endpush
