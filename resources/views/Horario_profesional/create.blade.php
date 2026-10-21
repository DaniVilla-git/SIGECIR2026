@extends('layouts.app')
@section('titulo')
    Crear Profesional
@endsection

@section('content')
    <div class="container mx-auto mt-10">

        <div class="max-w-2xl mx-auto bg-white shadow-xl rounded-2xl p-8 border border-gray-100">

            <h2 class="text-3xl font-bold text-center text-gray-800 mb-2">
                Nuevo Horario Profesional
            </h2>

            <p class="text-center text-gray-500 mb-8">
                Registre los Horarios de Profesional
            </p>


            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-5">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{ route('horario_profesional.store')}}" method="post">
                @csrf

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Dia de Semana</label>
                    <input type="date" name="dia_semana" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Hora de Inicio</label>
                    <input type="time" name="hora_inicio" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Hora de Fin</label>
                    <input type="time" name="hora_fin" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">
                        Nombre Profesional
                    </label>
                    <select class="w-full border rounded px-3 py-2" name="id_profesional" id="id_profesional">
                        <option value="">Seleccione un profesional</option>
                        @foreach ($profesionales as $profesional)
                            <option value="{{ $profesional->id}}">
                                {{ $profesional->nombre_profesional }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div>
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl px-6 py-3 shadow-md transition">
                        Guardar
                    </button>
                </div>


            </form>


        </div>

    </div>
@endsection