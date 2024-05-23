<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoEvento extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tipo_evento';

    protected $fillable = [
        'id',
        'nombre_tipoEvento',
        'descripcion_tipoEvento',
    ];

    public function evento(){
        return $this->hasmany(Evento::class)->withDefault();
    }

}
