<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeneficioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('beneficios')->insert([
            ['tipo_beneficio' => 'Cesta básica pequena', 'descricao' => 'Cesta básica pequena', 'created_by_id' => 1],
            ['tipo_beneficio' => 'Cesta básica média', 'descricao' => 'Cesta básica média', 'created_by_id' => 1],
            ['tipo_beneficio' => 'Cesta básica grande', 'descricao' => 'Cesta básica grande', 'created_by_id' => 1],
        ]);
    }
}
