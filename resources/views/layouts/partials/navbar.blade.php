
<header class="sticky top-0 z-20 bg-white border-b border-slate-200 shadow-sm">
    <div class="h-16 px-4 sm:px-6 lg:px-8 flex items-center justify-between gap-4">

        {{-- Lado izquierdo: menú y título --}}
        <div class="flex items-center gap-4 min-w-0">

            {{-- Botón para abrir el menú en móviles --}}
            <button
                @click="sidebarOpen = !sidebarOpen"
                type="button"
                class="lg:hidden p-2 rounded-lg text-primary-700 hover:bg-primary-50 focus:outline-none focus:ring-2 focus:ring-primary-500"
                aria-label="Abrir menú lateral"
            >
                <span class="w-6 h-6 block">
                    @include('layouts.partials.icons', ['icon' => 'menu'])
                </span>
            </button>

            {{-- Identidad de SIGECIR --}}
            {{-- Espacio para el logo --}}
            <div class="hidden sm:flex items-center gap-3">
                <span class="flex items-center gap-2">
                    <img src="{{ asset('images/LogoSIGECIR.png') }}"
                        alt="LogoSigecir"
                        class="h-10 w-auto object-contain">
                </span>
            </div>

            {{-- Título del módulo actual --}}
            
        </div>

        {{-- Lado derecho --}}
        <div class="flex items-center gap-2 sm:gap-4">

            {{-- Buscador --}}
            <form
                method="GET"
                action="{{ url()->current() }}"
                class="relative hidden md:block"
                role="search"
            >
                <label for="global-search" class="sr-only">
                    Buscar
                </label>

                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 w-4 h-4 pointer-events-none">
                    @include('layouts.partials.icons', ['icon' => 'search'])
                </span>

                <input
                    id="global-search"
                    type="search"
                    name="q"
                    value="{{ request('q') }}"
                    placeholder="Buscar..."
                    class="w-48 lg:w-64 pl-9 pr-3 py-2 text-sm rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition"
                >
            </form>

            {{-- Notificaciones --}}
            <div x-data="{ open: false }" class="relative">

                <button
                    @click="open = !open"
                    @click.outside="open = false"
                    type="button"
                    class="relative p-2.5 rounded-xl text-primary-700 hover:bg-primary-50 focus:outline-none focus:ring-2 focus:ring-primary-500 transition"
                    aria-label="Ver notificaciones"
                    :aria-expanded="open.toString()"
                >
                    <span class="w-5 h-5 block">
                        @include('layouts.partials.icons', ['icon' => 'notificacion'])
                    </span>

                    <span class="absolute top-2 right-2 w-2 h-2 rounded-full bg-turquoise ring-2 ring-white"></span>
                </button>

                <div
                    x-show="open"
                    x-cloak
                    x-transition
                    @click.outside="open = false"
                    class="absolute right-0 mt-3 w-72 sm:w-80 bg-white rounded-xl shadow-xl border border-slate-100 overflow-hidden"
                >
                    <div class="px-4 py-3 border-b border-slate-100 bg-primary-50">
                        <h2 class="font-bold text-sm text-primary-900">
                            Notificaciones
                        </h2>
                        <p class="text-xs text-slate-500 mt-1">
                            Avisos de SIGECIR
                        </p>
                    </div>

                    <ul class="max-h-72 overflow-y-auto divide-y divide-slate-100">
                        @forelse (($notifications ?? []) as $notification)
                            <li class="px-4 py-3 text-sm hover:bg-slate-50">
                                <p class="text-slate-700">
                                    {{ $notification['message'] }}
                                </p>

                                <p class="text-xs text-slate-400 mt-1">
                                    {{ $notification['time'] }}
                                </p>
                            </li>
                        @empty
                            <li class="px-4 py-6 text-sm text-slate-400 text-center">
                                No hay notificaciones nuevas.
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>

            {{-- Menú del usuario --}}
            <div x-data="{ open: false }" class="relative">

                <button
                    @click="open = !open"
                    @click.outside="open = false"
                    type="button"
                    class="flex items-center gap-2 pl-1 pr-2 py-1 rounded-xl hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-primary-500 transition"
                    aria-haspopup="true"
                    :aria-expanded="open.toString()"
                >
                    <img
                        class="w-9 h-9 rounded-full object-cover ring-2 ring-primary-100"
                        src="{{ auth()->user()->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name ?? 'Administrador') . '&background=063d69&color=ffffff' }}"
                        alt="Foto de {{ auth()->user()->name ?? 'Usuario' }}"
                    >

                    <span class="hidden sm:block text-sm font-semibold text-slate-700 max-w-36 truncate">
                        {{ auth()->user()->name ?? 'Administrador' }}
                    </span>

                    <span class="w-4 h-4 text-slate-400 hidden sm:block">
                        @include('layouts.partials.icons', ['icon' => 'chevron-down'])
                    </span>
                </button>

                {{-- Opciones del usuario --}}
                <div
                    x-show="open"
                    x-cloak
                    x-transition
                    class="absolute right-0 mt-3 w-56 bg-white rounded-xl shadow-xl border border-slate-100 overflow-hidden py-1"
                >
                    <div class="px-4 py-3 bg-primary-50 border-b border-slate-100">
                        <p class="text-sm font-bold text-primary-900">
                            {{ auth()->user()->name ?? 'Usuario' }}
                        </p>
                        <p class="text-xs text-slate-500 mt-1">
                            RENUEVA IPS
                        </p>
                    </div>

                    @if (Route::has('profile.edit'))
                        <a
                            href="{{ route('profile.edit') }}"
                            class="block px-4 py-2.5 text-sm text-slate-600 hover:bg-primary-50 hover:text-primary-800"
                        >
                            Mi perfil
                        </a>
                    @endif

                    @if (Route::has('settings.index'))
                        <a
                            href="{{ route('settings.index') }}"
                            class="block px-4 py-2.5 text-sm text-slate-600 hover:bg-primary-50 hover:text-primary-800"
                        >
                            Configuración
                        </a>
                    @endif

                    <hr class="my-1 border-slate-100">

                    {{-- Cerrar sesión --}}
                    @if (Route::has('logout'))
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button
                                type="submit"
                                class="w-full text-left px-4 py-2.5 text-sm text-red-600 hover:bg-red-50"
                            >
                                Cerrar sesión
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>