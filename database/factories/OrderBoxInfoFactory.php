<?php

namespace Database\Factories;

use App\Models\OrderBoxInfo;
use App\Models\BoxInfo;
use App\Models\OrderInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderBoxInfoFactory extends Factory
{
    protected $model = OrderBoxInfo::class;

    public function definition(): array
    {
        // Fetch existing related models' data
        $boxInfo = BoxInfo::inRandomOrder()->first() ?? BoxInfo::factory()->create();
        $orderInfo = OrderInfo::inRandomOrder()->first() ?? OrderInfo::factory()->create();

        return [
            'order_id' => $orderInfo->id,
            'box_type' => $boxInfo->box_type,
            'qnty' => $this->faker->numberBetween(1, 5),
            'box_charge' => $this->faker->numberBetween(100, 500),
            'box_dimension' => $boxInfo->box_dimension,
            'batch_no' => $this->faker->unique()->numerify('BATCH-#####'),
            'load_date' => null,  // This will be updated later
            'container_no' => null,  // This will be assigned later
        ];
    }
}
