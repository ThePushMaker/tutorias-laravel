<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarAlumnoRequest extends FormRequest
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
            'nombre' => "required",
            'correo' => "required|unique:alumnos,correo",
            'contraseña' => "required",
            'semestre' =>  "required",
            'numero_control' => "required|unique:alumnos,numero_control",
        ];
    }
}
