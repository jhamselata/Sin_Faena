<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'evento';

    protected $fillable = [
        'id',
        'id_tipoEvento',
        'titulo_evento',
        'descripcion_evento',
        'anexos',
        'fecha_inicio',
        'fecha_fin'
    ];

    public function tipoevento() {
        return $this->belongsTo(TipoEvento::class)->withDefault();
    }
}
