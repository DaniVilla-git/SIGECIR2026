<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ServiciosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
<<<<<<< HEAD
        return TRUE;
=======
        return true;
>>>>>>> Dev2-A
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
<<<<<<< HEAD
            'codigo_servicio' => 'required|string|max:255',
            'nombre_servicio' => 'required|string|max:255',
            'grupo_servicio' => 'required|string|max:255',
            
=======
            'codigo_servicio' => 'required|string|max:100',
            'nombre_servicio' => 'required|string|max:100',
            'grupo_servicio' => 'required|string|max:100',
            'id_profesional' => 'required|exists:profesionales,id',
>>>>>>> Dev2-A
        ];
    }
}
