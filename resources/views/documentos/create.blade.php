```blade
@extends('layouts.app')

@section('titulo')
    Cargar Documento
@endsection

@section('content')
    <div class="container mx-auto mt-10">

        <div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-8">

            <h2 class="text-3xl font-bold text-center mb-6">
                Cargar Documento
            </h2>

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-5">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('documentos.store') }}" method="post" enctype="multipart/form-data">
            @csrf

                <div class="mb-5">
                <label for="id_usuario" class="block mb-2 font-semibold">
                    Usuario
                </label>

                <select name="id_usuario"
                        id="id_usuario"
                        class="w-full border rounded px-3 py-2">

                    <option value="">Seleccione un usuario</option>

                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">
                            {{ $usuario->numero_documento }} -
                            {{ $usuario->primer_nombre }}
                            {{ $usuario->segundo_nombre }}
                            {{ $usuario->primer_apellido }}
                            {{ $usuario->segundo_apellido }}
                        </option>
                    @endforeach

                     </select>
                 </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">
                        Nombre del Documento
                    </label>

                    <input type="text"
                           name="nombre_documento"
                           class="w-full border rounded px-3 py-2"
                           placeholder="Ej: Orden de fisioterapia">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">
                        Tipo de Documento
                    </label>

                    <select name="tipo_documento"
                            class="w-full border rounded px-3 py-2">

                        <option value="">Seleccione un tipo</option>
                        <option value="Orden">Orden</option>
                        <option value="Historia Clínica">Historia Clínica</option>
                        <option value="Documento de identidad">Documento de identidad</option>
                        <option value="Otro">Otro</option>

                    </select>
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">
                        Seleccionar Documento
                    </label>

                    <input type="file"
                           name="ruta_documento"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">
                        Fecha del Documento
                    </label>

                    <input type="date"
                           name="fecha_documento"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">
                        Estado del Documento
                    </label>

                    <select name="estado_documento"
                            class="w-full border rounded px-3 py-2">

                        <option value="Pendiente">Pendiente</option>
                        <option value="Revisado">Revisado</option>
                        <option value="Aprobado">Aprobado</option>

                    </select>
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">
                        Observación
                    </label>

                    <textarea name="observacion_documento"
                              class="w-full border rounded px-3 py-2"
                              rows="4"
                              placeholder="Escriba una observación si es necesario"></textarea>
                </div>

                <div class="mb-5">
                    <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white rounded px-5 py-2">
                        Guardar
                    </button>
                </div>

            </form>

        </div>

    </div>
@endsection
```
