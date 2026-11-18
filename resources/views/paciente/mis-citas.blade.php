@extends('layouts.paciente')

@section('titulo', 'Mis citas')

@section('content')

<div class="max-w-6xl mx-auto px-4 py-8">

    {{-- BOTÓN VOLVER AL INICIO --}}
    <div class="mb-5">
        <a href="{{ route('paciente.inicio') }}"
           class="inline-flex items-center gap-2 text-sky-700 hover:text-sky-900 font-semibold transition">

            <i class="fa-solid fa-arrow-left"></i>
            Volver al Inicio

        </a>
    </div>

    {{-- ENCABEZADO --}}
    <div class="bg-gradient-to-r from-sky-800 to-cyan-600 rounded-3xl p-8 text-white shadow-xl mb-8">

        <h1 class="text-3xl font-extrabold mb-2">
            Mis citas médicas
        </h1>

        <p class="text-cyan-50">
            Consulta las solicitudes y el estado de tus citas en RENUEVA IPS.
        </p>

    </div>

    {{-- MENSAJE DE ÉXITO --}}
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl p-4 mb-6">
            {{ session('success') }}
        </div>
    @endif

    {{-- LISTADO --}}
    <div class="bg-white rounded-3xl shadow-xl border border-slate-200 overflow-hidden">

        <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row justify-between gap-4">

            <div>
                <h2 class="text-xl font-bold text-slate-800">
                    Historial de solicitudes
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Aquí puedes consultar tus citas registradas.
                </p>
            </div>

            <a href="{{ route('paciente.crear-cita') }}"
               class="bg-sky-700 hover:bg-sky-800 text-white font-semibold px-5 py-3 rounded-xl text-center transition">

                + Solicitar cita

            </a>

        </div>
        {{-- FILTRO DE CITAS --}}
        <div class="px-6 py-5 border-b border-slate-100 bg-slate-50">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

                <div>
                    <h3 class="font-bold text-slate-700">
                        Filtrar mis citas
                    </h3>

                    <p class="text-sm text-slate-500">
                        Selecciona un estado para consultar tus solicitudes.
                    </p>
                </div>

                <div class="w-full sm:w-64">

                    <select id="filtroEstado"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-100">

                        <option value="todos">Todos los estados</option>
                        <option value="pendiente">Pendiente</option>
                        <option value="confirmada">Confirmada</option>
                        <option value="atendida">Atendida</option>
                        <option value="cancelada">Cancelada</option>
                        <option value="en atención">En atención</option>
                        <option value="inasistencia">No asistió</option>

                    </select>

                </div>

            </div>

            <p id="mensajeSinResultados"
            class="hidden mt-4 rounded-lg bg-amber-50 border border-amber-200 p-3 text-sm text-amber-700">

                No se encontraron citas con el estado seleccionado.

            </p>

        </div>


        @if($citas->isEmpty())

            <div class="text-center py-16 px-6">

                <div class="text-5xl mb-4">📅</div>

                <h3 class="text-xl font-bold text-slate-700">
                    Todavía no tienes citas registradas
                </h3>

                <p class="text-slate-500 mt-2 mb-6">
                    Cuando solicites una cita, aparecerá aquí.
                </p>

                <a href="{{ route('paciente.crear-cita') }}"
                   class="inline-block bg-cyan-600 hover:bg-cyan-700 text-white font-semibold px-6 py-3 rounded-xl">

                    Solicitar mi primera cita

                </a>

            </div>

        @else

            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left">

                    <thead class="bg-slate-50 text-slate-600 uppercase text-xs">

                        <tr>
                            <th class="px-6 py-4">Servicio</th>
                            <th class="px-6 py-4">Profesional</th>
                            <th class="px-6 py-4">Fecha</th>
                            <th class="px-6 py-4">Horario</th>
                            <th class="px-6 py-4">Modalidad</th>
                            <th class="px-6 py-4">Estado</th>
                        </tr>

                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @foreach($citas as $cita)

                            {{-- INFORMACIÓN DE LA CITA --}}
                            <tr class="fila-cita hover:bg-slate-50 transition"
                                data-estado="{{ mb_strtolower(trim($cita->estado_cita)) }}">

                                <td class="px-6 py-4 font-semibold text-slate-800">
                                    {{ $cita->servicio->nombre_servicio ?? 'No disponible' }}
                                </td>

                                <td class="px-6 py-4 text-slate-600">
                                    {{ $cita->profesional->nombre_profesional ?? '' }}
                                    {{ $cita->profesional->apellido_profesional ?? '' }}
                                </td>

                                <td class="px-6 py-4 text-slate-600">
                                    {{ \Carbon\Carbon::parse($cita->fecha_cita)->format('d/m/Y') }}
                                </td>

                                <td class="px-6 py-4 text-slate-600">
                                    {{ substr($cita->hora_inicio, 0, 5) }}
                                    -
                                    {{ substr($cita->hora_fin, 0, 5) }}
                                </td>

                                <td class="px-6 py-4 text-slate-600">
                                    {{ $cita->modalidad_cita }}
                                </td>

                                <td class="px-6 py-4">

                                    @php
                                        $color = match($cita->estado_cita) {
                                            'Pendiente' => 'bg-yellow-100 text-yellow-800',
                                            'Confirmada' => 'bg-green-100 text-green-800',
                                            'Atendida' => 'bg-blue-100 text-blue-800',
                                            'Cancelada' => 'bg-red-100 text-red-800',
                                            default => 'bg-slate-100 text-slate-700'
                                        };
                                    @endphp

                                    <span class="px-3 py-1 rounded-full text-xs font-bold {{ $color }}">
                                        {{ $cita->estado_cita }}
                                    </span>

                                </td>

                            </tr>

                            {{-- DOCUMENTOS ADJUNTOS --}}
                            <tr class="fila-documentos bg-sky-50/50"
                                data-estado="{{ mb_strtolower(trim($cita->estado_cita)) }}">

                                <td colspan="6" class="px-6 py-5">

                                    <div class="flex items-center gap-2 mb-3">

                                        <i class="fas fa-file-medical text-sky-700 text-lg"></i>

                                        <h3 class="font-bold text-slate-700">
                                            Documentos adjuntos
                                        </h3>

                                    </div>

                                    @if($cita->documentos->isNotEmpty())

                                        <div class="flex flex-wrap gap-3">

                                            @foreach($cita->documentos as $documento)

                                                <div class="bg-white border border-slate-200 rounded-xl p-4 flex items-center gap-3 shadow-sm">

                                                    <div class="bg-cyan-100 text-cyan-700 rounded-lg p-3">
                                                        @include('layouts.partials.icons', ['icon' => 'verdocumento'])
                                                    </div>

                                                    <div>

                                                        <p class="font-semibold text-slate-800">
                                                            {{ $documento->nombre_documento }}
                                                        </p>

                                                        <p class="text-xs text-slate-500">
                                                            {{ $documento->tipo_documento }}
                                                        </p>

                                                        <a href="{{ route('paciente.documentos.ver', $documento->id) }}"
                                                           target="_blank"
                                                           class="inline-flex items-center gap-2 mt-2 text-sky-700 hover:text-sky-900 font-semibold text-sm">

                                                            @include('layouts.partials.icons', ['icon' => 'eye'])
                                                            Visualizar documento

                                                        </a>

                                                    </div>

                                                </div>

                                            @endforeach

                                        </div>

                                    @else

                                        <p class="text-sm text-slate-500">
                                            Esta cita no tiene documentos adjuntos.
                                        </p>

                                    @endif

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @endif

    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const filtro = document.getElementById('filtroEstado');
    const filasCitas = document.querySelectorAll('.fila-cita');
    const mensaje = document.getElementById('mensajeSinResultados');

    if (!filtro) return;

    filtro.addEventListener('change', function () {

        const estadoSeleccionado = this.value.toLowerCase();
        let citasVisibles = 0;

        filasCitas.forEach(function (fila) {

            const estado = fila.dataset.estado;
            const filaDocumentos = fila.nextElementSibling;

            const mostrar =
                estadoSeleccionado === 'todos' ||
                estado === estadoSeleccionado;

            fila.style.display = mostrar ? '' : 'none';

            if (filaDocumentos &&
                filaDocumentos.classList.contains('fila-documentos')) {

                filaDocumentos.style.display = mostrar ? '' : 'none';
            }

            if (mostrar) {
                citasVisibles++;
            }

        });

        mensaje.classList.toggle('hidden', citasVisibles > 0);

    });

});
</script>

@endsection