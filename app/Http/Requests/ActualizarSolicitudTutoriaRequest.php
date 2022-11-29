<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarSolicitudTutoriaRequest extends FormRequest
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
            'comentario' => "nullable",
            'promedio_obtenido' => "required",
            'estado' => "required",
            'materia_id' => "required",
            'tutor_id' => "required",
            'maestro_id' => "required"
        ];
    }
}
