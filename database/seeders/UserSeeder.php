<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('univesp');
        $user = [
            "name" => "admin",
            "password" => $password,
            "email" => "2208171@aluno.univesp.br",
            "entidade_id" => 1
        ];
        User::create($user);
    }
}
