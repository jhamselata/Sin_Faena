<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Empleado;

class EmpleadoModelFunctionalityTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_attributes_are_set_correctly()
    {
        // create a new post instance with attributes
        $empleado = new Empleado([
            'id_usuario' => '1',
            'nombre_emp' => 'Julian',
            'apellido_emp' => 'Ozoria',
            'cedula' => '402-1583898-2',
            'telefono' => '829-584-9825',
            'id_depto' => '1',
            'id_puesto' => '1',
            'estado_emp' => 'Inactivo',
        ]);

        // check if you set the attributes correctly
        $this->assertEquals('1', $empleado->id_usuario);
        $this->assertEquals('Julian', $empleado->nombre_emp);
        $this->assertEquals('Ozoria', $empleado->apellido_emp);
        $this->assertEquals('402-1583898-2', $empleado->cedula);
        $this->assertEquals('829-584-9825', $empleado->telefono);
        $this->assertEquals('1', $empleado->id_depto);
        $this->assertEquals('1', $empleado->id_puesto);
        $this->assertEquals('Inactivo', $empleado->estado_emp);

    }

    public function test_non_fillable_attributes_are_not_set()
    {
        // Attempt to create a post with additional attributes (non-fillable)
        $empleado = new Empleado([
           'id_usuario' => '1',
            'nombre_emp' => 'Julian',
            'apellido_emp' => 'Ozoria',
            'cedula' => ' 402-1583898-2',
            'telefono' => '829-584-9825',
            'id_depto' => '1',
            'id_puesto' => '1',
            'estado_emp' => 'Inactivo',
            'author' => 'John Doe',
        ]);

        // check that the non-fillable attribute is not set on the post instance
        $this->assertArrayNotHasKey('author', $empleado->getAttributes());
    }
}
