@extends('layouts.app')
@section('titulo')
    Profesionales
@endsection

@section('content')
    <div class="container mx-auto mt-10">

        <div class="bg-white shadow-xl rounded-2xl border border-gray-100 p-6">

            <div class="flex justify-between items-center mb-6">

                <h1 class="text-3xl font-bold text-gray-800">
                    Listado de Profesionales
                </h1>

                <p class="text-gray-500 mt-1">
                    Administra los profesionales registrados en el sistema.
                </p>

                <a href="{{ route('profesionales.create') }}"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-5 py-3 rounded-xl shadow-md transition">
                    Nuevo Profesional
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

                <thead class="bg-gray-300">

                    <tr>

                        <th class="border px-4 py-2">
                            ID
                        </th>

                        <th class="border px-4 py-2">
                            Nombre Profesional
                        </th>

                        <th class="border px-4 py-2">
                            Apellido Profesional
                        </th>

                        <th class="border px-4 py-2">
                            Especialidad
                        </th>

                        <th class="border px-4 py-2">
                            Consultorio
                        </th>

                        <th class="border px-4 py-2">
                            Correo
                        </th>

                        <th class="border px-4 py-2">
                            Firma
                        </th>

                        <th class="border px-4 py-2">
                            Accion
                        </th>
                    </tr>

                </thead>

                <tbody>

                @foreach ($profesionales as $profesional)
                    <tr class="hover:bg-indigo-50 transition duration-200">
                        <td class="border px-4 py-2">{{ $profesional->id}}</td>
                        <td class="border px-4 py-2">{{ $profesional->nombre_profesional}}</td>
                        <td class="border px-4 py-2">{{ $profesional->apellido_profesional}}</td>
                        <td class="border px-4 py-2">{{ $profesional->especialidad}}</td>
                        <td class="border px-4 py-2">{{ $profesional->consultorio}}</td>
                        <td class="border px-4 py-2">{{ $profesional->correo}}</td>
                        <td class="border px-4 py-2">{{ $profesional->firma}}</td>
                        <td class="border px-4 py-2">
                            <div class="flex justify-center gap-2">

                                <a href="{{ ROUTE('profesionales.edit',$profesional->id)}}"class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow transition">Editar</a>
                                
                                <form action="{{ ROUTE('profesionales.destroy',$profesional->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow transition">Eliminar</button>                         
                                </form>
                            </div>

                        </td>
                    </tr>
                @endforeach  

                </tbody>
                
            </table>

        </div>

    </div>
@endsection