<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Beneficio>
 */
class BeneficioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo_beneficio' => 'Cesta Básica',
            'descricao' => fake()->text(200),
            'quantidade_disponivel' => 100,
            'created_by_id' => 1
        ];
    }
}
