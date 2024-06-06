<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pedido';

    protected $fillable = [
        'id',
        'id_usuario',
        'descripcion_pedido',
        'fecha_pedido',
        'estado_pedido',
    ];

    public const STATUS = ['Abierto', 'En progreso', 'Cancelado', 'Completado', 'Pendiente'];
    

    public function detallePedidos() // CamelCase y plural
    {
        return $this->hasMany(Detalle_pedido::class, 'id_pedido');
    }

    public function facturas() // CamelCase y plural
    {
        return $this->hasMany(Factura::class, 'id_pedido');
    }

    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'detalle_pedido', 'id_pedido', 'id_servicio');
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}
