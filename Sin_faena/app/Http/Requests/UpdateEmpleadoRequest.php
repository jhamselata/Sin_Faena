<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmpleadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' =>['nullable'],
            'id_usuario' =>['required'],
            'nombre_emp' => ['required'],
            'apellido_emp' => ['required'],
            'cedula' => ['required'],
            'telefono' => ['required'],
            'id_depto' => ['required'],
            'id_puesto' => ['required'],
            'estado_emp' => ['required']
        ];
    }
}
