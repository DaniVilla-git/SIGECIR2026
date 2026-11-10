<?php

namespace App\Http\Controllers\Seguridad;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RegistroPacienteController extends Controller
{
    public function create()
    {
        return view('seguridad.registro');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'documento_identidad' => ['required', 'string', 'max:30', 'unique:usuarios,documento_identidad'],

            'primer_nombre' => ['required', 'string', 'max:100'],
            'segundo_nombre' => ['nullable', 'string', 'max:100'],
            'primer_apellido' => ['required', 'string', 'max:100'],
            'segundo_apellido' => ['nullable', 'string', 'max:100'],

            'telefono_usuario' => ['required', 'string', 'max:30'],

            'correo_usuario' => ['required', 'email', 'max:255', 'unique:users,email'],

            'eps_usuario' => ['required', 'string', 'max:150'],
            'regimen_usuario' => ['required', 'string', 'max:100'],

            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        DB::transaction(function () use ($datos) {

            // Guardar los datos personales del paciente
            $paciente = usuarios::create([
                'documento_identidad' => $datos['documento_identidad'],
                'primer_nombre' => $datos['primer_nombre'],
                'segundo_nombre' => $datos['segundo_nombre'] ?? '',
                'primer_apellido' => $datos['primer_apellido'],
                'segundo_apellido' => $datos['segundo_apellido'] ?? '',
                'telefono_usuario' => $datos['telefono_usuario'],
                'correo_usuario' => $datos['correo_usuario'],
                'eps_usuario' => $datos['eps_usuario'],
                'regimen_usuario' => $datos['regimen_usuario'],
                'fecha_registro' => now()->toDateString(),
                'usuario_registro' => 'REGISTRO WEB',
            ]);

            // Crear la cuenta de acceso
            $cuenta = User::create([
                'name' => $datos['primer_nombre'] . ' ' . $datos['primer_apellido'],
                'email' => $datos['correo_usuario'],
                'password' => Hash::make($datos['password']),
                'id_usuario' => $paciente->id,
            ]);

            // Asignar el rol de paciente
            $rol = Role::firstOrCreate(
                [
                    'name' => 'Paciente',
                    'guard_name' => config('seguridad.guard'),
                ],
                [
                    'activo' => true,
                ]
            );

            $cuenta->assignRole($rol);
        });

        return redirect()->route('login')
            ->with('success', 'Tu registro se realizó correctamente. Ya puedes iniciar sesión.');
    }
}
