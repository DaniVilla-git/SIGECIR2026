<!DOCTYPE html>
<html lang="es" class="h-full bg-slate-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta
        name="description"
        content="SIGECIR - Sistema de Gestión de Citas de RENUEVA IPS"
    >

    <title>
        @yield('title')SIGECIR - RENUEVA IPS
    </title>

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Colores institucionales de SIGECIR --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#e6f7fc',
                            100: '#cceef8',
                            200: '#99ddf1',
                            300: '#66cbea',
                            400: '#33b9e3',
                            500: '#009fd4',
                            600: '#0875bd',
                            700: '#0860a5',
                            800: '#084f87',
                            900: '#063d69'
                        },

                        turquoise: '#33C4D0',
                        green: '#20A447',
                        pink: '#E60073'
                    },

                    fontFamily: {
                        sans: [
                            'Inter',
                            'ui-sans-serif',
                            'system-ui',
                            'sans-serif'
                        ]
                    }
                }
            }
        }
    </script>

    {{-- Fuente Inter --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    {{-- Chart.js para las páginas que utilizan gráficas --}}
    <script
        src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"
        defer
    ></script>

    {{-- Estilos generales --}}
    <style>
        [x-cloak] {
            display: none !important;
        }

        body {
            font-family: 'Inter', ui-sans-serif, system-ui, sans-serif;
        }
    </style>

    @stack('styles')
</head>

<body class="min-h-full bg-slate-50 text-slate-800 antialiased">

    {{-- Contenedor general de SIGECIR --}}
    <div x-data="{ sidebarOpen: false }" class="min-h-screen">

        {{-- Fondo oscuro al abrir el menú en dispositivos móviles --}}
        <div
            x-show="sidebarOpen"
            x-cloak
            x-transition.opacity
            @click="sidebarOpen = false"
            class="fixed inset-0 z-30 bg-slate-900/50 lg:hidden"
            aria-hidden="true"
        ></div>

        {{-- Menú lateral --}}
        @include('layouts.partials.sidebar')

        {{-- Área principal --}}
        <div class="min-h-screen flex flex-col lg:pl-64">

            {{-- Barra superior --}}
            @include('layouts.partials.navbar')

            {{-- Contenido de las páginas --}}
            <main class="flex-1 min-w-0 p-4 sm:p-6 lg:p-8">

                {{-- Mensaje de operación exitosa --}}
                @if (session('success'))
                    <x-alert type="success" class="mb-6">
                        {{ session('success') }}
                    </x-alert>
                @endif

                {{-- Mensaje de error --}}
                @if (session('error'))
                    <x-alert type="error" class="mb-6">
                        {{ session('error') }}
                    </x-alert>
                @endif

                {{-- Contenido dinámico de cada módulo --}}
                @yield('content')

            </main>

            {{-- Pie de página --}}
            @include('layouts.partials.footer')

        </div>
    </div>

    {{-- Alpine.js: menú móvil, notificaciones y usuario --}}
    <script
        src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"
        defer
    ></script>

    {{-- Scripts particulares de cada página --}}
    @stack('scripts')

</body>
</html>
