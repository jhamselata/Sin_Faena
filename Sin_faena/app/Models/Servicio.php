<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servicio extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'servicio';

    protected $fillable = [
        'id',
        'id_tipoServicio',
        'nombre_servicio',
        'descripcion_servicio',
        'precio_servicio',
        'duracion_estimada'
    ];
    
    public function servicio() {
        return $this->belongsTo(Servicio::class)->withDefault();
    }

    public function Detalle_pedido(){
        return $this->hasmany(Detalle_pedido::class)->withDefault();
    }

}
