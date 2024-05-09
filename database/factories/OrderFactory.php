<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users_id = User::pluck('user_id')->all();
        $user_id = fake()->randomElement($users_id);

        return [
            'order_id'     => fake()->uuid(),
            'user_id'      => $user_id,
            'table_number' => fake()->numberBetween(1, 15),
            'order_type'   => ['Dine In', 'Take Away'][rand(0, 1)],
            'order_status' => ['masak', 'saji', 'selesai', 'batal'][rand(0, 3)],
        ];
    }
}
