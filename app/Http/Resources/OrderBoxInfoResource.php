<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderBoxInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            'orderId' => $this->order_id,
            'containerNo' => $this->container_no,
            'boxType' => $this->box_type,
            'quantity' => $this->qnty,
            'boxCharge' => $this->box_charge,
            'boxDimension' => $this->box_dimension,
            'batchNo' => $this->batch_no,
            'loadDate' => $this->load_date
        ];
    }
}
