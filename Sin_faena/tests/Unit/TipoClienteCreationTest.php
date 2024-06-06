<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Tipo_cliente;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TipoClienteCreationTest extends TestCase
{
    /**
     * A basic unit test example.
     */

    use RefreshDatabase;

    public function testTipoClienteCreation()
    {
        // Create a new tipo_cliente and save it to the database
        $tipo_cliente = new Tipo_cliente([
            'nombre_tipoCli' => 'Corporativo',
            'descripcion_tipoCli' => 'Cliente dueño de una o varias empresas',
        ]);
        $tipo_cliente->save();

        // Retrieve the tipo_cliente from the database and assert its existence
        $createdTipoCliente = Tipo_cliente::find($tipo_cliente->id);
        $this->assertNotNull($createdTipoCliente);
        $this->assertEquals('Corporativo', $createdTipoCliente->nombre_tipoCli);
    }
}

