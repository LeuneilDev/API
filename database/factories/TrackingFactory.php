<?php

namespace Database\Factories;

use App\Models\Tracking;
use App\Models\OrderInfo;
use App\Models\OrderBoxInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrackingFactory extends Factory
{
    protected $model = Tracking::class;

    public function definition(): array
    {
        // Fetch an OrderInfo record randomly
        $order = OrderInfo::inRandomOrder()->first();

        // Determine tracking status based on the order's request status
        $statuses = [
            '1' => 'Picked-up',
            '2' => 'Received at Warehouse',
            '2.5' => 'Ready for Shipment',
            '3' => 'Shipped to Designated Country',
            '4' => 'In Transit',
            '5' => 'Collected at Logistic Warehousing',
            '6' => 'Out for Delivery',
            '7' => 'Delivered',
        ];

        $status = isset($statuses[$order->order_status]) ? $statuses[$order->order_status] : 'Unknown';

        // Get container number from OrderBoxInfo if applicable
        $containerNo = OrderBoxInfo::where('order_id', $order->id)->value('container_no');

        // Define the location based on the status
        $locations = [
            '1' => 'Picked-up',
            '2' => 'Received at Warehouse',
            '2.5' => 'Ready for Shipment',
            '3' => 'Shipped to Designated Country',
            '4' => 'In Transit',
            '5' => 'Collected at Logistic Warehousing',
            '6' => 'Out for Delivery',
            '7' => 'Delivered',
        ];

        $location = isset($locations[$order->order_status]) ? $locations[$order->order_status] : 'Unknown Location';

        return [
            'order_id' => $order->id,
            'invoice_no' => $order->invoice_no,
            'container_no' => $containerNo ?: 'N/A',
            'location' => $location,
            'status' => $status,
        ];
    }
}
