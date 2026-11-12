@extends('profesionales.layouts.appProfesional')

@section('title', 'Notificaciones')

@section('content')

@php
    $totalNotificaciones = $notificaciones->count();

    $totalNoLeidas = $notificaciones->filter(function ($notificacion) {
        return !$notificacion->pivot->leida;
    })->count();

    $totalLeidas = $totalNotificaciones - $totalNoLeidas;

    $tiposNotificacion = $notificaciones
        ->pluck('tipo_notificacion')
        ->unique()
        ->filter();
@endphp

<div class="container mx-auto mt-8 space-y-6 px-4 pb-10">

    {{-- ENCABEZADO --}}
    <header class="overflow-hidden rounded-2xl bg-gradient-to-r from-[#063d69] via-[#0875bd] to-[#20a4a7] px-6 py-7 text-white shadow-xl">
        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
            <div>
                <h1 class="text-2xl font-bold sm:text-3xl">
                    <i class="fa-solid fa-bell mr-2"></i>
                    Notificaciones
                </h1>

                <p class="mt-2 text-sm text-blue-100">
                    Consulta los avisos y novedades de tu actividad profesional.
                </p>
            </div>

            <div class="inline-flex w-fit items-center gap-2 rounded-xl border border-white/20 bg-white/10 px-4 py-3 text-sm text-white shadow-sm">
                <i class="fa-regular fa-calendar"></i>
                {{ now()->locale('es')->translatedFormat('l, d \d\e F \d\e Y') }}
            </div>
        </div>
    </header>

    {{-- RESUMEN --}}
    <section class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3">

        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-lg transition hover:-translate-y-1 hover:shadow-xl">
            <div class="mb-4 flex items-center justify-between">
                <p class="text-sm font-semibold text-slate-500">
                    Total de notificaciones
                </p>

                <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#e6f7fc] text-lg text-[#0875bd]">
                    <i class="fa-solid fa-bell"></i>
                </span>
            </div>

            <h3 class="text-3xl font-bold text-[#063d69]">
                {{ $totalNotificaciones }}
            </h3>

            <p class="mt-1 text-xs text-slate-400">
                Avisos recibidos
            </p>
        </article>

        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-lg transition hover:-translate-y-1 hover:shadow-xl">
            <div class="mb-4 flex items-center justify-between">
                <p class="text-sm font-semibold text-slate-500">
                    No leídas
                </p>

                <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-100 text-lg text-amber-600">
                    <i class="fa-solid fa-envelope"></i>
                </span>
            </div>

            <h3 class="text-3xl font-bold text-slate-800">
                {{ $totalNoLeidas }}
            </h3>

            <p class="mt-1 text-xs text-slate-400">
                Pendientes por consultar
            </p>
        </article>

        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-lg transition hover:-translate-y-1 hover:shadow-xl">
            <div class="mb-4 flex items-center justify-between">
                <p class="text-sm font-semibold text-slate-500">
                    Leídas
                </p>

                <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-lg text-green-600">
                    <i class="fa-solid fa-envelope-open"></i>
                </span>
            </div>

            <h3 class="text-3xl font-bold text-slate-800">
                {{ $totalLeidas }}
            </h3>

            <p class="mt-1 text-xs text-slate-400">
                Notificaciones consultadas
            </p>
        </article>

    </section>

    {{-- CENTRO DE NOTIFICACIONES --}}
    <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl">

        {{-- ENCABEZADO --}}
        <div class="flex flex-col justify-between gap-4 border-b border-slate-200 px-5 py-5 sm:flex-row sm:items-center sm:px-6">

            <div>
                <h2 class="text-lg font-bold text-[#063d69]">
                    <i class="fa-solid fa-inbox mr-2 text-[#0875bd]"></i>
                    Centro de notificaciones
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Revisa los avisos relacionados con tus citas y actividades.
                </p>
            </div>

            <span class="inline-flex w-fit items-center gap-2 rounded-xl bg-[#e6f7fc] px-4 py-3 text-sm font-semibold text-[#0875bd]">
                <i class="fa-solid fa-bell"></i>
                {{ $totalNoLeidas }} pendientes
            </span>

        </div>

        {{-- FILTROS --}}
        <div class="grid grid-cols-1 gap-4 border-b border-slate-200 bg-slate-50 p-5 sm:grid-cols-2">

            <div>
                <label for="filtroTipo" class="mb-2 block text-sm font-semibold text-slate-600">
                    Tipo de notificación
                </label>

                <select
                    id="filtroTipo"
                    class="h-11 w-full rounded-xl border border-slate-200 bg-white px-4 text-sm text-slate-700 outline-none transition focus:border-[#0875bd] focus:ring-2 focus:ring-[#0875bd]/20">

                    <option value="">Todos los tipos</option>

                    @foreach($tiposNotificacion as $tipo)
                        <option value="{{ $tipo }}">
                            {{ $tipo }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div>
                <label for="filtroLectura" class="mb-2 block text-sm font-semibold text-slate-600">
                    Estado de lectura
                </label>

                <select
                    id="filtroLectura"
                    class="h-11 w-full rounded-xl border border-slate-200 bg-white px-4 text-sm text-slate-700 outline-none transition focus:border-[#0875bd] focus:ring-2 focus:ring-[#0875bd]/20">

                    <option value="">Todas las notificaciones</option>
                    <option value="no-leida">No leídas</option>
                    <option value="leida">Leídas</option>

                </select>
            </div>

        </div>

        {{-- LISTA DE NOTIFICACIONES --}}
        <div id="listaNotificaciones" class="divide-y divide-slate-100 px-4 sm:px-6">

            @forelse($notificaciones as $notificacion)

                @php
                    $leida = (bool) $notificacion->pivot->leida;

                    $tipo = strtolower($notificacion->tipo_notificacion);

                    $icono = 'fa-bell';
                    $colorFondo = 'bg-[#e6f7fc]';
                    $colorIcono = 'text-[#0875bd]';

                    if (str_contains($tipo, 'cita')) {
                        $icono = 'fa-calendar-check';
                    } elseif (str_contains($tipo, 'horario')) {
                        $icono = 'fa-clock';
                        $colorFondo = 'bg-blue-100';
                        $colorIcono = 'text-blue-600';
                    } elseif (str_contains($tipo, 'recordatorio')) {
                        $icono = 'fa-bell';
                        $colorFondo = 'bg-amber-100';
                        $colorIcono = 'text-amber-600';
                    } elseif (str_contains($tipo, 'cancel')) {
                        $icono = 'fa-calendar-xmark';
                        $colorFondo = 'bg-red-100';
                        $colorIcono = 'text-red-600';
                    }
                @endphp

                <article
                    class="notificacion -mx-2 flex items-start gap-4 rounded-xl px-3 py-5 transition hover:bg-[#e6f7fc]/60"
                    data-tipo="{{ $notificacion->tipo_notificacion }}"
                    data-lectura="{{ $leida ? 'leida' : 'no-leida' }}">

                    {{-- ICONO --}}
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl {{ $colorFondo }} text-lg {{ $colorIcono }}">
                        <i class="fa-solid {{ $icono }}"></i>
                    </div>

                    {{-- INFORMACIÓN --}}
                    <div class="min-w-0 flex-1">

                        <div class="flex flex-wrap items-center gap-2">

                            <h3 class="font-bold text-slate-700">
                                {{ $notificacion->titulo_notificacion }}
                            </h3>

                            @if(!$leida)
                                <span class="etiqueta-no-leida rounded-full bg-blue-100 px-2.5 py-1 text-[10px] font-bold text-blue-700">
                                    NUEVA
                                </span>
                            @endif

                        </div>

                        <p class="mt-1 whitespace-pre-line text-sm leading-6 text-slate-500">
                            {{ $notificacion->mensaje_notificacion }}
                        </p>

                        <small class="mt-2 block text-xs text-slate-400">
                            {{ \Illuminate\Support\Carbon::parse($notificacion->fecha_notificacion)->locale('es')->translatedFormat('d \d\e F \d\e Y - h:i A') }}
                            · {{ $notificacion->tipo_notificacion }}
                        </small>

                        <button
                            type="button"
                            class="boton-detalles mt-3 inline-flex items-center gap-2 rounded-lg border border-[#cceef8] bg-[#e6f7fc] px-3 py-2 text-xs font-semibold text-[#0860a5] transition hover:bg-[#cceef8]"
                            data-titulo="{{ $notificacion->titulo_notificacion }}"
                            data-mensaje="{{ $notificacion->mensaje_notificacion }}"
                            data-tipo="{{ $notificacion->tipo_notificacion }}"
                            data-fecha="{{ \Illuminate\Support\Carbon::parse($notificacion->fecha_notificacion)->locale('es')->translatedFormat('d \d\e F \d\e Y - h:i A') }}">

                            <i class="fa-solid fa-eye"></i>
                            Ver detalles

                        </button>

                    </div>

                    {{-- INDICADOR --}}
                    <span class="punto mt-2 h-2.5 w-2.5 shrink-0 rounded-full {{ $leida ? 'bg-slate-300' : 'bg-[#009fd4]' }}"></span>

                </article>

            @empty

                <div class="px-4 py-14 text-center">
                    <i class="fa-regular fa-bell-slash text-4xl text-slate-300"></i>

                    <p class="mt-3 font-semibold text-slate-600">
                        No tienes notificaciones.
                    </p>

                    <p class="mt-1 text-sm text-slate-400">
                        Aquí aparecerán los avisos que te envíe la administración.
                    </p>
                </div>

            @endforelse

            {{-- SIN RESULTADOS DE FILTROS --}}
            <div id="sinNotificaciones" class="hidden px-4 py-14 text-center">
                <i class="fa-regular fa-bell-slash text-4xl text-slate-300"></i>

                <p class="mt-3 font-semibold text-slate-600">
                    No hay notificaciones para mostrar.
                </p>

                <p class="mt-1 text-sm text-slate-400">
                    Intenta cambiar los filtros seleccionados.
                </p>
            </div>

        </div>

        <div class="border-t border-slate-200 bg-slate-50 px-5 py-3">
            <p class="text-xs text-slate-500">
                <i class="fa-solid fa-circle-info mr-1 text-[#009fd4]"></i>
                Aquí se muestran las notificaciones enviadas a tu cuenta profesional.
            </p>
        </div>

    </section>

    <footer class="py-3 text-center text-xs text-slate-400">
        SIGECIR2026 · Renueva IPS · Portal de profesionales
    </footer>

</div>

{{-- MODAL DE DETALLES --}}
<div
    id="modalDetalles"
    class="fixed inset-0 z-[100] hidden items-center justify-center bg-slate-900/60 p-4">

    <div class="w-full max-w-lg overflow-hidden rounded-2xl bg-white shadow-2xl">

        <div class="flex items-center justify-between border-b border-slate-200 px-6 py-5">

            <div>
                <h2 id="tituloDetalle" class="text-lg font-bold text-[#063d69]">
                    Detalles de notificación
                </h2>

                <p class="mt-1 text-xs text-slate-400">
                    Información del aviso recibido
                </p>
            </div>

            <button
                type="button"
                id="cerrarModal"
                aria-label="Cerrar ventana"
                class="flex h-9 w-9 items-center justify-center rounded-lg text-xl text-slate-400 transition hover:bg-slate-100 hover:text-slate-700">
                &times;
            </button>

        </div>

        <div id="contenidoDetalle" class="max-h-[60vh] space-y-5 overflow-y-auto px-6 py-6">
        </div>

        <div class="flex justify-end border-t border-slate-200 bg-slate-50 px-6 py-4">

            <button
                type="button"
                id="cerrarBoton"
                class="rounded-xl bg-[#0875bd] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#063d69]">
                Cerrar
            </button>

        </div>

    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const notificaciones = document.querySelectorAll('.notificacion');

    const filtroTipo = document.getElementById('filtroTipo');
    const filtroLectura = document.getElementById('filtroLectura');
    const mensajeVacio = document.getElementById('sinNotificaciones');

    const modal = document.getElementById('modalDetalles');
    const tituloDetalle = document.getElementById('tituloDetalle');
    const contenidoDetalle = document.getElementById('contenidoDetalle');

    // FILTRAR NOTIFICACIONES
    function filtrarNotificaciones() {

        const tipo = filtroTipo.value;
        const lectura = filtroLectura.value;

        let visibles = 0;

        notificaciones.forEach(function (notificacion) {

            const tipoNotificacion = notificacion.dataset.tipo;
            const estadoLectura = notificacion.dataset.lectura;

            const coincideTipo = !tipo || tipoNotificacion === tipo;
            const coincideLectura = !lectura || estadoLectura === lectura;

            if (coincideTipo && coincideLectura) {

                notificacion.classList.remove('hidden');
                notificacion.classList.add('flex');

                visibles++;

            } else {

                notificacion.classList.add('hidden');
                notificacion.classList.remove('flex');

            }

        });

        mensajeVacio.classList.toggle(
            'hidden',
            visibles !== 0 || notificaciones.length === 0
        );
    }

    // ABRIR DETALLES
    function abrirDetalles(boton) {

        tituloDetalle.textContent = boton.dataset.titulo;

        contenidoDetalle.replaceChildren();

        const campos = [
            ['Título', boton.dataset.titulo],
            ['Mensaje', boton.dataset.mensaje],
            ['Tipo de notificación', boton.dataset.tipo],
            ['Fecha de recepción', boton.dataset.fecha]
        ];

        campos.forEach(function (campo) {

            const contenedor = document.createElement('div');
            const etiqueta = document.createElement('p');
            const valor = document.createElement('p');

            contenedor.className = 'border-b border-slate-100 pb-4 last:border-0';

            etiqueta.className = 'mb-1 text-xs font-semibold uppercase tracking-wide text-slate-400';
            etiqueta.textContent = campo[0];

            valor.className = 'whitespace-pre-line text-sm leading-6 text-slate-700';
            valor.textContent = campo[1];

            contenedor.appendChild(etiqueta);
            contenedor.appendChild(valor);

            contenidoDetalle.appendChild(contenedor);

        });

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    // BOTONES VER DETALLES
    document.querySelectorAll('.boton-detalles').forEach(function (boton) {

        boton.addEventListener('click', function () {
            abrirDetalles(this);
        });

    });

    // CERRAR MODAL
    function cerrarModal() {

        modal.classList.add('hidden');
        modal.classList.remove('flex');

    }

    document.getElementById('cerrarModal').addEventListener('click', cerrarModal);

    document.getElementById('cerrarBoton').addEventListener('click', cerrarModal);

    modal.addEventListener('click', function (event) {

        if (event.target === modal) {
            cerrarModal();
        }

    });

    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {
            cerrarModal();
        }

    });

    // EVENTOS DE LOS FILTROS
    filtroTipo.addEventListener('change', filtrarNotificaciones);

    filtroLectura.addEventListener('change', filtrarNotificaciones);

});
</script>
@endpush
