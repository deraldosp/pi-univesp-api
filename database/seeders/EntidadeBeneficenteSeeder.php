<?php

namespace Database\Seeders;

use App\Models\Beneficiario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntidadeBeneficenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('entidade_beneficentes')->insert([
            'id' => 1,
            'nome' => 'Mitra Arquidiocesana de São Paulo',
            'descricao' => 'Mitra Arquidiocesana de São Paulo - Setor Brasilândia - Decanato Santa Isabel e São Zacarias',
            'cnpj' => '00.000.000/0000-00',
            'email' => '',
            'telefone' => '',
            'tipo_atividade' => 'religiosa'
        ]);
    }
}
