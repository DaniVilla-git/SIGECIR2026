@extends('layouts.app')
@section('titulo')
    Servicios
@endsection

@section('content')
    <div class="container mx-auto mt-10">

        <div class="bg-white shadow-lg rounded-lg p-6">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-3xl font-bold text-gray-700">
                    Listado de Servicios
                </h2>

                <a href="{{ route('servicios.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">

                    Nuevo Servicio

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
                            Codigo Servicio
                        </th>

                        <th class="border px-4 py-2">
                            Nombre Servicio
                        </th>

                         <th class="border px-4 py-2">
                            Grupo servicio
                        </th>

                         <th class="border px-4 py-2">
                            Id profesional
                        </th>

                        
                    </tr>

                </thead>

                <tbody>

                @foreach ($servicios as $servicios)
                    <tr class="text-center hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $servicios->id}}</td>
                        <td class="border px-4 py-2">{{ $servicios->codigo_servicio}}</td>
                        <td class="border px-4 py-2">{{ $servicios->nombre_servicio}}</td>
                        <td class="border px-4 py-2">{{ $servicios->grupo_servicio}}</td>
                        <td class="border px-4 py-2">{{ $servicios->id_profesional}}</td>
                        <td class="border px-4 py-2">


                            <a href="{{ ROUTE('servicios.edit',$servicios->id)}}"class="bg-blue-400 hover:bg-blue-600 text-white rounded px-2 py-2">Editar</a>
                            <form action="{{ ROUTE('servicios.destroy',$servicios->id)}}" method="post">
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