{{--
    Menú lateral principal de SIGECIR - RENUEVA IPS.
    Conserva las rutas existentes y resalta el módulo activo.
--}}

<aside
    x-cloak
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    class="fixed inset-y-0 left-0 z-40 w-64 bg-primary-700 text-slate-200 transform transition-transform duration-200 ease-in-out"
    aria-label="Menú principal de SIGECIR">
    <div class="h-full flex flex-col">

        {{-- Logo e identidad institucional --}}
        <div class="flex items-center gap-3 h-20 px-5 border-b border-white/10">



            <div class="min-w-0">
                <p class="text-white font-extrabold text-lg tracking-wide">
                    SIGECIR
                </p>

                <p class="text-xs text-primary-200 truncate">
                    RENUEVA IPS
                </p>
            </div>
        </div>

        {{-- Texto de navegación --}}
        <div class="px-6 pt-6 pb-2">
            <p class="text-xs font-semibold uppercase tracking-widest text-primary-200">
                Menú principal
            </p>
        </div>

        {{-- Navegación lateral --}}
        <nav
            class="flex-1 overflow-y-auto px-3 py-2 space-y-1"
            aria-label="Navegación lateral"
        >
            @php
                $links = [
                    ['label' => 'Inicio','route' => 'dashboard.index','icon' => 'home',],
                    ['label' => 'Usuarios','route' => 'usuarios.index','icon' => 'usuario',],
                    ['label' => 'Profesionales','route' => 'profesionales.index','icon' => 'profesional',],
                    ['label' => 'Horarios','route' => 'horario_profesional.index','icon' => 'horario',],
                    ['label' => 'Servicios','route' => 'servicios.index','icon' => 'servicios',],
                    ['label' => 'Citas','route' => 'citas.index','icon' => 'cita',],
                    ['label' => 'Notificaciones','route' => 'notificaciones.index','icon' => 'notificacion',],
                    ['label' => 'Documentos','route' => 'documentos.index','icon' => 'documento',],
                    ['label' => 'Mensaje','route' => 'mensajes.index','icon' => 'mensaje',],
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
                @endphp

                @if (Route::has($link['route']))
                    <a
                        href="{{ route($link['route']) }}"
                        @if ($active) aria-current="page" @endif
                        @if ($active) @click="sidebarOpen = false" @endif
                        class="group flex items-center gap-3 px-3 py-3 rounded-xl text-sm font-medium transition-all duration-200
                            {{ $active
                                ? 'bg-white text-primary-900 shadow-sm'
                                : 'text-slate-200 hover:bg-white/10 hover:text-white' }}">
                        <span
                            class="w-5 h-5 flex-shrink-0
                                {{ $active ? 'text-primary-600' : 'text-primary-200 group-hover:text-turquoise' }}"
                            aria-hidden="true">
                            @include('layouts.partials.icons', [
                                'icon' => $link['icon']
                            ])
                        </span>

                        <span class="flex-1">
                            {{ $link['label'] }}
                        </span>

                        @if ($active)
                            <span class="w-2 h-2 rounded-full bg-turquoise"></span>
                        @endif
                    </a>
                @endif
            @endforeach
        </nav>

        {{-- Identidad institucional inferior --}}
        <div class="px-4 py-4 border-t border-white/10">
            {{-- Cerrar sesión --}}
            @if (Route::has('logout'))
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-slate-200 hover:bg-red-500/15 hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-turquoise"
                        aria-label="Cerrar sesión"
                    >
                        <svg
                            class="w-5 h-5 flex-shrink-0"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                            />
                        </svg>

                        <span>Cerrar sesión</span>
                    </button>
                </form>
            @endif
        </div>
    </div>
</aside>
