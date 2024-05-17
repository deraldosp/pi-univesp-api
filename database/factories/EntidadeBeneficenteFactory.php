<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EntidadeBeneficente>
 */
class EntidadeBeneficenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->company(),
            'descricao' => fake()->text(50),
            'cnpj' => fake()->numerify('##.###.###/0001-##'),
            'email' => fake()->email(),
            'telefone' => fake()->numerify('## #####-####'),
            'endereco' => fake()->address(),
            'cep' => fake()->numerify('#####-###'),
            'tipo_atividade' => fake()->text(25)
        ];
    }
}
