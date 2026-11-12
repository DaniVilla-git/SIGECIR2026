@extends('profesionales.layouts.appProfesional')

@section('title', 'Panel del profesional')

@section('content')

<div class="container mx-auto mt-8 px-4 pb-10">

    {{-- CONTENEDOR PRINCIPAL --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl">

        {{-- ENCABEZADO --}}
        <div class="relative overflow-hidden bg-gradient-to-r from-[#063d69] via-[#0875bd] to-[#20a4a7] px-6 py-10 md:px-10">

            <div class="absolute -right-10 -top-16 h-56 w-56 rounded-full bg-white/10"></div>
            <div class="absolute -bottom-24 right-40 h-56 w-56 rounded-full bg-white/10"></div>

            <div class="relative flex flex-col justify-between gap-6 md:flex-row md:items-center">

                <div>
                    <div class="mb-4 inline-flex items-center gap-2 rounded-full bg-white/15 px-4 py-2 text-sm font-semibold text-white">
                        <i class="fa-solid fa-user-doctor"></i>
                        Portal del profesional
                    </div>

                    <h1 class="text-3xl font-extrabold tracking-tight text-white md:text-4xl">
                        ¡Bienvenido Profesional!
                    </h1>

                    <p class="mt-3 max-w-xl text-sm leading-6 text-blue-100 md:text-base">
                        Te damos la bienvenida al portal profesional de SIGECIR,
                        un espacio destinado al seguimiento de tus citas y la
                        atención de los pacientes de RENUEVA IPS.
                    </p>
                </div>

                <div class="inline-flex items-center gap-3 self-start rounded-xl bg-white px-5 py-4 shadow-lg md:self-center">

                    <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-blue-100 text-[#0875bd]">
                        <i class="fa-regular fa-calendar-days text-xl"></i>
                    </div>

                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                            Fecha actual
                        </p>

                        <p class="font-bold capitalize text-[#063d69]">
                            {{ now()->locale('es')->translatedFormat('l, d \d\e F \d\e Y') }}
                        </p>
                    </div>

                </div>

            </div>
        </div>

        {{-- CONTENIDO --}}
        <div class="space-y-8 p-5 md:p-8">

            {{-- MENSAJE DE BIENVENIDA --}}
            <section class="rounded-2xl border border-blue-100 bg-blue-50/70 p-6 md:p-8">

                <div class="flex flex-col gap-5 sm:flex-row sm:items-center">

                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-white text-[#0875bd] shadow-sm">
                        <i class="fa-solid fa-hospital-user text-3xl"></i>
                    </div>

                    <div>
                        <h2 class="text-xl font-extrabold text-[#063d69]">
                            Tu espacio de trabajo profesional
                        </h2>

                        <p class="mt-2 text-sm leading-7 text-slate-600">
                            Desde este portal puedes consultar la información relacionada
                            con tu actividad profesional, revisar tu agenda y conocer
                            los pacientes que tienen citas asignadas contigo.
                        </p>
                    </div>

                </div>

            </section>

            {{-- INFORMACIÓN DE MI ACTIVIDAD --}}
            <section>

                <div class="mb-5">
                    <h2 class="text-xl font-extrabold text-[#063d69]">
                        Información de mi actividad
                    </h2>

                    <p class="mt-2 text-sm text-slate-500">
                        Aspectos importantes para el desarrollo de tu labor profesional.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                    {{-- ORGANIZACIÓN DE CITAS --}}
                    <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-md">

                        <div class="mb-5 flex h-14 w-14 items-center justify-center rounded-xl bg-blue-100 text-[#0875bd]">
                            <i class="fa-solid fa-calendar-check text-2xl"></i>
                        </div>

                        <h3 class="text-lg font-bold text-[#063d69]">
                            Organización de citas
                        </h3>

                        <p class="mt-3 text-sm leading-7 text-slate-500">
                            La agenda permite conocer las citas que han sido asignadas,
                            sus fechas, horarios, modalidades y estados. Es importante
                            mantener una revisión constante de esta información para
                            organizar adecuadamente la atención.
                        </p>

                    </article>

                    {{-- ATENCIÓN AL PACIENTE --}}
                    <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-md">

                        <div class="mb-5 flex h-14 w-14 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">
                            @include('layouts.partials.icons', ['icon' => 'pacientes'])
                        </div>

                        <h3 class="text-lg font-bold text-[#063d69]">
                            Atención al paciente
                        </h3>

                        <p class="mt-3 text-sm leading-7 text-slate-500">
                            Brindar una atención responsable, respetuosa y oportuna
                            contribuye al bienestar de los pacientes y al buen
                            funcionamiento de los servicios de RENUEVA IPS.
                        </p>

                    </article>

                </div>

            </section>

            {{-- COMPROMISO PROFESIONAL --}}
            <section class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-[#063d69] to-[#0875bd] p-6 text-white md:p-8">

                <div class="absolute -right-10 -top-12 h-40 w-40 rounded-full bg-white/10"></div>

                <div class="relative flex flex-col gap-4 sm:flex-row sm:items-center">

                    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl bg-white/15">
                        <i class="fa-solid fa-hand-holding-medical text-2xl"></i>
                    </div>

                    <div>
                        <h2 class="text-xl font-extrabold">
                            Nuestro compromiso es tu bienestar y el de los pacientes
                        </h2>

                        <p class="mt-2 max-w-3xl text-sm leading-7 text-blue-100">
                            SIGECIR facilita la organización y consulta de la información
                            relacionada con la asignación de citas, apoyando el trabajo
                            del equipo profesional de RENUEVA IPS.
                        </p>
                    </div>

                </div>

            </section>

            {{-- PIE DE PÁGINA --}}
            <footer class="border-t border-slate-100 pt-6 text-center">

                <p class="text-xs font-medium text-slate-400">
                    SIGECIR2026 · RENUEVA IPS
                </p>

                <p class="mt-1 text-xs text-slate-400">
                    Portal de profesionales
                </p>

            </footer>

        </div>

    </div>

</div>

@endsection
