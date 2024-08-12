<?php

namespace Database\Factories;

use App\Models\Container;
use App\Models\Branch;
use App\Models\OrderBoxInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContainerFactory extends Factory
{
    protected $model = Container::class;

    public function definition(): array
    {
        // Generate a unique container number
        $containerNo = $this->faker->unique()->numerify('CONT-#####');

        // Assign a branch
        $branch = Branch::inRandomOrder()->first() ?? Branch::factory()->create();

        // Random capacity for the container
        $capacity = $this->faker->numberBetween(10, 100);

        // Initialize total box count
        $totalBoxes = 0;

        // Fetch the boxes that are yet to be assigned to a container and have a request_status of 5
        $orderBoxInfos = OrderBoxInfo::whereNull('container_no')
            ->whereHas('orderinfo', function ($query) {
                $query->where('request_status', '5');
            })
            ->limit($capacity)
            ->get();

        // Assign container_no and load_date to the selected boxes
        foreach ($orderBoxInfos as $orderBoxInfo) {
            $qnty = $orderBoxInfo->qnty;

            // Check if adding this quantity would exceed capacity
            if ($totalBoxes + $qnty > $capacity) {
                // Adjust the quantity to exactly match the remaining capacity
                $qnty = $capacity - $totalBoxes;
            }

            $totalBoxes += $qnty;

            // Update the box with container_no and load_date
            $orderBoxInfo->update([
                'container_no' => $containerNo,
                'load_date' => now(),
            ]);

            // Stop if the total box count reaches the container's exact capacity
            if ($totalBoxes >= $capacity) {
                break;
            }
        }

        // Determine the status based on the total number of boxes and capacity
        $status = 'Available'; // Default to 'Available'
        if ($totalBoxes > 0 && $totalBoxes < $capacity) {
            $status = 'Not Full'; // 'Not Full'
        } elseif ($totalBoxes === $capacity) {
            $status = 'Full'; // 'Full'
        }

        return [
            'container_no' => $containerNo,
            'branch_assigned' => $branch->id, // Assign the branch ID
            'capacity' => $capacity,
            'boxes' => $totalBoxes, // This should match the total number of created boxes
            'status' => $status,
        ];
    }
}
