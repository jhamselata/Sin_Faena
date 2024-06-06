<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cliente_servicio';

    protected $fillable = [
        'id',
        'nombre',
        'correo',
        'telefono',
        'preferencia_comunicacion',
        'otra_via_comunicacion',
    ];

    public function servicios_web()
    {
        return $this->hasMany(ServiciosWeb::class, 'id_clientServ');
    }
}
