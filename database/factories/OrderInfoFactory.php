<?php

namespace Database\Factories;

use App\Models\OrderInfo;
use App\Models\Branch;
use App\Models\PaymentMethod;
use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OrderBoxInfo;

class OrderInfoFactory extends Factory
{
    protected $model = OrderInfo::class;

    public function definition(): array
    {
        // Fetch existing related models' data
        $branch = Branch::inRandomOrder()->first() ?? Branch::factory()->create();
        $paymentMethod = PaymentMethod::inRandomOrder()->first() ?? PaymentMethod::factory()->create();
        $destination = Destination::inRandomOrder()->first() ?? Destination::factory()->create();

        // Directly define request status as '5'
        $requestStatus = '5';

        // Define order status based on request status '5'
        $orderStatus = $this->faker->randomElement(['2.5', '3', '4', '5', '6', '7']);  // Corresponding statuse

        return [
            'invoice_no' => $this->faker->unique()->numerify('INV-######'),
            'agent_code' => $this->faker->bothify('AG-###??'),
            'sender_name' => $this->faker->name(),
            'sender_address' => $this->faker->address(),
            'sender_contact' => $this->faker->phoneNumber(),
            'sender_email' => $this->faker->email(),
            'receiver_name' => $this->faker->name(),
            'receiver_address' => $this->faker->address(),
            'receiver_contact' => $this->faker->phoneNumber(),
            'receiver_email' => $this->faker->email(),
            'destination' => $destination->id,
            'request_status' => $requestStatus,
            'request_info_at' => $this->faker->dateTimeThisYear(),
            'order_status' => $orderStatus, // Set based on request_status
            'order_status_at' => $orderStatus ? $this->faker->dateTimeThisYear() : null,
            'declared_value' => $this->faker->numberBetween(1000, 100000),
            'branch_assigned' => $branch->id,
            'payment_method' => $paymentMethod->id,
            'total_value' => 0, // Placeholder, will be updated later
            'total_payment' => 0, // Placeholder, will be updated later
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (OrderInfo $order) {
            // Create related OrderBoxInfo records for this order
            $orderBoxes = OrderBoxInfo::factory()->count(5)->create([
                'order_id' => $order->id,
            ]);

            // Calculate total value based on the sum of (box charge * quantity) for all boxes related to this order
            $totalValue = $orderBoxes->reduce(function ($carry, $box) {
                return $carry + ($box->box_charge * $box->qnty);
            }, 0);

            // Determine tax rate and calculate total payment
            $taxRate = 0.1; // 10% tax rate
            $totalPayment = $totalValue + ($totalValue * $taxRate);

            // Update the OrderInfo record with the calculated values
            $order->update([
                'total_value' => $totalValue,
                'total_payment' => $totalPayment,
            ]);
        });
    }
}
