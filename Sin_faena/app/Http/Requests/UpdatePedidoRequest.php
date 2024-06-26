<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePedidoRequest extends FormRequest
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
        'descripcion_pedido' => ['required'],
        'fecha_pedido' => ['required'],
        'estado_pedido' => ['required'],
        'plataformas'=> ['required'],
        'estilo_diseno'=> ['required'],
        'frecuencia_publicacion'=> ['required'],
        'formato_entrega'=> ['required'],
        'colores'=> ['required'],
        'credenciales'=> ['required']
        ];
    }
}
