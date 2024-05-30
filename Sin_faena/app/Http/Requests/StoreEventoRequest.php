<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventoRequest extends FormRequest
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
            'id_tipoEvento'=>['required'],
            'titulo_evento'=>['required'],
            'descripcion_evento'=>['required'],
            'anexos'=>['nullable'],
            'fecha_inicio'=>['required'],
            'fecha_fin'=>['required']
        ];
    }
}
