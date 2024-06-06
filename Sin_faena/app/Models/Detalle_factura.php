<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detalle_factura extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'detalle_factura';

    protected $fillable = [
        'id_factura',
        'id_servicio',
        'cantidad',
        'precio_unitario',
        'importe',
        'itbis'
    ];

    public function factura(){
        return $this->belongsTo(Factura::class)->withDefault();
    }
}
