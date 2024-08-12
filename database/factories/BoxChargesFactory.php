<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BoxCharges>
 */
class BoxChargesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'destination_id' => Destination::factory(),
            'branch_id' => Branch::factory(), // Create a new branch or use an existing one
            'box_type' => $this->faker->randomElement(['Jumbo', 'Large', 'Medium', 'Odd']),
            'box_charge' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
