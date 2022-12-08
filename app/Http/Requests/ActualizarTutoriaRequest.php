<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarTutoriaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'temas' => "nullable",
            'fecha_reunion' => "required",
            'hora_reunion' => "required",
            'enlace_reunion' => "required",
            'estado' => "nullable",
            'capacidad_maxima' => "required",
            'materia_id' => "required",
            'tutor_id' => "required"
        ];
    }
}
