<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Branch::class;
    public function definition(): array
    {
        return [
            'branch_name' => $this->faker->company(),
            'branch_code' => strtoupper($this->faker->unique()->lexify('????')),
            'owner' => $this->faker->name(),
            'contact' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'email' => $this->faker->unique()->safeEmail(),
            'status' => $this->faker->randomElement(['1', '2']),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Branch $branch) {
            // Set branch_id to the value of id
            $branch->branch_id = $branch->id;
            $branch->save();
        });
    }
}
