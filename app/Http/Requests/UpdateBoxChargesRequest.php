<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBoxChargesRequest extends FormRequest
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
                'destination' => ['required'],
                'boxType' => ['required'],
                'boxCharge' => ['required'],
                'branch' => ['required'],
            ];
        } else {
            return [
                'destination' => ['sometimes', 'required'],
                'boxType' => ['sometimes', 'required'],
                'boxCharge' => ['sometimes', 'required'],
                'branch' => ['sometimes', 'required'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'box_type' => $this->boxType,
            'box_charge' => $this->boxCharge
        ]);
    }
}
