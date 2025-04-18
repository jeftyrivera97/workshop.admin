<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompraTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('compra_tipos')->insert([
            'descripcion' => 'Materia Prima',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('compra_tipos')->insert([
            'descripcion' => 'Materias de Empaque y Embalaje',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);

        DB::table('compra_tipos')->insert([
            'descripcion' => 'Equipo y herramientas para manipulacion',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);

        DB::table('compra_tipos')->insert([
            'descripcion' => 'Maquinaria para Produccion',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
    }
}
