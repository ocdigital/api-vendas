<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'seller_id' => \App\Models\Seller::factory(),
            'sale_value' => $this->faker->randomFloat(2, 100, 1000),
            'commission' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
