@extends('layouts.app')
@section('titulo')
    Notificacion
@endsection

@section('content')
    <div class="container mx-auto mt-10">

        <div class="bg-white shadow-lg rounded-lg p-6">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-3xl font-bold text-gray-700">
                    Registrar notificacion
                </h2>

                <a href="{{ route('notificaciones.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">

                    Nueva notificacion

                </a>

            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">

                    {{ session('success') }}
                </div>
            @endif

             @if(session('actualizar'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">

                    {{ session('actualizar') }}
                </div>
            @endif

            @if(session('eliminar'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">

                    {{ session('eliminar') }}
                </div>
            @endif

            <table class="min-w-full border border-gray-300">

                <thead class="bg-gray-200">

                    <tr>

                        <th class="border px-4 py-2">
                            ID
                        </th>

                        <th class="border px-4 py-2">
                            Titulo notificacion
                        </th>

                        <th class="border px-4 py-2">
                            Mensaje notificacion
                        </th>

                         <th class="border px-4 py-2">
                            Tipo notificacion
                        </th>

                         <th class="border px-4 py-2">
                            Fecha notificacion
                        </th>

                        <th class="border px-4 py-2">
                            Id Usuario
                        </th>

                        
                    </tr>

                </thead>

                <tbody>

                @foreach ($notificaciones as $notificaciones)
                    <tr class="text-center hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $notificaciones->id}}</td>
                        <td class="border px-4 py-2">{{ $notificaciones->titulo_notificacion}}</td>
                        <td class="border px-4 py-2">{{ $notificaciones->mensaje_notificacion}}</td>
                        <td class="border px-4 py-2">{{ $notificaciones->tipo_notificacion}}</td>
                        <td class="border px-4 py-2">{{ $notificaciones->fecha_notificacion}}</td>
                        <td class="border px-4 py-2">{{ $notificaciones->id_usuario}}</td>
                        
                        <td class="border px-4 py-2">


                            <a href="{{ ROUTE('notificaciones.edit',$notificaciones->id)}}"class="bg-blue-400 hover:bg-blue-600 text-white rounded px-2 py-2">Editar</a>
                            <form action="{{ ROUTE('notificaciones.destroy',$notificaciones->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-400 hover:bg-red-600 text-white rounded px-2 py-2">Eliminar</button>                         
                            </form>

                        </td>
                    </tr>
                @endforeach  

                </tbody>
                
            </table>

        </div>

    </div>
@endsection