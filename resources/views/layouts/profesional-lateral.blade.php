{{-- BARRA LATERAL SIGECIR - PROFESIONAL --}}

<aside
    x-cloak
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    class="fixed inset-y-0 left-0 z-40 flex w-64 flex-col
    bg-white border-r border-slate-200 shadow-lg
    transform transition-transform duration-300 ease-in-out"
    aria-label="Menú principal de SIGECIR">

    <div class="flex h-full flex-col">

        {{-- LOGO Y ENCABEZADO --}}
        <div class="px-5 pt-7 pb-5">

            <div class="flex justify-center mb-4">
                <img
                    src="{{ asset('images/LogoSIGECIR.png') }}"
                    alt="Logo SIGECIR"
                    class="h-16 w-auto object-contain"
                >
            </div>

            <div class="text-center">
                <h2 class="text-base font-extrabold text-[#063d69] tracking-wide">
                    SIGECIR
                </h2>

                <p class="mt-1 text-[11px] font-medium text-slate-500">
                    Portal de profesionales
                </p>
            </div>

        </div>

        {{-- SEPARADOR --}}
        <div class="mx-4 border-t border-slate-200"></div>

        {{-- TÍTULO DEL MENÚ --}}
        <div class="px-5 pt-5 pb-3">
            <p class="text-[10px] font-bold uppercase tracking-wider text-[#0875bd]">
                MENÚ PRINCIPAL
            </p>
        </div>

        {{-- ENLACES DEL MENÚ --}}
        <nav class="flex-1 overflow-y-auto px-3 space-y-1">

            @php
                $links = [

                    [
                        'label' => 'Inicio',
                        'route' => 'profesionales.dashboard',
                        'pattern' => 'profesionales.dashboard',
                        'icon' => 'home'
                    ],

                    [
                        'label' => 'Mi agenda',
                        'route' => 'profesionales.agenda',
                        'pattern' => 'profesionales.agenda',
                        'icon' => 'agenda'
                    ],

                    [
                        'label' => 'Mis pacientes',
                        'route' => 'profesionales.pacientes',
                        'pattern' => 'profesionales.pacientes',
                        'icon' => 'pacientes'
                    ],

                    [
                        'label' => 'Notificaciones',
                        'route' => 'profesionales.notificaciones',
                        'pattern' => 'profesionales.notificaciones',
                        'icon' => 'notificacion'
                    ],

                    [
                        'label' => 'Mi horario',
                        'route' => 'profesionales.horario',
                        'pattern' => 'profesionales.horario',
                        'icon' => 'horario'
                    ],

                    [
                        'label' => 'Mi perfil',
                        'route' => 'profesionales.perfil',
                        'pattern' => 'profesionales.perfil',
                        'icon' => 'miperfil'
                    ],

                ];
            @endphp

            @foreach ($links as $link)

                @php
                    $active = request()->routeIs($link['pattern']);
                @endphp

                @if (Route::has($link['route']))

                    <a
                        href="{{ route($link['route']) }}"
                        @if($active) aria-current="page" @endif
                        @click="sidebarOpen = false"
                        class="flex items-center gap-3 rounded-xl px-3 py-2.5
                        text-xs transition-all duration-200

                        {{ $active
                            ? 'bg-[#e6f7fc] text-[#063d69] font-bold shadow-sm border-l-4 border-[#0875bd]'
                            : 'text-slate-600 hover:bg-[#e6f7fc] hover:text-[#0875bd]'
                        }}">

                        {{-- ICONO --}}
                        <span class="flex w-5 items-center justify-center text-[#0875bd]">
                            @include('layouts.partials.icons', ['icon' => $link['icon']])
                        </span>

                        {{-- TEXTO --}}
                        <span>
                            {{ $link['label'] }}
                        </span>

                    </a>

                @endif

            @endforeach

        </nav>

        {{-- SECCIÓN CUENTA --}}
        <div class="px-5 pt-4 pb-3">
            <p class="text-[10px] font-bold uppercase tracking-wider text-[#0875bd]">
                CUENTA
            </p>
        </div>

        {{-- CERRAR SESIÓN --}}
        <div class="px-3 pb-3">

            @if (Route::has('logout'))

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="flex w-full items-center gap-3 rounded-xl
                        px-3 py-2.5 text-xs text-slate-600
                        hover:bg-[#e6f7fc] hover:text-[#063d69]
                        transition-all duration-200">

                        <span class="flex w-5 items-center justify-center text-[#0875bd]">
                            <i class="fa-solid fa-right-from-bracket text-sm"></i>
                        </span>

                        <span>
                            Cerrar sesión
                        </span>

                    </button>

                </form>

            @endif

        </div>

        {{-- TARJETA INFORMATIVA --}}
        <div class="px-3 pb-5 pt-2">

            <div class="rounded-xl bg-[#e6f7fc] border border-[#c8eaf4] px-3 py-3">

                <p class="text-[10px] font-extrabold text-[#063d69]">
                    SIGECIR2026
                </p>

                <p class="mt-1 text-[10px] leading-4 text-[#0875bd]">
                    Sistema de Gestión de Citas para Renueva IPS.
                </p>

            </div>

        </div>

    </div>

</aside>

