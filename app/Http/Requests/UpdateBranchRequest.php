<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBranchRequest extends FormRequest
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
                "branchId" => ['required'],
                "branchName" => ["required"],
                "branchCode" => ["required"],
                "owner" => ["required"],
                "contact" => ["required"],
                "address" => ["required"],
                "email" => ["required|email"],
                "status" => ["required"],
            ];
        } else {
            return [
                "branchId" => ['sometimes', 'required'],
                "branchName" => ['sometimes', "required"],
                "branchCode" => ['sometimes', "required"],
                "owner" => ['sometimes', "required"],
                "contact" => ['sometimes', "required"],
                "address" => ['sometimes', "required"],
                "email" => ['sometimes', "required|email"],
                "status" => ['sometimes', "required"],
            ];
        }
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'branch_name' => $this->branchName,
            'branch_code' => $this->branchCode,
        ]);
    }
}
