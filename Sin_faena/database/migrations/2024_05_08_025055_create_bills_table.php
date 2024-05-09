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

        Schema::create('TIPO_PAGO', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_tipoPago', 49);
            $table->string('descripcion_tipoPago', 1500);

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('BANCO', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_banco', 100);
            $table->string('rnc', 13);
            $table->string('telefono_banco', 12);
            $table->string('correo', 255);
         
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('FACTURA', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_fectura');
            $table->foreignId('id_tipoPago')->references('id')->on('tipo_pago')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_banco')->references('id')->on('banco')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('numero_cuenta', 20)->nullable();
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
            $table->float('itbis');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_pago');

        Schema::dropIfExists('banco');

        Schema::dropIfExists('factura');
        
        Schema::dropIfExists('detalle_factura');
    }
};
