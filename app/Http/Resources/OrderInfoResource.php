<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'invoiceNo' => $this->invoice_no,
            'agentCode' => $this->agent_code,
            'senderName' => $this->sender_name,
            'senderAddress' => $this->sender_address,
            'senderContact' => $this->sender_contact,
            'senderEmail' => $this->sender_email,
            'receiverName' => $this->receiver_name,
            'receiverAddress' => $this->receiver_address,
            'receiverContact' => $this->receiver_contact,
            'receiverEmail' => $this->receiver_email,
            'destination' => $this->destination,
            'requestStatus' => $this->request_status,
            'requestInfoAt' => $this->request_info_at,
            'orderStatus' => $this->order_status,
            'orderStatusAt' => $this->order_status_at,
            'declaredValue' => $this->declared_value,
            'totalValue' => $this->total_value,
            'totalPayment' => $this->total_payment,
            'paymentMethod' => $this->payment_method,
            'branchAssigned' => $this->branch_assigned
        ];
    }
}
