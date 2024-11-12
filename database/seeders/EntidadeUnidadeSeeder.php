<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntidadeUnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('entidade_unidades')->insert([
            ['entidade_beneficentes_id' => 1, 'cnpj' => '00.000.000/0000-00', 'nome' => 'Nossa Senhora de Fátima - Vila Bonilha'],
            ['entidade_beneficentes_id' => 1, 'cnpj' => '00.000.000/0000-00', 'nome' => 'Nossa Senhora das Dores - Sítio Morro Grande'],
            ['entidade_beneficentes_id' => 1, 'cnpj' => '00.000.000/0000-00', 'nome' => 'Cristo Libertador'],
            ['entidade_beneficentes_id' => 1, 'cnpj' => '00.000.000/0000-00', 'nome' => 'Santa Terezinha do Menino Jesus - Jardim Sidney'],
            ['entidade_beneficentes_id' => 1, 'cnpj' => '00.000.000/0000-00', 'nome' => 'Nossa Senhor do Retiro'],
            ['entidade_beneficentes_id' => 1, 'cnpj' => '00.000.000/0000-00', 'nome' => 'São Luis Gonzaga - Vila Pereira Barreto'],
            ['entidade_beneficentes_id' => 1, 'cnpj' => '00.000.000/0000-00', 'nome' => 'Bom Jesus dos Passos - Freguesia do Ó'],
            ['entidade_beneficentes_id' => 1, 'cnpj' => '00.000.000/0000-00', 'nome' => 'São Judas Tadeu - Vila Miriam'],
            ['entidade_beneficentes_id' => 1, 'cnpj' => '00.000.000/0000-00', 'nome' => 'Nossa Senhora Aparecida - Vila Zat'],
            ['entidade_beneficentes_id' => 1, 'cnpj' => '00.000.000/0000-00', 'nome' => 'Santa Rita de Cássia - Vila Progresso'],
        ]);
    }
}
