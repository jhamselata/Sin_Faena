<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoEquipo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tipo_equipo';

    protected $fillable =
    [
        'id',
        'nombre_tipoEquipo',
        'descripcion_tipoEquipo'
    ];

    public function tipo_equipo(){
        return $this->hasmany(Equipo::class)->withDefault();
    }
}
