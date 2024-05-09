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
        Schema::create('DEPARTAMENTO', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_depto', 125);
            $table->string('descripcion_depto', 1500);

            $table->timestamps();
            $table->softDeletes();

        });

        Schema::create('PUESTO', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_puesto', 125);
            $table->string('descripcion_puesto', 1500);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DEPARTAMENTO');

        Schema::dropIfExists('PUESTO');
    }
};
