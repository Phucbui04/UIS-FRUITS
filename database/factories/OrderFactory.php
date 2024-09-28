<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
        return [
            'name' => $this->faker->name(), 
            'phone' => $this->faker->phoneNumber(), 
            'address' => $this->faker->address(), 
            'status' => $this->faker->randomElement(['pending', 'completed', 'shipped', 'canceled']), 
            'payment_method' => $this->faker->randomElement(['credit_card', 'paypal', 'bank_transfer']),
            'user_id' => \App\Models\User::inRandomOrder()->first()->id, 
            'total_amount' => $this->faker->randomFloat(2, 10, 5000), 
            'order_date' => $this->faker->date(),
        ];
    }
}
