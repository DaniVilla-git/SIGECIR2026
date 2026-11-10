@extends('layouts.app')

@section('titulo')
    Servicios
@endsection

@section('content')

<div class="container mx-auto mt-8 px-4 pb-8">

    <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-xl">

        {{-- ENCABEZADO --}}
        <div class="bg-gradient-to-r from-[#063d69] via-[#0875bd] to-[#20a4a7] px-6 py-7">

            <div class="flex flex-col gap-5 md:flex-row md:items-center md:justify-between">

                <div class="flex items-center gap-4">

                    <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-white/15 text-white shadow-inner">
                        @include('layouts.partials.icons', ['icon' => 'servicios'])
                    </div>

                    <div>
                        <h1 class="text-2xl font-bold text-white md:text-3xl">
                            Listado de Servicios
                        </h1>

                        <p class="mt-1 text-sm text-blue-100">
                            Administra los servicios disponibles en el sistema.
                        </p>
                    </div>

                </div>

                <a href="{{ route('servicios.create') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 font-semibold text-[#0875bd] shadow-lg transition duration-200 hover:-translate-y-0.5 hover:bg-blue-50">

                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>

                    Nuevo Servicio
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
                            Catálogo de servicios
                        </p>
                        <p class="text-sm text-gray-500">
                            Servicios registrados en SIGECIR
                        </p>
                    </div>
                </div>

                <div class="rounded-lg bg-white px-4 py-2 text-center shadow-sm">
                    <p class="text-xs font-medium text-gray-500">
                        Total de servicios
                    </p>
                    <p class="text-xl font-bold text-[#0875bd]">
                        {{ $servicios->count() }}
                    </p>
                </div>

            </div>

            {{-- BUSCADOR --}}
            <div class="mb-6">
                <x-filtros-tabla
                    buscador-id="buscarServicio"
                    placeholder="Buscar por código, nombre, grupo o profesional..."
                    contador-id="contadorServicios"
                    limpiar-id="limpiarFiltrosServicios"
                    :filtros="[]"
                />
            </div>

            {{-- TABLA --}}
            <div class="overflow-x-auto rounded-xl border border-gray-200">

                <table class="min-w-full text-sm text-gray-700">

                    <thead class="bg-[#063d69] text-xs uppercase tracking-wider text-white">

                        <tr>
                            <th class="px-5 py-4 text-center">ID</th>
                            <th class="px-5 py-4 text-center">Código Servicio</th>
                            <th class="px-5 py-4 text-center">Nombre Servicio</th>
                            <th class="px-5 py-4 text-center">Grupo Servicio</th>
                            <th class="px-5 py-4 text-center">Nombre Profesional</th>
                            <th class="px-5 py-4 text-center">Acciones</th>
                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse ($servicios as $servicio)

                            @php
                                $nombreProfesional = $servicio->profesionales
                                    ? $servicio->profesionales->nombre_profesional
                                    : 'Profesional no encontrado';
                            @endphp

                            <tr class="filaServicio text-center transition duration-150 hover:bg-blue-50/70"
                                data-codigo="{{ $servicio->codigo_servicio }}"
                                data-nombre="{{ $servicio->nombre_servicio }}"
                                data-grupo="{{ $servicio->grupo_servicio }}"
                                data-profesional="{{ $nombreProfesional }}">

                                {{-- ID --}}
                                <td class="whitespace-nowrap px-5 py-4 font-semibold text-gray-600">
                                    #{{ $servicio->id }}
                                </td>

                                {{-- CÓDIGO --}}
                                <td class="whitespace-nowrap px-5 py-4">
                                    <span class="inline-flex rounded-lg bg-blue-100 px-3 py-1.5 font-semibold text-[#0875bd]">
                                        {{ $servicio->codigo_servicio }}
                                    </span>
                                </td>

                                {{-- NOMBRE --}}
                                <td class="px-5 py-4 font-semibold text-gray-800">
                                    {{ $servicio->nombre_servicio }}
                                </td>

                                {{-- GRUPO --}}
                                <td class="whitespace-nowrap px-5 py-4">
                                    <span class="inline-flex rounded-lg bg-teal-50 px-3 py-1.5 font-medium text-teal-700">
                                        {{ $servicio->grupo_servicio }}
                                    </span>
                                </td>

                                {{-- PROFESIONAL --}}
                                <td class="px-5 py-4 text-gray-700">
                                    <div class="flex items-center justify-center gap-2">
                                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-50 text-[#0875bd]">
                                            <i class="fa-solid fa-user-doctor"></i>
                                        </span>

                                        {{ $nombreProfesional }}
                                    </div>
                                </td>

                                {{-- ACCIONES --}}
                                <td class="whitespace-nowrap px-5 py-4">

                                    <div class="flex items-center justify-center gap-2">

                                        {{-- EDITAR --}}
                                        <a href="{{ route('servicios.edit', $servicio->id) }}"
                                            class="rounded-lg bg-blue-50 p-2.5 text-blue-600 transition hover:bg-blue-100 hover:text-blue-800"
                                            title="Editar servicio">

                                            @include('layouts.partials.icons', ['icon' => 'editar'])

                                        </a>

                                        {{-- ELIMINAR --}}
                                        <form action="{{ route('servicios.destroy', $servicio->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('¿Estás seguro de eliminar este servicio?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="rounded-lg bg-rose-50 p-2.5 text-rose-600 transition hover:bg-rose-100 hover:text-rose-800"
                                                title="Eliminar servicio">

                                                @include('layouts.partials.icons', ['icon' => 'eliminar'])

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="px-5 py-10 text-center">
                                    <div class="flex flex-col items-center gap-2 text-gray-400">
                                        <i class="fa-solid fa-briefcase text-3xl"></i>
                                        <p class="font-medium text-gray-500">
                                            No hay servicios registrados.
                                        </p>
                                    </div>
                                </td>
                            </tr>

                        @endforelse

                        {{-- SIN RESULTADOS --}}
                        <tr id="sinResultadosServicios" class="hidden">
                            <td colspan="6" class="px-5 py-8 text-center text-gray-500">
                                <i class="fa-solid fa-magnifying-glass mb-2 text-2xl text-gray-400"></i>
                                <p>No se encontraron servicios.</p>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>
        </div>

    </div>

</div>

{{-- JAVASCRIPT: BUSCADOR --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const buscador = document.getElementById('buscarServicio');
        const botonBuscar = document.querySelector('[data-filtros-buscar]');
        const botonLimpiar = document.getElementById('limpiarFiltrosServicios');
        const contador = document.getElementById('contadorServicios');

        const filas = Array.from(document.querySelectorAll('.filaServicio'));

        if (!buscador || !botonBuscar || !botonLimpiar || !contador) {
            console.error('No se encontraron los elementos del buscador de servicios.');
            return;
        }

        function normalizarTexto(texto) {

            return (texto || '')
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .toLowerCase()
                .trim();

        }

        function filtrarServicios() {

            const texto = normalizarTexto(buscador.value);

            let visibles = 0;

            filas.forEach(function (fila) {

                const codigo = normalizarTexto(fila.dataset.codigo);
                const nombre = normalizarTexto(fila.dataset.nombre);
                const grupo = normalizarTexto(fila.dataset.grupo);
                const profesional = normalizarTexto(fila.dataset.profesional);

                const coincide =
                    texto === '' ||
                    codigo.includes(texto) ||
                    nombre.includes(texto) ||
                    grupo.includes(texto) ||
                    profesional.includes(texto);

                fila.classList.toggle('hidden', !coincide);

                if (coincide) {
                    visibles++;
                }

            });

            contador.textContent =
                `Mostrando ${visibles} de ${filas.length} servicios`;

            const mensaje = document.getElementById('sinResultadosServicios');

            if (mensaje) {
                mensaje.classList.toggle('hidden', visibles > 0);
            }

        }

        // BOTÓN BUSCAR
        botonBuscar.addEventListener('click', filtrarServicios);

        // BUSCAR CON ENTER
        buscador.addEventListener('keydown', function (evento) {

            if (evento.key === 'Enter') {
                evento.preventDefault();
                filtrarServicios();
            }

        });

        // LIMPIAR
        botonLimpiar.addEventListener('click', function () {

            buscador.value = '';

            filtrarServicios();

            buscador.focus();

        });

        // INICIALIZAR
        filtrarServicios();

    });
</script>

@endsection