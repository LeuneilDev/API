<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContainerRequest extends FormRequest
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
                'containerNo' => ['required'],
                'branchAssigned' => ['required'],
                'capacity' => ['required'],
                'boxes' => ['required'],
                'status' => ['required'],
            ];
        } else {
            return [
                'containerNo' => ['sometimes', 'required'],
                'branchAssigned' => ['sometimes', 'required'],
                'capacity' => ['sometimes', 'required'],
                'boxes' => ['sometimes', 'required'],
                'status' => ['sometimes', 'required'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'container_no' => $this->containerNo,
            'branch_assigned' => $this->branchAssigned,
        ]);
    }
}
