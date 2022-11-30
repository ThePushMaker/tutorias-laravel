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
            'desc_temas_impartir' => "required",
            'horario_pref_sesiones' => "required",
            'capacidad_maxima' => "required",
            'estado' => "required",
            'materia_id' => "required",
            'tutor_id' => "required",
            'solicitud_id' => "required"
        ];
    }
}
