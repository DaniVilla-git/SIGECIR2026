```php
@extends('layouts.app')

@section('titulo')
    Editar Notificacion
@endsection

@section('content')
    <div class="container mx-auto mt-10">

        <div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-8">

            <h2 class="text-3xl font-bold text-center mb-6">
                Editar Notificacion
            </h2>

            <form action="{{ route('notificaciones.update', $notificacion->id)}}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Titulo notificacion</label>
                    <input type="text" name="titulo_notificacion" value="{{ $notificacion->titulo_notificacion}}" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Mensaje notificacion</label>
                    <input type="text" name="mensaje_notificacion" value="{{ $notificacion->mensaje_notificacion}}" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Tipo notificacion</label>
                    <input type="text" name="tipo_notificacion" value="{{ $notificacion->tipo_notificacion}}" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Fecha notificacion</label>
                    <input type="datetime-local" name="fecha_notificacion" value="{{ $notificacion->fecha_notificacion}}" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Id Usuario</label>
                    <input type="text" name="id_usuario" value="{{ $notificacion->id_usuario}}" class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white rounded px-5 py-2">
                        Guardar
                    </button>
                </div>

            </form>

        </div>

    </div>
@endsection
```
