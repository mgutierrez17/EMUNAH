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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id(); // o evitar múltiples filas desde el frontend
            $table->string('nombre', 100);
            $table->string('telefono', 50)->nullable();
            $table->string('direccion', 200)->nullable();
            $table->string('correo', 100)->nullable();
            $table->string('nit', 50)->nullable();
            $table->text('logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
