<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarSesionRequest extends FormRequest
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
            'fecha_reunion' => "required",
            'hora_reunion' => "required",
            'enlace_reunion' => "required",
            'mensaje' => "nullable",
            'tutoria_id' => "required"
        ];
    }
}
