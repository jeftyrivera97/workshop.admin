<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanillaTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('planilla_tipos')->insert([
            'descripcion' => 'Salarios a empleados directos',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('planilla_tipos')->insert([
            'descripcion' => 'Salarios a empleados indirectos',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('planilla_tipos')->insert([
            'descripcion' => 'Liquidaciones',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('planilla_tipos')->insert([
            'descripcion' => 'Bonos y Beneficios Laborales',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
        DB::table('planilla_tipos')->insert([
            'descripcion' => 'Retenciones',
            'id_estado' => 1,
            'id_usuario' => 1,
        ]);
    }
}
