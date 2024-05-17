<?php

namespace Database\Seeders;

use App\Models\Beneficiario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeneficiarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Beneficiario::factory()
            ->count(200)
            ->create();
    }
}
