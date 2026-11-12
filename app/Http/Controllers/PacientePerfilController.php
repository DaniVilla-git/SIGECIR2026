<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Models\usuarios;

class PacientePerfilController extends Controller
{
    // MOSTRAR FORMULARIO DE EDICIÓN
    public function edit()
    {
        $usuario = Auth::user();

        // BUSCAR EL REGISTRO DEL PACIENTE
        $paciente = usuarios::find($usuario->id_usuario);

        if (!$paciente) {
            abort(404, 'No se encontró el registro del paciente.');
        }

        return view('paciente.editar-perfil', compact('paciente'));
    }


    // ACTUALIZAR CORREO Y TELÉFONO
    public function update(Request $request)
    {
        $usuario = Auth::user();

        // BUSCAR EL PACIENTE RELACIONADO CON LA CUENTA
        $paciente = usuarios::find($usuario->id_usuario);

        if (!$paciente) {
            abort(404, 'No se encontró el registro del paciente.');
        }

        // VALIDAR INFORMACIÓN
        $datos = $request->validate([

            'correo_usuario' => [
                'required',
                'email',
                'max:255',

                Rule::unique('usuarios', 'correo_usuario')
                    ->ignore($paciente->id),

                Rule::unique('users', 'email')
                    ->ignore($usuario->id),
            ],

            'telefono_usuario' => [
                'required',
                'string',
                'max:20',
            ],

        ], [

            'correo_usuario.required' => 'El correo electrónico es obligatorio.',
            'correo_usuario.email' => 'Ingrese un correo electrónico válido.',
            'correo_usuario.unique' => 'Este correo electrónico ya está registrado.',

            'telefono_usuario.required' => 'El número de teléfono es obligatorio.',
            'telefono_usuario.max' => 'El teléfono no puede superar los 20 caracteres.',

        ]);

        // ACTUALIZAR AMBAS TABLAS
        DB::transaction(function () use ($paciente, $usuario, $datos) {

            // TABLA USUARIOS
            $paciente->correo_usuario = $datos['correo_usuario'];
            $paciente->telefono_usuario = $datos['telefono_usuario'];
            $paciente->save();

            // TABLA USERS
            $usuario->email = $datos['correo_usuario'];
            $usuario->save();

        });

        return redirect()
            ->route('paciente.perfil.edit')
            ->with('success', 'Tus datos fueron actualizados correctamente.');
    }
}
