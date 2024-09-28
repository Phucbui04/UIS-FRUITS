<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserDiscount>
 */
class UserDiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'discount_id' => \App\Models\Discount::inRandomOrder()->first()->id, 
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
        ];
    }
}
