<?php

namespace Database\Factories;

use App\Models\history;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\historyDetail>
 */
class HistoryDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $histories_id = history::pluck('history_id')->all();
        $history_id = fake()->randomElement($histories_id);

        return [
            'history_detail_id' => fake()->uuid(),
            'menu_date'         => now(),
            'history_id'        => $history_id,
            'menu_name'         => fake()->name(),
            'menu_notes'        => fake()->words(3, true),
            'quantity'          => fake()->numberBetween(1, 10),
            'price'             => fake()->numberBetween(10000, 30000),
        ];
    }
}