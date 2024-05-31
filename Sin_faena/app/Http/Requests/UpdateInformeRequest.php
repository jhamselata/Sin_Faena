<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInformeRequest extends FormRequest
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
            'id' => ['nullable'],
            'fecha_informe' => ['required'],
            'id_remitente' => ['required'],
            'id_destinatario' => ['required'],
            'id_tipoInforme' => ['required'],
            'titulo_informe' => ['required'],
            'descripcion_informe' => ['required']
        ];
    }
}
