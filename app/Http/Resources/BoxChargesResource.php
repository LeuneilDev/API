<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BoxChargesResource extends JsonResource
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
            "destination" => $this->destination,
            "boxType" => $this->box_type,
            "boxCharge" => $this->box_charge,
            "branch" => $this->branch,
        ];
    }
}
