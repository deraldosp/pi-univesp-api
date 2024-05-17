<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Beneficiario>
 */
class BeneficiarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'rg' => fake()->numerify('########-#'),
            'cpf' => fake()->numerify('###.###.###-##'),
            'data_nascimento' => fake()->dateTimeBetween('-50 years', '-18 years')->format('Y-m-d'),
            'genero' => fake()->randomElement(['M', 'F']),
            'estado_civil' => fake()->randomElement(['Solteiro', 'Casado', 'Divorciado', 'Viúvo']),
            'endereco' => fake()->streetAddress(),
            'numero' => fake()->buildingNumber(),
            'complemento' => '',
            'bairro' => 'Vila Bonilha',
            'cidade' => 'São Paulo',
            'uf' => 'SP',
            'cep' => fake()->numerify('#####-###'),
            'telefone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'numero_dependentes' => fake()->numberBetween(1, 5),
            'inicio_beneficio' => fake()->dateTimeBetween('-60 week', '-8 week')->format('Y-m-d'),
            'created_by_id' => 1,
            'total_beneficios_recebidos' => fake()->randomNumber(1),
        ];
    }
}
