<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Informe extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'informe';

    protected $fillable = [
        'id',
        'fecha_informe',
        'id_remitente',
        'id_destinatario',
        'id_tipoInforme',
        'titulo_informe',
        'descripcion_informe'
    ];

    public function informe(){
        return $this->belongsTo(Tipo_informe::class)->withDefault();
    }   

    public function user(){
        return $this->belongsTo(User::class)->withDefault();
    }   
}
