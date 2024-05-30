<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'equipo';

    protected $fillable =
    [
        'id',
        'id_tipoEquipo',
        'nombre_equipo'
    ];

    public function tipoequipo()
    {
        return $this->belongsTo(TipoEquipo::class)->withDefault();
    }
}
