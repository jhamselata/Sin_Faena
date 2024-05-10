<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'empleado';

    protected $fillable = [
        'id',
        'id_usuario',
        'nombre_emp',
        'apellido_emp',
        'cedula',
        'telefono',
        'id_depto',
        'id_puesto',
        'estado_emp'
    ];

    public const STATUS = ['Activo', 'Licencia', 'Vacaciones', 'No disponible'];

    public function user(){
        return $this->belongsTo(User::class)->withDefault();
    }

    public function puesto(){
        return $this->belongsTo(Puesto::class)->withDefault();
    }

    public function departamento(){
        return $this->belongsTo(Departamento::class)->withDefault();
    }
}
