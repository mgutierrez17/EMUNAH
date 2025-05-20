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
        Schema::create('guia_ingresos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion_ingreso')->nullable();
            $table->date('fecha_pedido');
            $table->date('fecha_ingreso');
            $table->enum('estado_ingreso', ['Pendiente', 'Completado', 'Anulado'])->default('Pendiente');
            $table->decimal('total_ingreso', 10, 2)->default(0);
            $table->decimal('descuento_ingreso', 10, 2)->default(0);
            $table->text('comentario')->nullable();
            $table->foreignId('proveedor_id')->constrained('proveedores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guia_ingresos');
    }
};
