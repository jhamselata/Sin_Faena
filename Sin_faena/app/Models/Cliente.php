<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'cliente';

    protected $fillable = [
        'id',
        'id_usuario',
        'id_tipoCliente',
        'nombre_cli',
        'apellido_cli',
        'rnc_cli',
        'telefono_cli',
        'estado_cli',
        'preferencia_comunicacion',
        'otra_via_comunicacion'
    ];

    public const STATUS = ['Activo', 'Inactivo'];

    public const COMUNICATION = ['Reunión Virtual', 'Reunión Presencial', 'Comunicación por otro medio'];
    public function user(){
        return $this->belongsTo(User::class)->withDefault();
    }

    public function tipo_cliente(){
        return $this->belongsTo(Tipo_cliente::class)->withDefault();
    }
}
