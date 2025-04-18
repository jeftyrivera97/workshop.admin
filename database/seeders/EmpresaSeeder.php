<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('empresas')->insert([
            'codigo_empresa' => '05061955008146',
            'descripcion' => 'Taller de Pintura Automotriz Hernandez',
            'razon_social' => 'Taller de Pintura Automotriz Hernandez',
            'direccion' => 'Bo. Ingles, 5 Calle, Frente a Escuela Augusto C. Coello.',
            'ciudad' => 'La Ceiba',
            'departamento' => 'Atlantida',
            'celular' => '24420442',
            'telefono' => '24420442',
            'correo' => 'cecimiller79@yahoo.com',
            'cai' => '048943-B9C7A6-464391-BA5D73-D09493-C2',
            'id_estado' => 1,
        ]);
    }
}
