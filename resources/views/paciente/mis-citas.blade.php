@extends('layouts.paciente')

@section('titulo', 'Mis citas')

@section('content')

<div class="max-w-6xl mx-auto px-4 py-8">

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

                            <tr class="hover:bg-slate-50 transition">

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
                                {{-- DOCUMENTOS ADJUNTOS --}}
                                <tr class="bg-sky-50/50">

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

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @endif

    </div>

    <div class="mt-6">
        <a href="{{ route('paciente.inicio') }}"
           class="text-sky-700 hover:text-sky-900 font-semibold">
            ← Volver al Inicio
        </a>
    </div>

</div>

@endsection
