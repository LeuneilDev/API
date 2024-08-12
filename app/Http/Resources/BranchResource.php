<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
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
            "branchId" => $this->branch_id,
            "branchName" => $this->branch_name,
            "branchCode" => $this->branch_code,
            "owner" => $this->owner,
            "contact" => $this->contact,
            "address" => $this->address,
            "email" => $this->email,
            "status" => $this->status
        ];
    }
}
