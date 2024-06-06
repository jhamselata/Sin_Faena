<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factura extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'factura';

    protected $fillable = [
        'id',
        'fecha_factura',
        'id_pedido',
        'subtotal',
        'total_itbis',
        'total_pagar'
    ];

    public function detalleFacturas(){
        return $this->hasmany(Detalle_factura::class)->withDefault();
    }

    public function pedidos(){
        return $this->belongsTo(Pedido::class)->withDefault();
    }
}
