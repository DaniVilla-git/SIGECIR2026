@extends('layouts.app')

@section('titulo')
    Crear Servicio
@endsection

@section('content')
    <div class="container mx-auto mt-10">

        <div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-8">

            <h2 class="text-3xl font-bold text-center mb-6">

                Nuevo Servicio
            </h2>

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-5">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('servicios.store')}}" method="post">
            @csrf

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Codigo Servicio</label>
                    <input type="text" name="codigo_servicio" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Nombre Servicio</label>
                    <input type="text" name="nombre_servicio" class="w-full border rounded px-3 py-2">
                </div>

               
                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Grupo servicio</label>
                    <input type="text" name="grupo_servicio" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="id_profesional">Profesional</label>

                    <select name="id_profesional" id="id_profesional"
                        class="w-full border border-gray-300 rounded-lg p-3">

                        <option value="">Seleccione un profesional</option>

                        @foreach ($profesionales as $profesionales)
                            <option value="{{ $profesionales->id }}">
                                {{ $profesionales->nombre }}
                             </option>
                        @endforeach

</select>
                    
                </div>

                 

                <div class="mb-5">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white rounded px-5 py-2">Guardar</button>
                </div>
            
            </form>

        </div>

    </div>
@endsection