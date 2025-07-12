<?php

namespace Database\Factories;

use App\Models\Fornecedor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fornecedor>
 */
class FornecedorFactory extends Factory
{
    protected $model = Fornecedor::class;

    public function definition(): array
    {
        return [
            'nome'     => $this->faker->name(),
            'email'    => $this->faker->unique()->safeEmail(),
            'telefone' => $this->faker->phoneNumber(),
            'empresa'  => $this->faker->company(),
            'endereco' => $this->faker->address(),
        ];
    }
}
