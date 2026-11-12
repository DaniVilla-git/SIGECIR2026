
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Panel del profesional')</title>

    <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
            <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --verde: #20A447;
            --verde-oscuro: #188638;
            --verde-claro: #EAF7EE;
            --fondo: #F4F8F5;
            --texto: #26352B;
            --gris: #718078;
            --blanco: #FFFFFF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: var(--fondo);
            color: var(--texto);
        }

        .contenedor {
            display: flex;
            min-height: 100vh;
        }

        /* BARRA LATERAL */
        .menu {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            min-height: 100vh;
            overflow-y: auto;
            background: #FFFFFF;
            border-right: 1px solid #E4EDE6;
            padding: 25px 16px;
            display: flex;
            flex-direction: column;
            z-index: 50;
            box-shadow: 3px 0 15px rgba(0,0,0,0.03);
        }

        .marca {
            text-align: center;
            padding-bottom: 25px;
            border-bottom: 1px solid #E8EFEA;
            margin-bottom: 25px;
        }

        .marca img {
            width: 75px;
            height: 75px;
            object-fit: contain;
            margin-bottom: 8px;
        }

        .marca h2 {
            color: var(--verde-oscuro);
            font-size: 23px;
            font-weight: 800;
        }

        .marca p {
            color: var(--gris);
            font-size: 13px;
            margin-top: 4px;
        }

        .titulo-menu {
            color: #94A39A;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 10px 12px;
        }

        .enlace-menu {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 14px;
            margin-bottom: 7px;
            border-radius: 10px;
            color: #526158;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s;
        }

        .enlace-menu:hover,
        .enlace-menu.activo {
            background: var(--verde-claro);
            color: var(--verde-oscuro);
        }

        .icono-menu {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .nota-menu {
            margin-top: auto;
            padding: 15px;
            background: var(--verde-claro);
            border-radius: 12px;
            color: #55705D;
            font-size: 12px;
            line-height: 1.6;
        }

        .nota-menu strong {
            color: var(--verde-oscuro);
        }

        /* CONTENIDO PRINCIPAL */
        .principal {
            margin-left: 250px;
            width: calc(100% - 250px);
            min-height: 100vh;
            padding: 25px 30px;
            display: flex;
            flex-direction: column;
        }

        .contenido {
            width: 100%;
            flex: 1;
        }

        .encabezado {
            background: var(--blanco);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 25px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.04);
        }

        .encabezado h1 {
            color: var(--verde-oscuro);
            font-size: 25px;
            margin-bottom: 7px;
        }

        .encabezado p {
            color: var(--gris);
            font-size: 14px;
        }

        .tarjetas,
        .estadisticas {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .tarjeta {
            background: var(--blanco);
            border-radius: 15px;
            padding: 22px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.04);
            border: 1px solid #EAF0EB;
        }

        .tarjeta h3 {
            font-size: 15px;
            color: #68766D;
            margin-bottom: 12px;
        }

        .tarjeta p {
            color: var(--verde-oscuro);
            font-size: 27px;
            font-weight: 800;
        }

        .tarjeta i {
            color: var(--verde);
            font-size: 22px;
            margin-bottom: 14px;
        }

        .seccion {
            background: var(--blanco);
            border-radius: 15px;
            padding: 24px;
            margin-bottom: 22px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.04);
        }

        .seccion h2 {
            color: var(--verde-oscuro);
            font-size: 19px;
            margin-bottom: 18px;
        }

        .pie {
            text-align: center;
            color: #89968D;
            font-size: 12px;
            padding: 20px 0 5px;
        }

        .boton {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--verde);
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 9px;
            padding: 11px 17px;
            font-weight: 600;
            cursor: pointer;
        }

        .boton:hover {
            background: var(--verde-oscuro);
        }

        @media (max-width: 800px) {
            .contenedor {
                flex-direction: column;
            }

            .menu {
                width: 100%;
                min-width: 0;
                min-height: auto;
            }

            .principal {
                padding: 18px;
            }

            .nota-menu {
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="min-h-screen bg-slate-50">

        {{-- BARRA LATERAL --}}
        @include('layouts.profesional-lateral')

        {{-- CONTENIDO PRINCIPAL --}}
        <div class="min-h-screen min-w-0 flex flex-col lg:ml-64">

            {{-- BARRA SUPERIOR --}}
            @include('layouts.nav-profesional')

            {{-- CONTENIDO DE CADA PÁGINA --}}
            <main class="flex-1 w-full px-4 py-6 sm:px-6 lg:px-8">

                @yield('content')

            </main>

            {{-- PIE DE PÁGINA --}}
            <footer class="w-full border-t border-slate-200 bg-white px-6 py-4 text-center text-sm text-slate-500">
                Sistema SIGECIR - RENUEVA IPS
            </footer>

        </div>

    </div>

    @stack('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
