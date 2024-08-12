<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'invoiceNo' => ['required|nullable'],
            'agentCode' => ['required|nullable'],
            'senderName' => ['required'],
            'senderAddress' => ['required'],
            'senderContact' => ['required'],
            'senderEmail' => ['required|email'],
            'receiverName' => ['required'],
            'receiverAddress' => ['required'],
            'receiverContact' => ['required'],
            'receiverEmail' => ['required|email'],
            'destination' => ['required'],
            'requestStatus' => ['required'],
            'requestInfoAt' => ['required'],
            'orderStatus' => ['required|nullable'],
            'orderStatusAt' => ['required'],
            'declaredValue' => ['required'],
            'totalValue' => ['required'],
            'totalPayment' => ['required'],
            'paymentMethod' => ['required'],
            'branchAssigned' => ['required'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'invoice_no' => $this->invoiceNo,
            'agent_code' => $this->agentCode,
            'sender_name' => $this->senderName,
            'sender_address' => $this->senderAddress,
            'sender_contact' => $this->senderContact,
            'sender_email' => $this->senderEmail,
            'receiver_name' => $this->receiverName,
            'receiver_address' => $this->receiverAddress,
            'receiver_contact' => $this->receiverContact,
            'receiver_email' => $this->receiverEmail,
            'request_status' => $this->requestStatus,
            'request_info_at' => $this->requestInfoAt,
            'order_status' => $this->orderStatus,
            'order_status_at' => $this->orderStatusAt,
            'declared_value' => $this->declaredValue,
            'total_value' => $this->totalValue,
            'total_payment' => $this->totalPayment,
            'payment_method' => $this->paymentMethod,
            'branch_assigned' => $this->branchAssigned,
        ]);
    }
}
