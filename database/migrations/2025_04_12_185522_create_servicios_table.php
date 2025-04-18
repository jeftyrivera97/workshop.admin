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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion')->nullable();
            $table->foreignId('id_cliente')->nullable()->nullOnDelete()->constrained()->references('id')->on('clientes');
            $table->foreignId('id_auto')->nullable()->nullOnDelete()->constrained()->references('id')->on('autos');
            $table->foreignId('id_categoria')->nullable()->nullOnDelete()->constrained()->references('id')->on('servicio_categorias');
            $table->string('color')->nullable();
            $table->string('placa')->nullable();
            $table->foreignId('id_pago_categoria')->nullable()->nullOnDelete()->constrained()->references('id')->on('pago_categorias');
            $table->foreignId('id_estado')->nullable()->nullOnDelete()->constrained()->references('id')->on('estados');
            $table->foreignId('id_usuario')->nullable()->nullOnDelete()->constrained()->references('id')->on('users');
            $table->timestamps(precision: 0);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
