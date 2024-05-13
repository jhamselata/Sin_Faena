<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo_servicio extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'tipo_servicio';

    protected $fillable = [
        'id',
        'nombre_tipoServicio',
        'descripcion_tipoServicio'
    ];
    
    public function tipo_servicio() {
        return $this->hasmany(Servicio::class)->withDefault();  
    }

}
