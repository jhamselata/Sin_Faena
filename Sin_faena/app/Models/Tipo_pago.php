<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo_pago extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tipo_pago';

    protected $fillable = [
        'id',
        'nombre_tipoPago',
        'descripcion_tipoPago',
    ];

    /*public function factura(){
        return $this->hasmany(Factura::class)->withDefault();
    }*/
}
