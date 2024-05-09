<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\text;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('TIPO_EVENTO');

        Schema::create('TIPO_EVENTO', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_tipoEvento', 49);
            $table->string('descripcion_tipoEvento', 1500);

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::dropIfExists('EVENTO');

        Schema::create('EVENTO', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tipoEvento')->references('id')->on('tipo_evento')->onDelete('cascade')->onUpdate('cascade');
            $table->string('titulo_evento', 49);
            $table->string('descripcion_evento', 2500);
            $table->text('anexos');
            $table->timestamp('fecha_inicio');
            $table->datetime('fecha_fin');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::dropIfExists('ANOTACION_EVENTO');

        Schema::create('ANOTACION_EVENTO', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_evento')->references('id')->on('evento')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_usuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('titulo_anotacion', 49);
            $table->string('descripcion_anotacion', 2500);
            $table->timestamp('fecha_anotacion');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::dropIfExists('AGENDA');

        Schema::create('AGENDA', function (Blueprint $table) {
            $table->foreignId('id_usuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_evento')->references('id')->on('evento')->onDelete('cascade')->onUpdate('cascade');
            $table->string('asistencia', 49)->default('Pendiente');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TIPO_EVENTO');
    }
};
