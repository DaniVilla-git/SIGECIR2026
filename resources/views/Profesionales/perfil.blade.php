@extends('profesionales.layouts.appProfesional')

@section('title', 'Mi perfil')

@section('content')

<div class="container mx-auto mt-8 space-y-6 px-4 pb-10">

    {{-- ENCABEZADO --}}
    <header class="overflow-hidden rounded-2xl bg-gradient-to-r from-[#063d69] via-[#0875bd] to-[#20a4a7] px-6 py-7 text-white shadow-xl">
        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
            <div>
                <h1 class="text-2xl font-bold sm:text-3xl">
                    <i class="fa-solid fa-user-doctor mr-2"></i>
                    Mi perfil
                </h1>

                <p class="mt-2 text-sm text-blue-100">
                    Consulta tu información personal y profesional.
                </p>
            </div>

            <div class="inline-flex w-fit items-center gap-2 rounded-xl border border-white/20 bg-white/10 px-4 py-3 text-sm font-semibold text-white shadow-sm">
                <i class="fa-solid fa-user-doctor"></i>
                Portal de profesionales
            </div>
        </div>
    </header>

    {{-- PERFIL PRINCIPAL --}}
    <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-xl">

        <div class="flex flex-col gap-6 sm:flex-row sm:items-center">

            <div class="flex h-24 w-24 min-w-24 items-center justify-center rounded-2xl bg-gradient-to-br from-[#063d69] to-[#0875bd] shadow-lg">
                <i class="fa-solid fa-user-doctor text-4xl text-white"></i>
            </div>

            <div class="flex-1">

                <h2 class="text-2xl font-bold text-[#063d69]">
                    {{ auth()->user()->nombre ?? auth()->user()->name ?? 'Profesional' }}
                </h2>

                <p class="mt-2 text-sm text-slate-500">
                    Profesional de RENUEVA IPS
                </p>

                <div class="mt-3">
                    <span class="inline-flex items-center gap-2 rounded-full border border-green-200 bg-green-50 px-3 py-1.5 text-xs font-bold text-green-700">
                        <i class="fa-solid fa-circle-check"></i>
                        Cuenta activa
                    </span>
                </div>

            </div>

            <div class="rounded-xl border border-slate-200 bg-slate-50 px-5 py-4">

                <p class="text-xs font-semibold uppercase text-slate-400">
                    Correo de acceso
                </p>

                <p class="mt-2 text-sm font-semibold text-[#063d69]">
                    {{ auth()->user()->email ?? 'No registrado' }}
                </p>

            </div>

        </div>

    </section>

    {{-- INFORMACIÓN PERSONAL --}}
    <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-xl">

        <div class="mb-6 flex items-center gap-3 border-b border-slate-200 pb-4">

            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#e6f7fc]">
                <i class="fa-solid fa-user text-lg text-[#0875bd]"></i>
            </div>

            <div>
                <h2 class="text-lg font-bold text-[#063d69]">
                    Información personal
                </h2>

                <p class="text-xs text-slate-400">
                    Datos generales del profesional.
                </p>
            </div>

        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

            <div>
                <label class="mb-2 block text-xs font-semibold text-slate-400">
                    Nombres
                </label>

                <p class="border-b border-slate-100 pb-3 text-sm font-semibold text-slate-700">
                    {{ auth()->user()->nombre ?? auth()->user()->name ?? 'No registrado' }}
                </p>
            </div>

            <div class="md:col-span-2">
                <label class="mb-2 block text-xs font-semibold text-slate-400">
                    Correo electrónico
                </label>

                <p class="border-b border-slate-100 pb-3 text-sm font-semibold text-slate-700">
                    {{ auth()->user()->email ?? 'No registrado' }}
                </p>
            </div>

        </div>

    </section>

    {{-- INFORMACIÓN PROFESIONAL --}}
    <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-xl">

        <div class="mb-6 flex items-center gap-3 border-b border-slate-200 pb-4">

            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-green-50">
                <i class="fa-solid fa-briefcase text-lg text-[#20A447]"></i>
            </div>

            <div>
                <h2 class="text-lg font-bold text-[#063d69]">
                    Información profesional
                </h2>

                <p class="text-xs text-slate-400">
                    Información relacionada con tu actividad profesional.
                </p>
            </div>

        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

            <div>
                <label class="mb-2 block text-xs font-semibold text-slate-400">
                    Especialidad
                </label>

                <p class="border-b border-slate-100 pb-3 text-sm font-semibold text-slate-700">
                    {{ auth()->user()->especialidad ?? 'No registrada' }}
                </p>
            </div>

            <div>
                <label class="mb-2 block text-xs font-semibold text-slate-400">
                    Consultorio asignado
                </label>

                <p class="border-b border-slate-100 pb-3 text-sm font-semibold text-slate-700">
                    {{ auth()->user()->consultorio ?? 'No asignado' }}
                </p>
            </div>

            <div>
                <label class="mb-2 block text-xs font-semibold text-slate-400">
                    Institución
                </label>

                <p class="border-b border-slate-100 pb-3 text-sm font-semibold text-slate-700">
                    RENUEVA IPS
                </p>
            </div>

            <div>
                <label class="mb-2 block text-xs font-semibold text-slate-400">
                    Estado de la cuenta
                </label>

                <p class="border-b border-slate-100 pb-3 text-sm font-semibold text-green-600">
                    <i class="fa-solid fa-circle-check mr-1"></i>
                    Activo
                </p>
            </div>

        </div>

    </section>

    {{-- SEGURIDAD --}}
    <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-xl">

        <div class="mb-6 flex items-center gap-3 border-b border-slate-200 pb-4">

            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-cyan-50">
                <i class="fa-solid fa-shield-halved text-lg text-[#0875bd]"></i>
            </div>

            <div>
                <h2 class="text-lg font-bold text-[#063d69]">
                    Seguridad de la cuenta
                </h2>

                <p class="text-xs text-slate-400">
                    Información de acceso al sistema.
                </p>
            </div>

        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

            <div>
                <label class="mb-2 block text-xs font-semibold text-slate-400">
                    Usuario de acceso
                </label>

                <p class="border-b border-slate-100 pb-3 text-sm font-semibold text-slate-700">
                    {{ auth()->user()->email ?? 'No registrado' }}
                </p>
            </div>

            <div>
                <label class="mb-2 block text-xs font-semibold text-slate-400">
                    Contraseña
                </label>

                <p class="border-b border-slate-100 pb-3 text-sm font-semibold text-slate-700">
                    ••••••••••••••
                </p>
            </div>

        </div>

        <div class="mt-6 rounded-xl border border-blue-100 bg-[#e6f7fc] p-4">

            <div class="flex items-start gap-3">

                <i class="fa-solid fa-circle-info mt-1 text-[#0875bd]"></i>

                <p class="text-sm leading-relaxed text-slate-600">
                    Los datos de acceso son administrados mediante el sistema
                    de usuarios de SIGECIR. Si necesitas actualizar tu
                    información, puedes solicitar el cambio al administrador.
                </p>

            </div>

        </div>

    </section>

    {{-- PIE --}}
    <footer class="py-6 text-center">

        <p class="text-xs text-slate-400">
            SIGECIR 2026 · RENUEVA IPS
        </p>

        <p class="mt-1 text-xs text-slate-400">
            Sistema de Gestión de Citas
        </p>

    </footer>

</div>

@endsection
