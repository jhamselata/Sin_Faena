<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Pedido;

class PedidoModelFunctionalityTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_attributes_are_set_correctly()
    {
        // create a new post instance with attributes
        $pedido = new Pedido([
            'id_usuario' => '1',
            'descripcion_pedido' => 'Quiero que me administren las redes sociales',
            'fecha_pedido' => '2024-05-15',
            'estado_pedido' => 'Abierto',
        ]);

        // check if you set the attributes correctly
        $this->assertEquals('1', $pedido->id_usuario);
        $this->assertEquals('Quiero que me administren las redes sociales', $pedido->descripcion_pedido);
        $this->assertEquals('2024-05-15', $pedido->fecha_pedido);
        $this->assertEquals('Abierto', $pedido->estado_pedido);
    }

    public function test_non_fillable_attributes_are_not_set()
    {
        // Attempt to create a post with additional attributes (non-fillable)
        $pedido = new Pedido([
            'id_usuario' => '1',
            'descripcion_pedido' => 'Quiero que me administren las redes sociales',
            'fecha_pedido' => '2024-05-15',
            'estado_pedido' => 'Abierto',
            'author' => 'John Doe',
        ]);

        // check that the non-fillable attribute is not set on the post instance
        $this->assertArrayNotHasKey('author', $pedido->getAttributes());
    }
}
