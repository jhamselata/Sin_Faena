<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Puesto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'puesto';

    protected $fillable = [
        'id',
        'nombre_puesto',
        'descripcion_puesto',
    ];

    public function puesto(){
        return $this->hasmany(Empleado::class)->withDefault();
    }
}
