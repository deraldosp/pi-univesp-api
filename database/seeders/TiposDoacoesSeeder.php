<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposDoacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipos_doacoes')->insert([
            [
                'nome' => 'Cesta Básica',
                'descricao' => 'Cesta Básica'
            ],
            [
                'nome' => 'Valor Monetário',
                'descricao' => 'Valor em espécie, cartão de débito, pix ou depósito bancário'
            ]
        ]);
    }
}
