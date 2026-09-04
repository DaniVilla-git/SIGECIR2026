<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'primer_nombre' => 'required|string|max:255',
            'segundo_nombre' => 'required|string|max:255',
            'primer_apellido' => 'required|string|max:255',
            'segundo_apellido' => 'required|string|max:255',
            'telefono_usuario' => 'required|string|max:255',
            'correo_usuario' => 'required|string|max:255',
            'eps_usuario' => 'required|string|max:255',
            'regimen_usuario' => 'required|string|max:255',
            'fecha_registro' => 'required|string|max:255',
            'usuario_registro' => 'required|string|max:255',

        ];
            
    }
}
