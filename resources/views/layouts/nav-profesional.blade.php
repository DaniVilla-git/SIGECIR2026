<header class="sticky top-0 z-30 m-0 w-full border-b border-slate-200 bg-white shadow-sm">

    <div class="flex h-16 w-full items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">

        {{-- LADO IZQUIERDO --}}
        <div class="flex min-w-0 items-center gap-4">
        </div>

        {{-- LADO DERECHO --}}
        <div class="flex items-center gap-2 sm:gap-4">

            {{-- BUSCADOR --}}
            <form
                method="GET"
                action="{{ url()->current() }}"
                class="relative hidden md:block"
                role="search">

                <label for="global-search-profesional" class="sr-only">
                    Buscar
                </label>

                <span class="pointer-events-none absolute inset-y-0 left-0 flex h-full w-10 items-center justify-center text-slate-400">
                    @include('layouts.partials.icons', ['icon' => 'search'])
                </span>

                <input
                    id="global-search-profesional"
                    type="search"
                    name="q"
                    value="{{ request('q') }}"
                    placeholder="Buscar..."
                    class="w-48 rounded-xl border border-slate-200 bg-slate-50 py-2 pl-10 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[#009fd4] focus:bg-white focus:ring-2 focus:ring-[#009fd4]/20 lg:w-64">

            </form>

            {{-- NOTIFICACIONES --}}
            <div x-data="{ open: false }" class="relative">

                <button
                    @click="open = !open"
                    @click.outside="open = false"
                    type="button"
                    class="relative flex h-10 w-10 items-center justify-center rounded-xl text-[#0875bd] transition hover:bg-[#e6f7fc] focus:outline-none focus:ring-2 focus:ring-[#009fd4]"
                    aria-label="Ver notificaciones"
                    :aria-expanded="open.toString()">

                    <span class="block h-5 w-5">
                        @include('layouts.partials.icons', ['icon' => 'notificacion'])
                    </span>

                    <span class="absolute right-2 top-2 h-2.5 w-2.5 rounded-full border-2 border-white bg-[#33C4D0]"></span>

                </button>

                {{-- PANEL DE NOTIFICACIONES --}}
                <div
                    x-show="open"
                    x-cloak
                    x-transition
                    @click.outside="open = false"
                    class="absolute right-0 mt-3 w-72 overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-2xl sm:w-80">

                    <div class="bg-gradient-to-r from-[#063d69] to-[#0875bd] px-5 py-4">

                        <div class="flex items-center gap-3">

                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/15 text-white">
                                <i class="fa-solid fa-bell text-lg"></i>
                            </div>

                            <div>
                                <h2 class="text-sm font-bold text-white">
                                    Notificaciones
                                </h2>

                                <p class="mt-1 text-xs text-blue-100">
                                    Avisos de SIGECIR
                                </p>
                            </div>

                        </div>

                    </div>

                    <ul class="max-h-72 divide-y divide-slate-100 overflow-y-auto">

                        @forelse (($notifications ?? []) as $notification)

                            <li class="px-5 py-4 transition hover:bg-blue-50/50">

                                <p class="text-sm text-slate-700">
                                    {{ $notification['message'] }}
                                </p>

                                <p class="mt-2 text-xs text-slate-400">
                                    <i class="fa-regular fa-clock mr-1"></i>
                                    {{ $notification['time'] }}
                                </p>

                            </li>

                        @empty

                            <li class="px-5 py-8 text-center">

                                <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-blue-50 text-[#0875bd]">
                                    <i class="fa-regular fa-bell-slash text-xl"></i>
                                </div>

                                <p class="text-sm font-semibold text-slate-600">
                                    No hay notificaciones nuevas.
                                </p>

                                <p class="mt-1 text-xs text-slate-400">
                                    Aquí aparecerán tus avisos.
                                </p>

                            </li>

                        @endforelse

                    </ul>

                </div>

            </div>

            {{-- MENÚ DEL USUARIO --}}
            <div x-data="{ open: false }" class="relative">

                <button
                    @click="open = !open"
                    @click.outside="open = false"
                    type="button"
                    class="flex items-center gap-2 rounded-xl border border-transparent py-1.5 pl-1.5 pr-2 transition hover:border-slate-200 hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-[#009fd4]"
                    aria-haspopup="true"
                    :aria-expanded="open.toString()">

                    {{-- AVATAR --}}
                    <img
                        class="h-10 w-10 rounded-xl object-cover ring-2 ring-blue-100"
                        src="{{ auth()->user()->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name ?? 'Administrador') . '&background=063d69&color=ffffff' }}"
                        alt="Foto de {{ auth()->user()->name ?? 'Administrador' }}">

                    <span class="hidden max-w-36 text-left sm:block">

                        <span class="block truncate text-sm font-bold text-slate-700">
                            {{ auth()->user()->name ?? 'Administrador' }}
                        </span>

                        <span class="block text-[10px] font-medium text-[#009fd4]">
                            Profesional
                        </span>

                    </span>

                    <span class="hidden h-4 w-4 text-slate-400 sm:block">
                        @include('layouts.partials.icons', ['icon' => 'chevron-down'])
                    </span>

                </button>

                {{-- OPCIONES DEL USUARIO --}}
                <div
                    x-show="open"
                    x-cloak
                    x-transition
                    @click.outside="open = false"
                    class="absolute right-0 mt-3 w-60 overflow-hidden rounded-2xl border border-slate-100 bg-white py-1 shadow-2xl">

                    <div class="bg-gradient-to-r from-[#063d69] to-[#0875bd] px-5 py-4">

                        <p class="truncate text-sm font-bold text-white">
                            {{ auth()->user()->name ?? 'Administrador' }}
                        </p>

                        <p class="mt-1 text-xs text-blue-100">
                            RENUEVA IPS
                        </p>

                    </div>

                    <div class="my-1 border-t border-slate-100"></div>

                    {{-- CERRAR SESIÓN --}}
                    <form method="POST" action="{{ route('logout') }}">

                        @csrf

                        <button
                            type="submit"
                            class="flex w-full items-center gap-3 px-5 py-3 text-left text-sm font-semibold text-red-500 transition hover:bg-red-50">

                            <i class="fa-solid fa-right-from-bracket w-4"></i>

                            Cerrar sesión

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</header>
