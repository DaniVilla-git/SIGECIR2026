@extends('layouts.app')
@section('titulo')
    Usuario
@endsection

@section('content')
    <div class="container mx-auto mt-10">

        <div class="bg-white shadow-lg rounded-lg p-6">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-3xl font-bold text-gray-700">
                    Listado de Usuarios
                </h2>

                <a href="{{ route('usuarios.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">

                    Nuevo usuario

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
                            Primer Nombre
                        </th>

                        <th class="border px-4 py-2">
                            Segundo Nombre
                        </th>

                         <th class="border px-4 py-2">
                            Primer Apellido
                        </th>

                         <th class="border px-4 py-2">
                            Segundo Apellido
                        </th>

                        <th class="border px-4 py-2">
                            Telefono
                        </th>

                        <th class="border px-4 py-2">
                            Correo electronico
                        </th>

                         <th class="border px-4 py-2">
                            EPS
                        </th>

                         <th class="border px-4 py-2">
                            Regimen
                        </th>

                         <th class="border px-4 py-2">
                            Fecha Registro
                        </th>

                         <th class="border px-4 py-2">
                            Usuario Registra 
                        </th>

                    </tr>

                </thead>

                <tbody>

                @foreach ($usuarios as $usuarios)
                    <tr class="text-center hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $usuarios->id}}</td>
                        <td class="border px-4 py-2">{{ $usuarios->primer_nombre}}</td>
                        <td class="border px-4 py-2">{{ $usuarios->segundo_nombre}}</td>
                        <td class="border px-4 py-2">{{ $usuarios->primer_apellido}}</td>
                        <td class="border px-4 py-2">{{ $usuarios->segundo_apellido}}</td>
                        <td class="border px-4 py-2">{{ $usuarios->telefono_usuario}}</td>
                        <td class="border px-4 py-2">{{ $usuarios->correo_usuario}}</td>
                        <td class="border px-4 py-2">{{ $usuarios->eps_usuario}}</td>
                        <td class="border px-4 py-2">{{ $usuarios->regimen_usuario}}</td>
                        <td class="border px-4 py-2">{{ $usuarios->fecha_registro}}</td>
                        <td class="border px-4 py-2">{{ $usuarios->usuario_registro}}</td>
                        <td class="border px-4 py-2">


                            <a href="{{ ROUTE('usuarios.edit',$usuarios->id)}}"class="bg-blue-400 hover:bg-blue-600 text-white rounded px-2 py-2">Editar</a>
                            <form action="{{ ROUTE('usuarios.destroy',$usuarios->id)}}" method="post">
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