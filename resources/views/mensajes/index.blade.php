@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-6">

    <h1 class="text-2xl font-bold mb-6">Mensajes</h1>

    <a href="{{ route('mensajes.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Nuevo Mensaje
    </a>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded mt-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto mt-6">
        <table class="w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Mensaje</th>
                    <th class="border px-4 py-2">Tipo de emisor</th>
                    <th class="border px-4 py-2">Fecha</th>
                    <th class="border px-4 py-2">Cita</th>
                    <th class="border px-4 py-2">Profesional</th>
                    <th class="border px-4 py-2">Usuario</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($mensajes as $mensaje)
                    <tr>
                        <td class="border px-4 py-2">
                            {{ $mensaje->mensaje }}
                        </td>

                        <td class="border px-4 py-2">
                            {{ $mensaje->tipo_emisor }}
                        </td>

                        <td class="border px-4 py-2">
                            {{ $mensaje->fecha_mensaje }}
                        </td>

                        <td class="border px-4 py-2">
                            {{ $mensaje->id_cita }}
                        </td>

                        <td class="border px-4 py-2">
                            {{ $mensaje->profesional->nombre_profesional ?? '' }}
                            {{ $mensaje->profesional->apellido_profesional ?? '' }}
                        </td>

                        <td class="border px-4 py-2">
                            {{ $mensaje->usuario->primer_nombre ?? '' }}
                            {{ $mensaje->usuario->segundo_nombre ?? '' }}
                            {{ $mensaje->usuario->primer_apellido ?? '' }}
                            {{ $mensaje->usuario->segundo_apellido ?? '' }}
                        </td>

                        <td class="border px-4 py-2">

                            <a href="{{ route('mensajes.edit', $mensaje->id) }}"
                               class="bg-yellow-500 text-white px-3 py-1 rounded">
                                Editar
                            </a>

                            <form action="{{ route('mensajes.destroy', $mensaje->id) }}"
                                  method="POST"
                                  class="inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="bg-red-600 text-white px-3 py-1 rounded">
                                    Eliminar
                                </button>
                               
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection