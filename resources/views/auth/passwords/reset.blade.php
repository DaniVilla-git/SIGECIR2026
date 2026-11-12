<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva contraseña | SIGECIR</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-slate-100 p-5">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">

        <div class="text-center mb-7">
            <h1 class="text-2xl font-bold text-[#063d69]">
                Crear nueva contraseña
            </h1>

            <p class="text-gray-500 mt-2 text-sm">
                Ingresa y confirma tu nueva contraseña.
            </p>
        </div>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('password.update') }}" method="POST">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Correo electrónico
            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email', $email) }}"
                required
                class="w-full border border-gray-300 rounded-lg px-4 py-3 mb-4"
            >

            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Nueva contraseña
            </label>

            <input
                type="password"
                name="password"
                required
                minlength="8"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 mb-4"
                placeholder="Mínimo 8 caracteres"
            >

            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Confirmar contraseña
            </label>

            <input
                type="password"
                name="password_confirmation"
                required
                minlength="8"
                class="w-full border border-gray-300 rounded-lg px-4 py-3"
                placeholder="Repite tu contraseña"
            >

            <button
                type="submit"
                class="w-full mt-5 bg-[#0875bd] hover:bg-[#063d69] text-white font-semibold py-3 rounded-lg transition">
                Actualizar contraseña
            </button>
        </form>

    </div>

</body>
</html>
