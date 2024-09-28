<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ShipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $orderId = Order::inRandomOrder()->first()->id;
        return [
            'order_id' => $orderId, 
            'shipment_date' => $this->faker->date(), 
            'status' => $this->faker->randomElement(['pending', 'shipped', 'delivered', 'cancelled']), 
            'tracking_number' => $this->faker->unique()->regexify('[A-Za-z0-9]{10}'), 
            'carrier' => $this->faker->company,
        ];
    }
}
