<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\userDetail>
 */
class UserDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users_id = User::pluck('user_id')->all();
        $user_id = fake()->unique()->randomElement($users_id);

        return [
            'user_detail_id'  => fake()->uuid(),
            'user_id'         => $user_id,
            'name'            => fake()->name(),
            'custom'          => 'normal',
            'description'     => fake()->sentence(10),
            'phone_number'    => '08' . strval(fake()->numberBetween(10, 99)) . strval(fake()->numberBetween(10, 99)) . strval(fake()->numberBetween(10, 99)) . strval(fake()->numberBetween(10, 99)) . strval(fake()->numberBetween(10, 99)),
            'employment_date' => fake()->dateTimeBetween('-1 years', 'now'),
            'address'         => fake()->address(),
        ];
    }
}
