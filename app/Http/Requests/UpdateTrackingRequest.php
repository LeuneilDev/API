<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTrackingRequest extends FormRequest
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
        $method = $this->method();

        if ($method == 'PUT') {
            return [
                'orderId' => ['required'],
                'invoice_no' => ['required'],
                'container_no' => ['required|nullable'],
                'location' => ['required'],
                'status' => ['required'],
            ];
        } else {
            return [
                'orderId' => ['sometimes', 'required'],
                'invoice_no' => ['sometimes', 'required'],
                'container_no' => ['sometimes', 'required|nullable'],
                'location' => ['sometimes', 'required'],
                'status' => ['sometimes', 'required'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'orderId' => $this->orderId,
            'invoice_no' => $this->invoiceNo,
            'container_no' => $this->containerNo,
        ]);
    }
}
