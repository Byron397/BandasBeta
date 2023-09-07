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
        Schema::create('bandas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->references('id')->on('usuarios');
            $table->string('nombre',80);
            $table->string('genero',80);
            $table->string('descripcion',200);
            $table->string('redes_sociales',500);
            $table->string('zona',80);
            $table->string('contacto',80);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bandas');
    }
};
