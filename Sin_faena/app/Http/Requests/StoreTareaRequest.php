<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTareaRequest extends FormRequest
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
                'titulo_tarea' => ['required'],
                'descripcion_tarea' => ['required'],
                'comenzar_tarea' => ['required'],
                'terminar_tarea' => ['required'],
                'prioridad_tarea' => ['required'],
                'estado_tarea' => ['required']
        ];
    }
}
