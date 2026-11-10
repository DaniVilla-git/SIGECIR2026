{{--
    Menú lateral principal de SIGECIR - RENUEVA IPS.
    Diseño moderno y combinado con el panel administrativo.
--}}

<aside
    x-cloak
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    class="fixed inset-y-0 left-0 z-40 flex w-64 transform flex-col overflow-hidden bg-gradient-to-b from-[#063d69] via-[#075587] to-[#063d69] text-slate-200 shadow-2xl transition-transform duration-300 ease-in-out"
    aria-label="Menú principal de SIGECIR">

    <div class="flex h-full flex-col">

        {{-- ENCABEZADO E IDENTIDAD --}}
        <div class="relative overflow-hidden border-b border-white/10 px-5 py-6">

            <div class="absolute -right-8 -top-10 h-32 w-32 rounded-full border-[18px] border-white/5"></div>

            <div class="relative z-10 flex items-center gap-3">
                <div class="min-w-0">
                    <p class="text-xl font-extrabold tracking-widest text-white">
                        SIGECIR
                    </p>

                    <p class="mt-1 text-xs font-medium tracking-wide text-cyan-200">
                        RENUEVA IPS
                    </p>

                    <div class="mt-2 flex items-center gap-1.5">
                        <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                        <span class="text-[10px] font-medium uppercase tracking-wider text-blue-100">
                            Sistema administrativo
                        </span>
                    </div>
                </div>

            </div>
        </div>


        {{-- TÍTULO DE NAVEGACIÓN --}}
        <div class="px-5 pb-3 pt-7">
            <p class="text-[11px] font-bold uppercase tracking-[0.18em] text-cyan-200/80">
                <i class="fa-solid fa-grip-lines-vertical mr-2"></i>
                Menú principal
            </p>
        </div>


        {{-- ENLACES --}}
        <nav
            class="flex-1 space-y-1 overflow-y-auto overflow-x-hidden px-3 pb-4 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden"
            aria-label="Navegación lateral">

            @php
                $links = [
                    
                    ['label' => 'Inicio', 'route' => 'dashboard.index', 'icon' => 'home'],

                    ['label' => 'Usuarios', 'route' => 'usuarios.index', 'icon' => 'usuario'],

                    ['label' => 'Profesionales', 'route' => 'profesionales.index', 'icon' => 'profesional'],

                    ['label' => 'Horarios', 'route' => 'horario_profesional.index', 'icon' => 'horario'],

                    ['label' => 'Servicios', 'route' => 'servicios.index', 'icon' => 'servicios'],

                    ['label' => 'Citas', 'route' => 'citas.index', 'icon' => 'cita'],

                    ['label' => 'Notificaciones', 'route' => 'notificaciones.index', 'icon' => 'notificacion'],

                    ['label' => 'Documentos', 'route' => 'documentos.index', 'icon' => 'documento'],

                    ['label' => 'Mensajes', 'route' => 'mensajes.index', 'icon' => 'mensaje'],

                    [
                        'label' => 'Gestión de usuarios',
                        'route' => 'seguridad.permisos.index',
                        'icon' => 'users',
                        'can' => 'gestionar seguridad',
                    ],
                ];
            @endphp


            @foreach ($links as $link)

                @php
                    $routePrefix = explode('.', $link['route'])[0];

                    $active = Route::has($link['route'])
                        && (
                            request()->routeIs($routePrefix . '.*')
                            || request()->routeIs($link['route'])
                        );

                    $tienePermiso = !isset($link['can'])
                        || auth()->user()?->can($link['can']);
                @endphp

                @if (Route::has($link['route']) && $tienePermiso)

                    <a
                        href="{{ route($link['route']) }}"
                        @if ($active) aria-current="page" @endif
                        @click="sidebarOpen = false"
                        class="group relative flex items-center gap-3 overflow-hidden rounded-xl px-4 py-3 text-sm font-semibold transition-all duration-200
                        {{ $active
                            ? 'bg-white text-[#063d69] shadow-lg'
                            : 'text-blue-100 hover:bg-white/10 hover:translate-x-1 hover:text-white' }}">

                        {{-- Indicador lateral --}}
                        @if ($active)
                            <span class="absolute inset-y-2 left-0 w-1 rounded-r-full bg-[#20a4a7]"></span>
                        @endif

                        {{-- Icono --}}
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg
                            {{ $active
                                ? 'bg-blue-100 text-[#0875bd]'
                                : 'bg-white/10 text-cyan-200 group-hover:bg-white/20 group-hover:text-white' }}">

                            @include('layouts.partials.icons', [
                                'icon' => $link['icon']
                            ])

                        </span>

                        {{-- Nombre --}}
                        <span class="flex-1">
                            {{ $link['label'] }}
                        </span>

                        {{-- Indicador activo --}}
                        @if ($active)
                            <i class="fa-solid fa-chevron-right text-xs text-[#20a4a7]"></i>
                        @else
                            <i class="fa-solid fa-angle-right text-[10px] text-white/30 opacity-0 transition group-hover:translate-x-1 group-hover:opacity-100"></i>
                        @endif

                    </a>

                @endif

            @endforeach

        </nav>


        {{-- PIE DEL MENÚ --}}
        <div class="border-t border-white/10 bg-black/10 px-4 py-4">

            


            {{-- CERRAR SESIÓN --}}
            @if (Route::has('logout'))

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold text-red-200 transition-all duration-200 hover:bg-red-500/20 hover:text-white focus:outline-none focus:ring-2 focus:ring-red-300">

                        @include('layouts.partials.icons', [
                        'icon' => 'cerrar sesion'
                    ])

                        <span>Cerrar sesión</span>

                    </button>

                </form>

            @endif

            <p class="mt-4 text-center text-[10px] tracking-wide text-blue-200/60">
                SIGECIR · RENUEVA IPS
            </p>

        </div>

    </div>

</aside>