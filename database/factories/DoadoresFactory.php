<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doadores>
 */
class DoadoresFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nome = fake()->name();
        return [
            'nome' => $nome,
            'razao_social' => $nome,
            'cnpj_cpf' => fake()->numerify('###.###.###-##'),
            'endereco' => fake()->streetAddress(),
            'bairro' => 'Vila Bonilha',
            'cidade' => 'São Paulo',
            'uf' => 'SP',
            'cep' => fake()->numerify('#####-###'),
            'telefone' => fake()->phoneNumber(),
            'email' => fake()->email()
        ];
    }
}
