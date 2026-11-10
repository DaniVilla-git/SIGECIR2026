@extends('layouts.app')

@section('titulo', 'Usuarios')

@section('content')

<div class="container mx-auto mt-8 px-4 pb-10">

    {{-- CONTENEDOR PRINCIPAL --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl">

        {{-- ENCABEZADO --}}
        <div class="relative overflow-hidden bg-gradient-to-r from-[#063d69] via-[#0875bd] to-[#20a4a7] px-6 py-8 md:px-8">

            <div class="absolute -right-10 -top-16 h-52 w-52 rounded-full bg-white/10"></div>
            <div class="absolute -bottom-20 right-40 h-48 w-48 rounded-full bg-white/10"></div>

            <div class="relative flex flex-col justify-between gap-5 md:flex-row md:items-center">

                <div>
                    <div class="mb-3 flex items-center gap-2 text-sm font-medium text-blue-100">
                        @include('layouts.partials.icons', ['icon' => 'usuario'])
                        <span>Gestión de usuarios</span>
                    </div>

                    <h1 class="text-3xl font-extrabold tracking-tight text-white">
                        Listado de Usuarios
                    </h1>

                    <p class="mt-2 max-w-xl text-sm text-blue-100">
                        Administra y consulta la información de los usuarios registrados en SIGECIR.
                    </p>
                </div>

                <a href="{{ route('usuarios.create') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 font-bold text-[#063d69] shadow-lg transition duration-200 hover:-translate-y-1 hover:bg-blue-50">

                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>

                    Nuevo usuario
                </a>

            </div>
        </div>

        <div class="p-5 md:p-8">

            {{-- MENSAJES --}}
            @if(session('success'))
                <div class="mb-5 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-emerald-800">
                    <i class="fa-solid fa-circle-check text-xl"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('actualizar'))
                <div class="mb-5 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-emerald-800">
                    <i class="fa-solid fa-circle-check text-xl"></i>
                    <span>{{ session('actualizar') }}</span>
                </div>
            @endif

            @if(session('eliminar'))
                <div class="mb-5 flex items-center gap-3 rounded-xl border border-rose-200 bg-rose-50 px-5 py-4 text-rose-800">
                    <i class="fa-solid fa-circle-exclamation text-xl"></i>
                    <span>{{ session('eliminar') }}</span>
                </div>
            @endif

            {{-- INFORMACIÓN Y BUSCADOR --}}
            <div class="mb-6 rounded-xl border border-slate-200 bg-slate-50/80 p-4">

                <div class="mb-4 flex flex-wrap items-center justify-between gap-2">
                    <div>
                        <h2 class="font-bold text-slate-800">
                            Usuarios registrados
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Busca usuarios por sus datos personales.
                        </p>
                    </div>

                    <span class="rounded-lg bg-blue-100 px-3 py-1.5 text-xs font-bold text-[#0875bd]">
                        <i class="fa-solid fa-users mr-1"></i>
                        Directorio de usuarios
                    </span>
                </div>

                <x-filtros-tabla
                    buscador-id="buscarUsuario"
                    placeholder="Buscar por documento, nombre, apellido, teléfono o correo..."
                    contador-id="contadorUsuarios"
                    limpiar-id="limpiarFiltrosUsuarios"
                    :filtros="[]"
                />

            </div>

            {{-- TABLA --}}
            <div class="overflow-hidden rounded-xl border border-slate-200">

                <div class="overflow-x-auto">

                    <table class="min-w-full whitespace-nowrap text-sm text-slate-700">

                        <thead class="bg-[#063d69] text-xs uppercase tracking-wider text-white">

                            <tr>
                                <th class="px-5 py-4 text-center">ID</th>
                                <th class="px-5 py-4 text-center">Documento</th>
                                <th class="px-5 py-4 text-center">Primer nombre</th>
                                <th class="px-5 py-4 text-center">Segundo nombre</th>
                                <th class="px-5 py-4 text-center">Primer apellido</th>
                                <th class="px-5 py-4 text-center">Segundo apellido</th>
                                <th class="px-5 py-4 text-center">Teléfono</th>
                                <th class="px-5 py-4 text-center">Correo electrónico</th>
                                <th class="px-5 py-4 text-center">EPS</th>
                                <th class="px-5 py-4 text-center">Régimen</th>
                                <th class="px-5 py-4 text-center">Fecha de registro</th>
                                <th class="px-5 py-4 text-center">Usuario registra</th>
                                <th class="px-5 py-4 text-center">Acciones</th>
                            </tr>

                        </thead>

                        <tbody class="divide-y divide-slate-100 bg-white">

                            @forelse ($usuarios as $usuario)

                                <tr class="filaUsuario text-center transition duration-150 hover:bg-sky-50/70"

                                    data-documento="{{ $usuario->documento_identidad }}"
                                    data-primer-nombre="{{ $usuario->primer_nombre }}"
                                    data-segundo-nombre="{{ $usuario->segundo_nombre }}"
                                    data-primer-apellido="{{ $usuario->primer_apellido }}"
                                    data-segundo-apellido="{{ $usuario->segundo_apellido }}"
                                    data-telefono="{{ $usuario->telefono_usuario }}"
                                    data-correo="{{ $usuario->correo_usuario }}"
                                    data-eps="{{ $usuario->eps_usuario }}"
                                    data-regimen="{{ $usuario->regimen_usuario }}"
                                    data-usuario-registro="{{ $usuario->usuario_registro }}">

                                    {{-- ID --}}
                                    <td class="px-5 py-4 font-semibold text-slate-500">
                                        {{ $usuario->id }}
                                    </td>

                                    {{-- DOCUMENTO --}}
                                    <td class="px-5 py-4 font-bold text-[#063d69]">
                                        {{ $usuario->documento_identidad }}
                                    </td>

                                    {{-- NOMBRES --}}
                                    <td class="px-5 py-4">
                                        {{ $usuario->primer_nombre }}
                                    </td>

                                    <td class="px-5 py-4">
                                        {{ $usuario->segundo_nombre ?: '—' }}
                                    </td>

                                    {{-- APELLIDOS --}}
                                    <td class="px-5 py-4">
                                        {{ $usuario->primer_apellido }}
                                    </td>

                                    <td class="px-5 py-4">
                                        {{ $usuario->segundo_apellido ?: '—' }}
                                    </td>

                                    {{-- TELÉFONO --}}
                                    <td class="px-5 py-4">
                                        {{ $usuario->telefono_usuario }}
                                    </td>

                                    {{-- CORREO --}}
                                    <td class="px-5 py-4 text-slate-600">
                                        {{ $usuario->correo_usuario }}
                                    </td>

                                    {{-- EPS --}}
                                    <td class="px-5 py-4">
                                        {{ $usuario->eps_usuario }}
                                    </td>

                                    {{-- RÉGIMEN --}}
                                    <td class="px-5 py-4">
                                        {{ $usuario->regimen_usuario }}
                                    </td>

                                    {{-- FECHA --}}
                                    <td class="px-5 py-4 text-slate-500">
                                        {{ $usuario->fecha_registro }}
                                    </td>

                                    {{-- USUARIO REGISTRA --}}
                                    <td class="px-5 py-4">
                                        {{ $usuario->usuario_registro }}
                                    </td>

                                    {{-- ACCIONES --}}
                                    <td class="px-5 py-4">

                                        <div class="flex items-center justify-center gap-2">

                                            {{-- EDITAR --}}
                                            <a href="{{ route('usuarios.edit', $usuario->id) }}"
                                                class="rounded-lg bg-blue-50 p-2.5 text-[#0875bd] transition hover:bg-blue-100 hover:text-[#063d69]"
                                                title="Editar usuario">
                                                @include('layouts.partials.icons', ['icon' => 'editar'])
                                            

                                            </a>

                                            {{-- ELIMINAR --}}
                                            <form action="{{ route('usuarios.destroy', $usuario->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="rounded-lg bg-rose-50 p-2.5 text-rose-600 transition hover:bg-rose-100 hover:text-rose-800"
                                                    title="Eliminar usuario">
                                                    @include('layouts.partials.icons', ['icon' => 'eliminar'])

                                                </button>
                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="13" class="px-5 py-10 text-center">
                                        <div class="flex flex-col items-center">
                                            <i class="fa-solid fa-users mb-3 text-3xl text-slate-300"></i>
                                            <p class="font-semibold text-slate-600">
                                                No hay usuarios registrados.
                                            </p>
                                            <p class="mt-1 text-sm text-slate-400">
                                                Los usuarios que registres aparecerán aquí.
                                            </p>
                                        </div>
                                    </td>
                                </tr>

                            @endforelse

                            {{-- SIN RESULTADOS --}}
                            <tr id="sinResultadosUsuarios" class="hidden">
                                <td colspan="13" class="px-5 py-10 text-center">
                                    <i class="fa-solid fa-magnifying-glass mb-3 text-3xl text-slate-300"></i>
                                    <p class="font-semibold text-slate-600">
                                        No se encontraron usuarios.
                                    </p>
                                    <p class="mt-1 text-sm text-slate-400">
                                        Intenta buscar con otros datos.
                                    </p>
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>
            </div>

        </div>
    </div>
</div>

{{-- JAVASCRIPT: BUSCADOR --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const buscador = document.getElementById('buscarUsuario');
        const botonBuscar = document.querySelector('[data-filtros-buscar]');
        const botonLimpiar = document.getElementById('limpiarFiltrosUsuarios');
        const contador = document.getElementById('contadorUsuarios');

        const filas = Array.from(document.querySelectorAll('.filaUsuario'));

        if (!buscador || !botonBuscar || !botonLimpiar || !contador) {
            console.error('No se encontraron los elementos del buscador de usuarios.');
            return;
        }

        function normalizarTexto(texto) {
            return (texto || '')
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .toLowerCase()
                .trim();
        }

        function filtrarUsuarios() {

            const texto = normalizarTexto(buscador.value);
            let visibles = 0;

            filas.forEach(function (fila) {

                const documento = normalizarTexto(fila.dataset.documento);
                const primerNombre = normalizarTexto(fila.dataset.primerNombre);
                const segundoNombre = normalizarTexto(fila.dataset.segundoNombre);
                const primerApellido = normalizarTexto(fila.dataset.primerApellido);
                const segundoApellido = normalizarTexto(fila.dataset.segundoApellido);
                const telefono = normalizarTexto(fila.dataset.telefono);
                const correo = normalizarTexto(fila.dataset.correo);
                const eps = normalizarTexto(fila.dataset.eps);
                const regimen = normalizarTexto(fila.dataset.regimen);
                const usuarioRegistro = normalizarTexto(fila.dataset.usuarioRegistro);

                const coincide =
                    texto === '' ||
                    documento.includes(texto) ||
                    primerNombre.includes(texto) ||
                    segundoNombre.includes(texto) ||
                    primerApellido.includes(texto) ||
                    segundoApellido.includes(texto) ||
                    telefono.includes(texto) ||
                    correo.includes(texto) ||
                    eps.includes(texto) ||
                    regimen.includes(texto) ||
                    usuarioRegistro.includes(texto);

                fila.classList.toggle('hidden', !coincide);

                if (coincide) {
                    visibles++;
                }
            });

            contador.textContent =
                `Mostrando ${visibles} de ${filas.length} usuarios`;

            const mensaje = document.getElementById('sinResultadosUsuarios');

            if (mensaje) {
                mensaje.classList.toggle('hidden', visibles > 0);
            }
        }

        // BOTÓN BUSCAR
        botonBuscar.addEventListener('click', filtrarUsuarios);

        // BUSCAR CON ENTER
        buscador.addEventListener('keydown', function (evento) {
            if (evento.key === 'Enter') {
                evento.preventDefault();
                filtrarUsuarios();
            }
        });

        // LIMPIAR
        botonLimpiar.addEventListener('click', function () {
            buscador.value = '';
            filtrarUsuarios();
            buscador.focus();
        });

        // INICIALIZAR
        filtrarUsuarios();

    });
</script>

@endsection