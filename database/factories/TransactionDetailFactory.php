<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\TransactionDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TransactionDetail>
 */
class TransactionDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transaction_id' => TransactionFactory::new(),
            'product_id' => Product::factory(),
            'quantity' => $quantity = fake()->numberBetween(1, 10),
            'price' => $price = fake()->randomFloat(2, 1000, 1000000),
            'subtotal' => round($quantity * $price, 2),
        ];
    }
}
