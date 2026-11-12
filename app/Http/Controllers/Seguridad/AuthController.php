<?php

namespace App\Http\Controllers\Seguridad;

use App\Http\Controllers\Controller;
use App\Services\Seguridad\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }

    /*
    |--------------------------------------------------------------------------
    | INICIO DE SESIÓN
    |--------------------------------------------------------------------------
    */

    public function showLoginForm(): View
    {
        return view('welcome');
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

        if ($usuario->hasRole('Paciente')) {
            return redirect()->route('paciente.inicio');
        }

        if ($usuario->hasRole('profesional')) {
            return redirect()->route('profesionales.dashboard');
        }

        if ($usuario->hasRole(config('seguridad.rol_admin'))) {
            return redirect()->route('dashboard.index');
        }

        $this->authService->cerrarSesion();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->withErrors([
            'identificador' => 'Tu cuenta no tiene un rol autorizado para ingresar.'
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | RECUPERACIÓN DE CONTRASEÑA
    |--------------------------------------------------------------------------
    */

    // Mostrar formulario para solicitar recuperación
    public function mostrarFormularioRecuperacion(): View
    {
        return view('auth.passwords.email');
    }

    // Enviar enlace de recuperación al correo
    public function enviarEnlaceRecuperacion(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ], [
            'email.required' => 'Debes ingresar tu correo electrónico.',
            'email.email' => 'Ingresa un correo electrónico válido.',
        ]);

        $estado = Password::broker('users')->sendResetLink(
            $request->only('email')
        );

        return $estado === Password::RESET_LINK_SENT
            ? back()->with(
                'status',
                'Te hemos enviado un enlace para restablecer tu contraseña.'
            )
            : back()->withErrors([
                'email' => 'No encontramos una cuenta registrada con ese correo electrónico.'
            ]);
    }

    // Mostrar formulario para establecer una nueva contraseña
    public function mostrarFormularioRestablecimiento(string $token): View
    {
        return view('auth.passwords.reset', [
            'token' => $token,
            'email' => request()->query('email'),
        ]);
    }

    // Guardar la nueva contraseña
    public function restablecerContrasena(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ], [
            'email.required' => 'Debes ingresar tu correo electrónico.',
            'email.email' => 'El correo no es válido.',
            'password.required' => 'Debes ingresar una contraseña.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener mínimo 8 caracteres.',
        ]);

        $estado = Password::broker('users')->reset(
            $request->only(
                'email',
                'password',
                'password_confirmation',
                'token'
            ),

            function ($usuario, $password) {
                $usuario->forceFill([
                    'password' => $password,
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($usuario));
            }
        );

        return $estado === Password::PASSWORD_RESET
            ? redirect()->route('login')->with(
                'status',
                'Tu contraseña se ha actualizado correctamente.'
            )
            : back()->withErrors([
                'email' => 'El enlace de recuperación no es válido o ha expirado.'
            ]);
    }

    /*
    |--------------------------------------------------------------------------
    | CERRAR SESIÓN
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request): RedirectResponse
    {
        $this->authService->cerrarSesion();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
