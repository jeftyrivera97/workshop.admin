<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GastoTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gasto_tipos')->insert([
            'descripcion' => 'Gastos Fijos',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('gasto_tipos')->insert([
            'descripcion' => 'Gastos Variables',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('gasto_tipos')->insert([
            'descripcion' => 'Gastos Directos',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('gasto_tipos')->insert([
            'descripcion' => 'Gastos Indirectos',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('gasto_tipos')->insert([
            'descripcion' => 'Gastos Extraordinarios',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
    }
}
