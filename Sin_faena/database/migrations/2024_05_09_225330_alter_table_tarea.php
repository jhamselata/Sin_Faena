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
        Schema::table('tarea', function (Blueprint $table) {
            $table->renameColumn('comenzae_tarea', 'comenzar_tarea'); 
            $table->string('terminar_tarea')->change(); // Cambiar el tipo de dato a string
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
