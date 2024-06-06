<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('FACTURA', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_fectura');
            $table->foreignId('id_pedido')->references('id')->on('pedido')->onDelete('cascade')->onUpdate('cascade');
            $table->float('subtotal');
            $table->float('total_itbis');
            $table->float('total_pagar');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('DETALLE_FACTURA', function (Blueprint $table) {
            $table->foreignId('id_factura')->references('id')->on('factura')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_servicio')->references('id')->on('servicio')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('cantidad');
            $table->float('precio_unitario');
            $table->float('importe');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factura');
        Schema::dropIfExists('detalle_factura');
    }
};
