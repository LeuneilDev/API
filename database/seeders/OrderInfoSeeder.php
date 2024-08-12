<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BoxInfo;
use App\Models\Destination;
use App\Models\BoxCharges;
use App\Models\Branch;
use App\Models\PaymentMethod;
use App\Models\Container;
use App\Models\OrderInfo;
use App\Models\OrderBoxInfo;
use App\Models\Tracking;

class OrderInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 5 Destination records
        $destinations = Destination::factory()->count(5)->create();

        // Create 4 BoxInfo records
        $boxInfos = BoxInfo::factory()->count(4)->create();

        // Create 5 Branch records
        $branches = Branch::factory()->count(5)->create();

        // Create 5 PaymentMethod records
        PaymentMethod::factory()->count(5)->create();

        // Create BoxCharges for each combination of Destination, BoxInfo, and Branch
        foreach ($destinations as $destination) {
            foreach ($boxInfos as $boxInfo) {
                foreach ($branches as $branch) {
                    BoxCharges::firstOrCreate([
                        'destination' => $destination->id,
                        'box_type' => $boxInfo->box_type,
                        'branch' => $branch->id,
                        'box_charge' => rand(100, 500), // Random charge value
                    ]);
                }
            }
        }

        // Create Containers

        OrderInfo::factory()->count(2)->state(['request_status' => '5'])->create();

        Container::factory()->count(3)->create();

        Tracking::factory()->count(10)->create();

    }
}
