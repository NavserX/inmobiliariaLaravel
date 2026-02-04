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
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->id();
            $table->string('numcat', 25)->unique();
            $table->string('direccion');
            $table->integer('numero')->nullable()->default(0);
            $table->char('bloque')->nullable();
            $table->integer('piso')->nullable();
            $table->char('puerta')->nullable();
            $table->string('cod_ciudad',6);
            $table->foreign('cod_ciudad')->references('cod_ciudad')->on('ciudads');
            $table->foreignId('propietario_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inmuebles');
    }
};
