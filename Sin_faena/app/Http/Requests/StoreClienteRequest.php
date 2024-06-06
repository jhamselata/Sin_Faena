<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
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
            'id_usuario' => ['required'],
            'id_tipoCliente' => ['nullable'],
            'nombre_cli' => ['required'],
            'apellido_cli'=> ['nullable'],
            'rnc_cli' => ['nullable'],
            'telefono_cli' => ['required'],
            'estado_cli' => ['nullable'],
            'preferencia_comunicacion'=> ['nullable'],
            'otra_via_comunicacion' => ['nullable']
        ];
    }
}
