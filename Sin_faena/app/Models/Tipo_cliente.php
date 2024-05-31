<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo_cliente extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tipo_cliente';

    protected $fillable = [
        'id',
        'nombre_tipoCli',
        'descripcion_tipoCli',
    ];

    public function tipo_cliente(){
        return $this->hasmany(Cliente::class)->withDefault();
    }   

}
