<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContainerResource extends JsonResource
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
            "containerNo" => $this->container_no,
            "branchAssigned" => $this->branch_assigned,
            "capacity" => $this->capacity,
            "boxes" => $this->boxes,
            "status" => $this->status
        ];
    }
}
