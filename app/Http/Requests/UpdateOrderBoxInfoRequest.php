<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderBoxInfoRequest extends FormRequest
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
                'container_no' => ['required|nullable'],
                'boxType' => ['required'],
                'qnty' => ['required'],
                'boxCharge' => ['required'],
                'box_dimension' => ['required'],
                'batch_no' => ['required|nullable'],
                'load_date' => ['required'],
            ];
        } else {
            return [
                'orderId' => ['sometimes', 'required'],
                'container_no' => ['sometimes', 'required|nullable'],
                'boxType' => ['sometimes', 'required'],
                'qnty' => ['sometimes', 'required'],
                'boxCharge' => ['sometimes', 'required'],
                'box_dimension' => ['sometimes', 'required'],
                'batch_no' => ['sometimes', 'required|nullable'],
                'load_date' => ['sometimes', 'required'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'order_id' => $this->orderId,
            'container_no' => $this->containerNo,
            'box_type' => $this->boxType,
            'box_charge' => $this->boxCharge,
            'box_dimension' => $this->boxDimension,
            'batch_no' => $this->batchNo,
            'load_date' => $this->loadDate,
        ]);
    }
}
