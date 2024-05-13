<?php

namespace Database\Factories;

use App\Models\menu;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $menus_id = menu::pluck('menu_id')->all();
        $menu_id = fake()->randomElement($menus_id);

        $users_id = User::pluck('user_id')->all();
        $user_id = fake()->randomElement($users_id);

        return [
            'cart_id'  => fake()->uuid(),
            'menu_id'  => $menu_id,
            'user_id'  => $user_id,
            'quantity' => fake()->numberBetween(1, 10),
        ];
    }
}
