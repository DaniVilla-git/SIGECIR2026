@extends('layouts.app')

@section('titulo')
    Crear Notificación
@endsection

@section('content')

<div class="container mx-auto mt-10 px-4">

    <div class="max-w-2xl mx-auto bg-white shadow-xl rounded-2xl p-8 border border-gray-100">

        {{-- ENCABEZADO --}}
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">
                <i class="fa-solid fa-bell text-indigo-600 mr-2"></i>
                Nueva Notificación
            </h2>

            <p class="text-gray-500 mt-2">
                Registra una nueva notificación en el sistema
            </p>
        </div>

        {{-- ERRORES --}}
        @if($errors->any())
            <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg mb-6">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORMULARIO --}}
        <form action="{{ route('notificaciones.store') }}" method="POST">

            @csrf

            {{-- TÍTULO --}}
            <div class="mb-5">
                <label for="titulo_notificacion"
                       class="block text-gray-700 font-semibold mb-2">
                    Título de la notificación
                </label>

                <input
                    type="text"
                    name="titulo_notificacion"
                    id="titulo_notificacion"
                    value="{{ old('titulo_notificacion') }}"
                    placeholder="Ingrese el título de la notificación"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    required>
            </div>

            {{-- MENSAJE --}}
            <div class="mb-5">
                <label for="mensaje_notificacion"
                       class="block text-gray-700 font-semibold mb-2">
                    Mensaje de la notificación
                </label>

                <textarea
                    name="mensaje_notificacion"
                    id="mensaje_notificacion"
                    rows="4"
                    placeholder="Escriba el mensaje de la notificación"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    required>{{ old('mensaje_notificacion') }}</textarea>
            </div>

            {{-- TIPO --}}
            <div class="mb-5">
                <label for="tipo_notificacion"
                       class="block text-gray-700 font-semibold mb-2">
                    Tipo de notificación
                </label>

                <input
                    type="text"
                    name="tipo_notificacion"
                    id="tipo_notificacion"
                    value="{{ old('tipo_notificacion') }}"
                    placeholder="Ej. Información, recordatorio o alerta"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    required>
            </div>

            {{-- FECHA --}}
            <div class="mb-5">
                <label for="fecha_notificacion"
                       class="block text-gray-700 font-semibold mb-2">
                    Fecha de la notificación
                </label>

                <input
                    type="datetime-local"
                    name="fecha_notificacion"
                    id="fecha_notificacion"
                    value="{{ old('fecha_notificacion') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    required>
            </div>

            {{-- TIPO DE DESTINATARIO --}}
            <div class="mb-5">
                <label for="destinatario_tipo"
                       class="block text-gray-700 font-semibold mb-2">
                    Enviar notificación a
                </label>

                <select
                    name="destinatario_tipo"
                    id="destinatario_tipo"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    required>

                    <option value="usuario"
                        {{ old('destinatario_tipo', 'usuario') == 'usuario' ? 'selected' : '' }}>
                        Usuario
                    </option>

                    <option value="profesional"
                        {{ old('destinatario_tipo') == 'profesional' ? 'selected' : '' }}>
                        Profesional
                    </option>

                </select>
            </div>

            {{-- SELECCIONAR USUARIO --}}
            <div class="mb-8" id="contenedorUsuario">

                <label for="id_usuario"
                       class="block text-gray-700 font-semibold mb-2">
                    Seleccionar usuario
                </label>

                <select
                    name="id_usuario"
                    id="id_usuario"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

                    <option value="">Seleccione un usuario</option>

                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}"
                            {{ old('id_usuario') == $usuario->id ? 'selected' : '' }}>
                            {{ $usuario->primer_nombre }} {{ $usuario->primer_apellido }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- SELECCIONAR PROFESIONAL --}}
            <div class="mb-8 hidden" id="contenedorProfesional">

                <label for="id_profesional"
                       class="block text-gray-700 font-semibold mb-2">
                    Seleccionar profesional
                </label>

                <select
                    name="id_profesional"
                    id="id_profesional"
                    disabled
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

                    <option value="">Seleccione un profesional</option>

                    @foreach($profesionales as $profesional)
                        <option value="{{ $profesional->id }}"
                            {{ old('id_profesional') == $profesional->id ? 'selected' : '' }}>
                            {{ $profesional->nombre_profesional }}
                            {{ $profesional->apellido_profesional }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- BOTONES --}}
            <div class="flex flex-wrap justify-center gap-3">

                <button
                    type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-lg shadow transition duration-200">

                    <i class="fa-solid fa-paper-plane mr-2"></i>
                    Guardar Notificación
                </button>

                <a
                    href="{{ route('notificaciones.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-3 rounded-lg transition duration-200">

                    Cancelar
                </a>

            </div>

        </form>

    </div>

</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const tipoDestinatario = document.getElementById('destinatario_tipo');

    const contenedorUsuario = document.getElementById('contenedorUsuario');
    const contenedorProfesional = document.getElementById('contenedorProfesional');

    const selectUsuario = document.getElementById('id_usuario');
    const selectProfesional = document.getElementById('id_profesional');

    function cambiarDestinatario() {

        if (tipoDestinatario.value === 'profesional') {

            contenedorUsuario.classList.add('hidden');
            contenedorProfesional.classList.remove('hidden');

            selectUsuario.disabled = true;
            selectUsuario.required = false;

            selectProfesional.disabled = false;
            selectProfesional.required = true;

        } else {

            contenedorProfesional.classList.add('hidden');
            contenedorUsuario.classList.remove('hidden');

            selectProfesional.disabled = true;
            selectProfesional.required = false;

            selectUsuario.disabled = false;
            selectUsuario.required = true;
        }
    }

    tipoDestinatario.addEventListener('change', cambiarDestinatario);

    cambiarDestinatario();

});
</script>
@endpush
