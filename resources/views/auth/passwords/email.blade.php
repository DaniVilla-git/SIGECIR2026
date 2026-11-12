<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña | SIGECIR</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-slate-100 p-5">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">

        <div class="text-center mb-7">
            <h1 class="text-2xl font-bold text-[#063d69]">
                Recuperar contraseña
            </h1>

            <p class="text-gray-500 mt-2 text-sm">
                Ingresa tu correo electrónico registrado para recibir
                el enlace de recuperación.
            </p>
        </div>

        @if(session('status'))
            <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4 text-sm">
                {{ session('status') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST">
            @csrf

            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Correo electrónico
            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                placeholder="Ingresa tu correo"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
            >

            <button
                type="submit"
                class="w-full mt-5 bg-[#0875bd] hover:bg-[#063d69] text-white font-semibold py-3 rounded-lg transition">
                Enviar enlace de recuperación
            </button>
        </form>

        <div class="text-center mt-6">
            <a href="{{ route('login') }}"
               class="text-[#0875bd] font-semibold text-sm hover:underline">
                Volver al inicio de sesión
            </a>
        </div>

    </div>

</body>
</html>
