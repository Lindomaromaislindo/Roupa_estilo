<?php

namespace Database\Factories;

use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    protected $model = Pedido::class;

    public function definition(): array
    {
        return [
            'codigo' => $this->faker->unique()->numerify('PEDIDO - ###'),
            'data' => $this->faker->dateTimeThisYear(),
            'total' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}
