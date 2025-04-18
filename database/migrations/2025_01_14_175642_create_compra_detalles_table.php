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
        Schema::create('compra_detalles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_compra')->nullable()->nullOnDelete()->constrained()->references('id')->on('compras');
            $table->bigInteger('linea');
            $table->foreignId('id_producto')->nullable()->nullOnDelete()->references('id')->on('productos');
            $table->double('cantidad');
            $table->double('costo');
            $table->double('total_linea');
            $table->foreignId('id_estado')->nullable()->nullOnDelete()->references('id')->on('estados');
            $table->foreignId('id_usuario')->nullable()->nullOnDelete()->references('id')->on('users');
            $table->timestamps(precision: 0);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compra_detalles');
    }
};
