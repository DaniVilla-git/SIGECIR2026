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

        if ($request->user()->hasRole('Paciente')) {
            return redirect()->route('paciente.inicio');
        }
        return redirect()->intended(route('dashboard.index'));
    }

    public function logout(Request $request): RedirectResponse
    {
        $this->authService->cerrarSesion();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

