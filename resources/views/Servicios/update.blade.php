@extends('layouts.app')
@section('titulo')
    Editar Servicio
@endsection

@section('content')
    <div class="container mx-auto mt-10">

        <div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-8">

            <h2 class="text-3xl font-bold text-center mb-6">
                Editar Servicio
            </h2>

            <form action="{{ route('servicios.update', $servicios->id)}}" method="post">
                @csrf
                @method('PUT')

                    <div class="mb-5">
                        <label for="" class="block mb-2 font-semibold">Codigo Servicio</label>
                        <input type="text" name="primer_nombre" value="{{ $servicios->codigo_servicio}}" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-5">
                        <label for="" class="block mb-2 font-semibold">Nombre Servicio</label>
                        <input type="text" name="segundo_nombre" value="{{ $servicios->nombre_servicio}}" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-5">
                        <label for="" class="block mb-2 font-semibold">Grupo Servicio</label>
                        <input type="text" name="primer_apellido" value="{{ $servicios->grupo_servicio}}" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-5">
                        <label for="" class="block mb-2 font-semibold">Id profesional</label>
                        <input type="text" name="segundo_apellido" value="{{ $servicios->id_profesional}}" class="w-full border rounded px-3 py-2">
                    </div>

                                       
                <div>
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white rounded px-5 py-2">Guardar</button>
                </div>
            </form>

        </div>

    </div>
@endsection