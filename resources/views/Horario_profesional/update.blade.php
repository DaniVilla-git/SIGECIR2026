@extends('layouts.app')
@section('titulo')
    Editar Horario Profesional
@endsection

@section('content')
    <div class="container mx-auto mt-10">

        <div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-8">

            <h2 class="text-3xl font-bold text-center mb-6">
                Editar Horario Profesional
            </h2>

            <form action="{{ route('horario_profesional.update', $horario_profesional->id)}}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Dia de Semana</label>
                    <input type="date" name="dia_semana" value="{{ $horario_profesional->dia_semana}}" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Hora de Inicio</label>
                    <input type="time" name="hora_inicio" value="{{ $horario_profesional->hora_inicio}}" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Hora de Fin</label>
                    <input type="time" name="hora_fin" value="{{ $horario_profesional->hora_fin}}" class="w-full border rounded px-3 py-2">
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
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white rounded px-5 py-2">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection