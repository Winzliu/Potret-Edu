<?php

namespace Database\Factories;

use App\Models\menu;
use App\Models\order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\orderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $orders_id = order::pluck('order_id')->all();
        $order_id = fake()->randomElement($orders_id);

        $menus_id = menu::pluck('menu_id')->all();
        $menu_id = fake()->randomElement($menus_id);

        return [
            'order_detail_id' => fake()->uuid(),
            'menu_date'       => now(),
            'order_id'        => $order_id,
            'menu_id'         => $menu_id,
            'quantity'        => fake()->numberBetween(1, 10),
            'notes'           => fake()->words(3, true),
            'status'          => ['baru', 'tambahan'][rand(0, 1)],
            'menu_status'     => ['kosong', 'masak', 'selesai'][rand(0, 2)],
        ];
    }
}