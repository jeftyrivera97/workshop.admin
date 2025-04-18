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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_compra');
            $table->date('fecha');
            $table->string('descripcion')->nullable();
            $table->foreignId('id_categoria')->nullable()->nullOnDelete()->constrained()->references('id')->on('compra_categorias');
            $table->foreignId('id_proveedor')->nullable()->nullOnDelete()->constrained()->references('id')->on('proveedores');
            $table->foreignId('id_tipo_cuenta')->nullable()->nullOnDelete()->constrained()->references('id')->on('tipo_cuentas');
            $table->foreignId('id_estado_cuenta')->nullable()->nullOnDelete()->constrained()->references('id')->on('estado_cuentas');
            $table->date('fecha_pago')->nullable();
            $table->double('gravado15')->nullable();
            $table->double('gravado18')->nullable();
            $table->double('impuesto15')->nullable();
            $table->double('impuesto18')->nullable();
            $table->double('exento')->nullable();
            $table->double('exonerado')->nullable();
            $table->double('total');
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
        Schema::dropIfExists('compras');
    }
};
