<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notificacion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'notificacion';

    protected $fillable = [
        'id',
        'id_usuario',
        'mensaje',
        'read_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
