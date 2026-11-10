<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Horario_profesionalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'dia_semana' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'id_profesional' => 'required|exists:profesionales,id',
        ];
    }

    public function messages(): array
    {
        return [
            'dia_semana.required' => 'Debe seleccionar una fecha.',
            'dia_semana.date' => 'La fecha seleccionada no es válida.',
            'hora_inicio.required' => 'Debe seleccionar la hora de inicio.',
            'hora_inicio.date_format' => 'La hora de inicio no tiene un formato válido.',
            'hora_fin.required' => 'Debe seleccionar la hora de finalización.',
            'hora_fin.date_format' => 'La hora de finalización no tiene un formato válido.',
            'hora_fin.after' => 'La hora de finalización debe ser posterior a la hora de inicio.',
            'id_profesional.required' => 'Debe seleccionar un profesional.',
            'id_profesional.exists' => 'El profesional seleccionado no existe.',
        ];
    }
}

