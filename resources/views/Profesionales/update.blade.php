@extends('layouts.app')
@section('titulo')
    Editar Profesional
@endsection

@section('content')
    <div class="container mx-auto mt-10">

        <div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-8">

            <h2 class="text-3xl font-bold text-center mb-6">
                Editar Profesional
            </h2>

            <form action="{{ route('profesionales.update', $profesionales->id)}}" method="post">
                @csrf
                @method('PUT')

                    <div class="mb-5">
                        <label for="" class="block mb-2 font-semibold">Nombre Profesional</label>
                        <input type="text" name="nombre_profesional" value="{{ $profesionales->nombre_profesional}}" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-5">
                        <label for="" class="block mb-2 font-semibold">Apellido Profesional</label>
                        <input type="text" name="apellido_profesional" value="{{ $profesionales->apellido_profesional}}" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-5">
                        <label for="" class="block mb-2 font-semibold">Especialidad</label>
                        <input type="text" name="especialidad" value="{{ $profesionales->especialidad}}" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-5">
                        <label for="" class="block mb-2 font-semibold">Consultorio</label>
                        <input type="text" name="consultorio" value="{{ $profesionales->consultorio}}" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-5">
                        <label for="" class="block mb-2 font-semibold">Correo</label>
                        <input type="text" name="correo" value="{{ $profesionales->correo}}" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-5">
                        <label for="" class="block mb-2 font-semibold">Firma</label>
                        <input type="text" name="firma" value="{{ $profesionales->firma}}" class="w-full border rounded px-3 py-2">
                    </div>
                                        
                <div>
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white rounded px-5 py-2">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection