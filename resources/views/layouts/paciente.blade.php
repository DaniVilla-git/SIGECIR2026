<!DOCTYPE html>
<html lang="es" class="h-full bg-slate-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('titulo', 'Portal del Paciente') | RENUEVA IPS</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: Inter, ui-sans-serif, system-ui, sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-slate-50 text-slate-800">

    <header class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">

            <div class="flex items-center gap-3">
                <img src="{{ asset('images/LogoSIGECIR.png') }}"
                     alt="RENUEVA IPS"
                     class="w-14 h-14 object-contain">

                <div>
                    <h1 class="text-xl font-bold text-sky-800">
                        SIGECIR 
                    </h1>
                    <p class="text-sm text-gray-500">
                        RENUEVA IPS
                    </p>
                </div>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-semibold">
                    Cerrar sesión
                </button>
            </form>

        </div>
    </header>

    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="text-center text-sm text-gray-500 py-6">
        © {{ date('Y') }} RENUEVA IPS - SIGECIR
    </footer>

</body>
</html>
