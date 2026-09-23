@extends('layouts.app')
@section('titulo')
    Profesionales
@endsection

@section('content')
    <div class="container mx-auto mt-10">

        <div class="bg-white shadow-xl rounded-2xl border border-gray-100 p-6">

            <div class="flex justify-between items-center mb-6">

                <h1 class="text-3xl font-bold text-gray-800">
                    Listado de Horario Profesionales
                </h1>

                <p class="text-gray-500 mt-1">
                    Administra los Horarios de profesionales.
                </p>

                <a href="{{ route('horario_profesional.create') }}"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-5 py-3 rounded-xl shadow-md transition">
                    Nuevo Horario
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
                            Dia Semana
                        </th>

                        <th class="border px-4 py-2">
                            Hora Inicio
                        </th>

                        <th class="border px-4 py-2">
                            Hora Fin
                        </th>

                        <th class="border px-4 py-2">
                            Nombre Profesional
                        </th>

                        <th class="border px-4 py-2">
                            Acción
                        </th>
                    </tr>

                </thead>

                <tbody>

                @foreach ($horario_profesional as $horario_profesional)
                    <tr class="text-center hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $horario_profesional->id}}</td>
                        <td class="border px-4 py-2">{{ $horario_profesional->dia_semana}}</td>
                        <td class="border px-4 py-2">{{ $horario_profesional->hora_inicio}}</td>
                        <td class="border px-4 py-2">{{ $horario_profesional->hora_fin}}</td>
                        <td class="border px-4 py-2">{{ $horario_profesional->profesionales->nombre_profesional}}</td>

                        <td class="border px-4 py-2">
                            <div class="flex items-center justify-center gap-3">
                                <a href="{{ route('horario_profesional.edit',$horario_profesional->id) }}"class="text-blue-600 hover:text-blue-900 p-1"title="Editar">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>

                                <!-- Botón Eliminar -->
                                <form action="{{ route('horario_profesional.destroy', $horario_profesional->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este Horario?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="text-red-600 hover:text-red-900 p-1" title="Eliminar">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 01-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
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