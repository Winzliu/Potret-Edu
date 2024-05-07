<?php

namespace Database\Factories;

use App\Models\menuCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $menu_categories_id = menuCategory::pluck('menu_category_id')->all();
        $menu_category_id = fake()->randomElement($menu_categories_id);

        return [
            'menu_id'          => fake()->uuid(),
            'menu_category_id' => $menu_category_id,
            'menu_name'        => fake()->word(),
            'menu_allergen'    => "Menu Alergi",
            'menu_description' => fake()->words(3, true),
            'menu_price'       => fake()->numberBetween(10000, 30000),
            'menu_image'       => "Makanan.jpg"
        ];
    }
}
