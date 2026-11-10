<?php

namespace App\Http\Controllers\Seguridad;

use App\Http\Controllers\Controller;
use App\Services\Seguridad\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class AuthController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }

    public function showLoginForm(): View
    {
        return view('seguridad.login');
    }

    
    public function login(Request $request): RedirectResponse
    {
        $credenciales = $request->validate([
            'identificador' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $autenticado = $this->authService->autenticar(
            $credenciales['identificador'],
            $credenciales['password'],
            $request->boolean('remember')
        );

        if (!$autenticado) {
            return back()
                ->withErrors([
                    'identificador' => 'Los datos ingresados no coinciden con nuestros registros.'
                ])
                ->onlyInput('identificador');
        }

        $request->session()->regenerate();

        $usuario = $request->user();

        // Acceso del paciente
        if ($usuario->hasRole('Paciente')) {
            return redirect()->route('paciente.inicio');
        }

        // Acceso del profesional
        if ($usuario->hasRole('profesional')) {
            return redirect()->route('profesionales.dashboard');
        }

        // Acceso del administrador
        if ($usuario->hasRole(config('seguridad.rol_admin'))) {
            return redirect()->route('dashboard.index');
        }

        // Cuentas sin un rol autorizado
        $this->authService->cerrarSesion();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->withErrors([
            'identificador' => 'Tu cuenta no tiene un rol autorizado para ingresar.'
        ]);
    }


    public function logout(Request $request): RedirectResponse
    {
        $this->authService->cerrarSesion();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

