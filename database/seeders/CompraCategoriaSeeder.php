<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompraCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Pintura Automotriz',
            'id_tipo' => 1,
            'id_estado' => 1,
            'id_usuario' => 1,
            'created_at' => 1,
            'updated_at' => 1,
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Repuestos/Refracciones',
            'id_tipo' => 1,
            'id_estado' => 1,
            'id_usuario' => 1,
            'created_at' => 1,
            'updated_at' => 1,
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Carroceria',
            'id_tipo' => 1,
            'id_estado' => 1,
            'id_usuario' => 1,
            'created_at' => 1,
            'updated_at' => 1,
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Piezas Electricas',
            'id_tipo' => 1,
            'id_estado' => 1,
            'id_usuario' => 1,
            'created_at' => 1,
            'updated_at' => 1,
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Clips',
            'id_tipo' => 1,
            'id_estado' => 1,
            'id_usuario' => 1,
            'created_at' => 1,
            'updated_at' => 1,
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Discos y Brocas',
            'id_tipo' => 1,
            'id_estado' => 1,
            'id_usuario' => 1,
            'created_at' => 1,
            'updated_at' => 1,
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Electrodos',
            'id_tipo' => 1,
            'id_estado' => 1,
            'id_usuario' => 1,
            'created_at' => 1,
            'updated_at' => 1,
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Tornillos',
            'id_tipo' => 1,
            'id_estado' => 1,
            'id_usuario' => 1,
            'created_at' => 1,
            'updated_at' => 1,
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Herramientas de Trabajo',
            'id_tipo' => 1,
            'id_estado' => 1,
            'id_usuario' => 1,
            'created_at' => 1,
            'updated_at' => 1,
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Masking Tape/Lijas/Materiales de Pintura',
            'id_tipo' => 1,
            'id_estado' => 1,
            'id_usuario' => 1,
            'created_at' => 1,
            'updated_at' => 1,
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Accesorios Automotriz',
            'id_tipo' => 1,
            'id_estado' => 1,
            'id_usuario' => 1,
            'created_at' => 1,
            'updated_at' => 1,
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Piezas de Refrigeracion',
            'id_tipo' => 1,
            'id_estado' => 1,
            'id_usuario' => 1,
            'created_at' => 1,
            'updated_at' => 1,
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Pintura de Aerosol',
            'id_tipo' => 1,
            'id_estado' => 1,
            'id_usuario' => 1,
            'created_at' => 1,
            'updated_at' => 1,
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Adhesivos/Pegamentos',
            'id_tipo' => 1,
            'id_estado' => 1,
            'id_usuario' => 1,
            'created_at' => 1,
            'updated_at' => 1,
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Aceites/Aditivos/Ceras/Lubricantes/',
            'id_tipo' => 1,
            'id_estado' => 1,
            'id_usuario' => 1,
            'created_at' => 1,
            'updated_at' => 1,
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Thinner/Resina',
            'id_tipo' => 1,
            'id_estado' => 1,
            'id_usuario' => 1,
            'created_at' => 1,
            'updated_at' => 1,
        ]);

    }
}
