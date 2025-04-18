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
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_marca')->references('id')->on('auto_marcas');
            $table->string('modelo');
            $table->string('year')->nullable();
            $table->string('base')->nullable();
            $table->string('traccion')->nullable();
            $table->string('cilindraje')->nullable();
            $table->string('combustion')->nullable();
            $table->foreignId('id_categoria')->nullable()->nullOnDelete()->constrained()->references('id')->on('auto_categorias');
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
        Schema::dropIfExists('autos');
    }
};
