@props([
    'buscadorId' => 'buscarRegistro',
    'placeholder' => 'Buscar...',
    'filtros' => [],
    'contadorId' => 'contadorRegistros',
    'limpiarId' => 'limpiarFiltros',
])

<div class="space-y-5">

    {{-- Buscador y botón de filtros --}}
    <div class="flex flex-col gap-3 sm:flex-row sm:items-end">

        <div class="flex-1">

            <div class="relative">
                <svg
                    class="absolute left-3 top-1/2 h-5 w-5
                        -translate-y-1/2 text-slate-400"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <circle cx="11" cy="11" r="7"
                        stroke-width="2"/>

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="m16 16 4 4"/>
                </svg>

                <input
                    type="text"
                    id="{{ $buscadorId }}"
                    placeholder="{{ $placeholder }}"
                    class="w-full rounded-lg border border-slate-300
                        bg-white py-2.5 pl-10 pr-4 text-sm
                        text-slate-700 placeholder:text-slate-400
                        focus:border-primary-500 focus:outline-none
                        focus:ring-2 focus:ring-primary-100">
            </div>
        </div>

        <button
            type="button"
            data-filtros-boton
            aria-expanded="false"
            class="inline-flex items-center justify-center gap-2
                rounded-lg border border-slate-300 bg-white
                px-4 py-2.5 text-sm font-semibold text-slate-700
                transition hover:bg-slate-50">

            <svg class="h-5 w-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M7 12h10m-7 6h4"/>
            </svg>

            Filtros

            <svg data-filtros-icono
                class="h-4 w-4 transition-transform"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="m6 9 6 6 6-6"/>
            </svg>
        </button>

    </div>

    {{-- Panel de filtros --}}
    <div data-filtros-panel
        class="hidden rounded-xl border border-slate-200
            bg-slate-50 p-4">

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

            @foreach ($filtros as $filtro)

                <div>
                    <label
                        for="{{ $filtro['id'] }}"
                        class="mb-1.5 block text-sm font-medium
                            text-slate-700">

                        {{ $filtro['label'] }}
                    </label>

                    @if (($filtro['tipo'] ?? 'select') === 'date')

                        <input
                            type="date"
                            id="{{ $filtro['id'] }}"
                            class="w-full rounded-lg border border-slate-300
                                bg-white px-3 py-2.5 text-sm text-slate-700
                                focus:border-primary-500 focus:outline-none
                                focus:ring-2 focus:ring-primary-100">

                    @else

                        <select
                            id="{{ $filtro['id'] }}"
                            class="w-full rounded-lg border border-slate-300
                                bg-white px-3 py-2.5 text-sm text-slate-700
                                focus:border-primary-500 focus:outline-none
                                focus:ring-2 focus:ring-primary-100">

                            <option value="">
                                {{ $filtro['todos'] ?? 'Todos' }}
                            </option>

                            @foreach ($filtro['opciones'] ?? [] as $valor => $texto)

                                <option value="{{ $valor }}">
                                    {{ $texto }}
                                </option>

                            @endforeach

                        </select>

                    @endif
                </div>

            @endforeach

        </div>

        <div class="mt-4 flex justify-end">
            <button
                type="button"
                data-filtros-buscar
                class="inline-flex items-center justify-center gap-2
                    rounded-lg bg-slate-800 px-5 py-2.5
                    text-sm font-semibold text-white
                    transition hover:bg-slate-700">

                <svg class="h-4 w-4"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <circle cx="11" cy="11" r="7"
                        stroke-width="2"/>

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="m16 16 4 4"/>
                </svg>

                Buscar
            </button>
        </div>
    </div>
    

    {{-- Contador y botón para limpiar --}}
    <div class="flex flex-col gap-3 sm:flex-row
                sm:items-center sm:justify-between">

        <p id="{{ $contadorId }}"
            class="text-sm text-slate-500"
            aria-live="polite">
            Mostrando registros
        </p>

        <button
            type="button"
            id="{{ $limpiarId }}"
            class="inline-flex items-center justify-center
                rounded-lg border border-slate-300 bg-white
                px-4 py-2 text-sm font-semibold text-slate-600
                transition hover:bg-slate-50">

            Limpiar filtros
        </button>

    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[data-filtros-boton]').forEach(function (boton) {
            boton.addEventListener('click', function () {
                const contenedor = boton.closest('.space-y-5');
                const panel = contenedor.querySelector('[data-filtros-panel]');
                const icono = boton.querySelector('[data-filtros-icono]');

                const abrir = panel.classList.contains('hidden');

                panel.classList.toggle('hidden', !abrir);
                boton.setAttribute('aria-expanded', String(abrir));
                icono.classList.toggle('rotate-180', abrir);
            });
        });
    });
</script>