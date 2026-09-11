```php
@extends('layouts.app')

@section('titulo')
    Crear Notificacion
@endsection

@section('content')
    <div class="container mx-auto mt-10">

        <div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-8">

            <h2 class="text-3xl font-bold text-center mb-6">
                Nueva notificacion
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

            <form action="{{ route('notificaciones.store') }}" method="post">
                @csrf

                <div class="mb-5">
                    <label class="block mb-2 font-semibold">Titulo notificacion</label>
                    <input type="text" name="titulo_notificacion"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label class="block mb-2 font-semibold">Mensaje notificacion</label>
                    <input type="text" name="mensaje_notificacion"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label class="block mb-2 font-semibold">Tipo notificacion</label>
                    <input type="text" name="tipo_notificacion"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label class="block mb-2 font-semibold">Fecha notificacion</label>
                    <input type="datetime-local" name="fecha_notificacion"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label class="block mb-2 font-semibold">Id Usuario</label>
                    <input type="text" name="id_usuario"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="text-center">
                    <button type="submit"
                            class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                        Guardar notificacion
                    </button>
                </div>

            </form>

        </div>

    </div>
@endsection
```
