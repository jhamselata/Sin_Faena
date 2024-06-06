<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Tipo_cliente;

class PostModelFunctionalityTest extends TestCase
{
    /**
     * A basic unit test example.
     */


    public function test_attributes_are_set_correctly()
    {
        // create a new post instance with attributes
        $tipo_cliente = new Tipo_cliente([
            'nombre_tipoCli' => 'Corporativo',
            'descripcion_tipoCli' => 'Cliente dueño de una o varias empresas',
        ]);

        // check if you set the attributes correctly
        $this->assertEquals('Corporativo', $tipo_cliente->nombre_tipoCli);
        $this->assertEquals('Cliente dueño de una o varias empresas', $tipo_cliente->descripcion_tipoCli);
    }

    public function test_non_fillable_attributes_are_not_set()
    {
        // Attempt to create a post with additional attributes (non-fillable)
        $tipo_cliente = new Tipo_cliente([
            'nombre_tipoCli' => 'Ejemplo - Corporativo',
            'descripcion_tipoCli' => 'Ejemplo - cliente dueño de una o varias empresas',
            'author' => 'John Doe',
        ]);

        // check that the non-fillable attribute is not set on the post instance
        $this->assertArrayNotHasKey('author', $tipo_cliente->getAttributes());
    }
}
