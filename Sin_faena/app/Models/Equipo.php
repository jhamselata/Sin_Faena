<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $table = 'equipo';

    protected $fillable =
    [
        'id',
        'id_tipoEquipo',
        'nombre_equipo'
    ];
}
