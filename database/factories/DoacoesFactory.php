<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doacoes>
 */
class DoacoesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'doador_id' => 5,
            'tipo_id' => 1,
            'unidade_id' => 1,
            'quantidade' => 1,
            'valor' => 0.00,
            'judicial' => 0
        ];
    }
}
