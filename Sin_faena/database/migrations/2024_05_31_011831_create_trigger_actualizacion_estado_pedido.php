<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerActualizacionEstadoPedido extends Migration
{
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER trg_after_update_estado_pedido
            AFTER UPDATE ON pedido
            FOR EACH ROW
            BEGIN
                IF NEW.estado_pedido != OLD.estado_pedido THEN
                    INSERT INTO notificacion (id_usuario, mensaje)
                    VALUES (NEW.id_usuario, CONCAT("El estado de tu pedido ha cambiado a ", NEW.estado_pedido));
                END IF;
            END;
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_update_estado_pedido');
    }
}

