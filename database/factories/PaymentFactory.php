<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'payment_method' => $this->faker->word, 
            'order_id' => \App\Models\Order::inRandomOrder()->first()->id, 
            'payment_date' => $this->faker->dateTimeBetween('-1 month', 'now'), 
            'status' => $this->faker->randomElement(['pending', 'completed', 'failed']),
        ];
    }
}
