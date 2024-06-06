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
    
    // Relación inversa con TipoServicio
    public function tipoServicio() {
        return $this->belongsTo(Tipo_servicio::class, 'id_tipoServicio')->withDefault();
    }

    // Relación con DetallePedido (corregido el nombre de la clase)
    public function detallePedidos(){
        return $this->hasMany(Detalle_pedido::class, 'id_servicio')->withDefault();
    }
}
