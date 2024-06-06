<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiciosWeb extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'servicios_web';

    protected $fillable = [
        'id',
        'id_clientServ',
        'colores',
        'plataformas',
        'estilo_diseno',
        'frecuencia_publicacion',
        'formatos_entrega',
        'fecha_aproximada',
        'idea',
        'otro',
    ];

    public function cliente_servicio()
    {
        return $this->belongsTo(ClienteServicio::class, 'id_clientServ');
    }
}
