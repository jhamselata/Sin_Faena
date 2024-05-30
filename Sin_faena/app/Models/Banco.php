<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banco extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'banco';

    protected $fillable = [
        'id',
        'nombre_banco',
        'rnc',
        'telefono_banco',
        'correo'
    ];

    /*public function factura(){
        return $this->hasmany(Factura::class)->withDefault();
    }*/
}
