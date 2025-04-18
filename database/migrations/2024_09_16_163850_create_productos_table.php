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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_producto');
            $table->string('descripcion');
            $table->foreignId('id_categoria')->nullable()->nullOnDelete()->constrained()->references('id')->on('producto_categorias');
            $table->string('marca');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->foreignId('id_proveedor')->nullable()->nullOnDelete()->constrained()->references('id')->on('proveedores');
            $table->double('peso');
            $table->double('stock');
            $table->foreignId('id_impuesto')->nullable()->nullOnDelete()->constrained()->references('id')->on('impuestos');
            $table->double('gravado15')->nullable();
            $table->double('gravado18')->nullable();
            $table->double('impuesto15')->nullable();
            $table->double('impuesto18')->nullable();
            $table->double('exento')->nullable();
            $table->double('exonerado')->nullable();
            $table->double('costo')->nullable();
            $table->double('precio_venta');
            $table->double('valor');
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
        Schema::dropIfExists('productos');
    }
};
