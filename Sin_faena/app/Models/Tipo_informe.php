<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo_informe extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tipo_informe';

    protected $fillable = [
        'id',
        'nombre_tipoInforme',
        'descripcion_tipoInforme',
    ];

    public function tipo_informe(){
        return $this->hasmany(Informe::class)->withDefault();
    }   
}
