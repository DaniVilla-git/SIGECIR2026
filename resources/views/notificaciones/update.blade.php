
@extends('layouts.app')

@section('titulo')
    Editar Notificación
@endsection

@section('content')

<div class="container mx-auto mt-10 px-4">

    <div class="max-w-2xl mx-auto bg-white shadow-xl rounded-2xl border border-gray-200 p-8">

        {{-- ENCABEZADO --}}
        <div class="mb-8 text-center">
            <div class="flex justify-center mb-3">
                <div class="bg-indigo-100 p-4 rounded-full">
                    <svg class="w-8 h-8 text-indigo-600" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </div>
            </div>

            <h2 class="text-3xl font-bold text-gray-800">
                Editar Notificación
            </h2>

            <p class="text-gray-500 mt-2">
                Actualiza la información de la notificación.
            </p>
        </div>

        {{-- FORMULARIO --}}
        <form action="{{ route('notificaciones.update', $notificaciones->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            {{-- TÍTULO --}}
            <div class="mb-5">
                <label for="titulo_notificacion"
                       class="block mb-2 text-sm font-semibold text-gray-700">
                    Título de la notificación
                </label>

                <input type="text"
                       id="titulo_notificacion"
                       name="titulo_notificacion"
                       value="{{ old('titulo_notificacion', $notificaciones->titulo_notificacion) }}"
                       required
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                       placeholder="Ingrese el título">

                @error('titulo_notificacion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- MENSAJE --}}
            <div class="mb-5">
                <label for="mensaje_notificacion"
                       class="block mb-2 text-sm font-semibold text-gray-700">
                    Mensaje de la notificación
                </label>

                <textarea id="mensaje_notificacion"
                          name="mensaje_notificacion"
                          rows="4"
                          required
                          class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                          placeholder="Ingrese el mensaje">{{ old('mensaje_notificacion', $notificaciones->mensaje_notificacion) }}</textarea>

                @error('mensaje_notificacion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- TIPO --}}
            <div class="mb-5">
                <label for="tipo_notificacion"
                       class="block mb-2 text-sm font-semibold text-gray-700">
                    Tipo de notificación
                </label>

                <input type="text"
                       id="tipo_notificacion"
                       name="tipo_notificacion"
                       value="{{ old('tipo_notificacion', $notificaciones->tipo_notificacion) }}"
                       required
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                       placeholder="Ingrese el tipo de notificación">

                @error('tipo_notificacion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- FECHA --}}
            <div class="mb-5">
                <label for="fecha_notificacion"
                       class="block mb-2 text-sm font-semibold text-gray-700">
                    Fecha de notificación
                </label>

                <input type="datetime-local"
                       id="fecha_notificacion"
                       name="fecha_notificacion"
                       value="{{ old('fecha_notificacion', $notificaciones->fecha_notificacion ? \Carbon\Carbon::parse($notificaciones->fecha_notificacion)->format('Y-m-d\TH:i') : '') }}"
                       required
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

                @error('fecha_notificacion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- SELECCIONAR USUARIO --}}
            <div class="mb-7">

                <label for="id_usuario"
                    class="block mb-2 text-sm font-semibold text-gray-700">
                    Seleccionar usuario
                </label>

                @php
                    $usuarioSeleccionado = old('id_usuario') ?: $notificaciones->id_usuario;
                @endphp

                <select id="id_usuario"
                        name="id_usuario"
                        required
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

                    <option value="" disabled
                        {{ !$usuarioSeleccionado ? 'selected' : '' }}>
                        Seleccione un usuario
                    </option>

                    @foreach($usuarios as $usuario)

                        <option value="{{ $usuario->id_usuario }}"
                            {{ $usuarioSeleccionado == $usuario->id_usuario ? 'selected' : '' }}>

                            {{ trim(
                                $usuario->primer_nombre . ' ' .
                                $usuario->segundo_nombre . ' ' .
                                $usuario->primer_apellido . ' ' .
                                $usuario->segundo_apellido
                            ) }}

                        </option>

                    @endforeach

                </select>

                @error('id_usuario')
                    <p class="text-red-500 text-sm mt-1">
                        Debes seleccionar un usuario.
                    </p>
                @enderror

            </div>

            {{-- BOTONES --}}
            <div class="flex flex-col sm:flex-row justify-center gap-4">

                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-7 py-3 rounded-xl shadow-md transition duration-200">
                    Guardar cambios
                </button>

                <a href="{{ route('notificaciones.index') }}"
                   class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-7 py-3 rounded-xl text-center transition duration-200">
                    Cancelar
                </a>

            </div>

        </form>

    </div>

</div>

@endsection
