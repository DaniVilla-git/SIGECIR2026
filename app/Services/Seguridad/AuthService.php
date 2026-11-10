<?php

namespace App\Services\Seguridad;

use App\Repositories\Seguridad\UsuarioRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function __construct(private UsuarioRepository $usuarioRepository)
    {
    }

    public function autenticar(string $identificador, string $password, bool $recordar = false): bool
    {
        $usuario = $this->usuarioRepository->buscarPorIdentificador($identificador);

        if ($usuario === null || !Hash::check($password, $usuario->getAuthPassword())) {
            return false;
        }

        Auth::guard(config('seguridad.guard'))->login($usuario, $recordar);

        return true;
    }

    public function cerrarSesion(): void
    {
        Auth::guard(config('seguridad.guard'))->logout();
    }
}
