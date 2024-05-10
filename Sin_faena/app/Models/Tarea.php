<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarea extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tarea';

    protected $fillable = [
        'id',
        'id_usuario',
        'titulo_tarea',
        'descripcion_tarea',
        'comenzar_tarea',
        'terminar_tarea',
        'prioridad_tarea',
        'estado_tarea'
    ];

    public const STATUS = ['Abierto', 'En progreso', 'Cancelado', 'Completado'];

    public const PRIORITY = ['Alta', 'Media', 'Baja'];

    public function user(){
        return $this->belongsTo(User::class)->withDefault();
    }
}
