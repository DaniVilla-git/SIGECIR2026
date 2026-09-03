@extends('layouts.app')
@section('titulo')
    Crear Profesional
@endsection

@section('content')
    <div class="container mx-auto mt-10">

        <div class="max-w-2xl mx-auto bg-white shadow-xl rounded-2xl p-8 border border-gray-100">

            <h2 class="text-3xl font-bold text-center text-gray-800 mb-2">
                Nuevo Profesional
            </h2>

            <p class="text-center text-gray-500 mb-8">
                Registre la información del profesional
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


            <form action="{{ route('profesionales.store')}}" method="post">
                @csrf

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Nombre Profesional</label>
                    <input type="text" name="nombre_profesional" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Apellido Profesional</label>
                    <input type="text" name="apellido_profesional" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Especialidad</label>
                    <input type="text" name="especialidad" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Consultorio</label>
                    <input type="text" name="consultorio" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Correo</label>
                    <input type="text" name="correo" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Firma</label>
                    <input type="text" name="firma" class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl px-6 py-3 shadow-md transition">
                        Guardar Profesional
                    </button>
                </div>


            </form>


        </div>

    </div>
@endsection