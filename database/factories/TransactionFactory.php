<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'total' => fake()->randomFloat(2, 1000, 1000000),
            'payment_method' => fake()->randomElement(['cash', 'qris', 'debit', 'credit', 'e-wallet', 'transfer']),
            'paid_amount' => fn (array $attributes) => $attributes['total'],
            'change_amount' => 0,
            'status' => 'completed',
        ];
    }
}
