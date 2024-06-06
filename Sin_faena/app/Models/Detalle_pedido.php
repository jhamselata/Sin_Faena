<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detalle_pedido extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'detalle_pedido';

    protected $fillable = [
        'id_pedido',
        'id_servicio',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido')->withDefault();
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_servicio')->withDefault();
    }
}
