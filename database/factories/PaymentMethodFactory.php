<?php

namespace Database\Factories;

use App\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentMethod>
 */
class PaymentMethodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = PaymentMethod::class;
    public function definition(): array
    {
        return [
            'payment_method' => $this->faker->randomElement([
                'Cash',
                'Credit Card',
                'Bank Transfer',
                'PayPal',
                'Check'
            ]),
        ];
    }
}
