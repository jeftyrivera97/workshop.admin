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
        Schema::create('ingreso_servicios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_ingreso')->nullable()->nullOnDelete()->constrained()->references('id')->on('ingresos');
            $table->foreignId('id_servicio')->nullable()->nullOnDelete()->constrained()->references('id')->on('servicios');
            $table->foreignId('id_estado')->nullable()->nullOnDelete()->constrained()->references('id')->on('estados');
            $table->timestamps(precision: 0);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingreso_servicios');
    }
};
