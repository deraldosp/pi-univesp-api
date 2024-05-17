<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EntidadeUnidade>
 */
class EntidadeUnidadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'entidade_beneficentes_id' => 1,
            'nome' => fake()->company(),
            'descricao' => fake()->text(50),
            'cnpj' => fake()->numerify('##.###.###/0001-##'),
            'email' => fake()->email(),
            'telefone' => fake()->numerify('## #####-####'),
            'endereco' => fake()->address(),
            'numero' => fake()->numerify('####'),
            'cep' => fake()->numerify('#####-###'),
            'bairro' => 'Perus',
            'cidade' => 'São Paulo',
            'uf' => 'SP'
        ];
    }
}
