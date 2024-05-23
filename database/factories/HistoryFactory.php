<?php

namespace Database\Factories;

use App\Models\history;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\history>
 */
class HistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'history_id'   => fake()->uuid(),
            'cashier_name' => fake()->name(),
            'waiter_name'  => fake()->name(),
            'table_number' => fake()->numberBetween(1, 15),
            'order_status' => ['selesai', 'batal'][rand(0, 1)],
            'payment_date' => fake()->dateTimeBetween('-1 years', 'now'),
            'discount'     => fake()->randomFloat(2, 0, 100),    
        ];
    }
}