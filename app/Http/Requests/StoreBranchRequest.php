<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends FormRequest
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
            "branchId" => ['required'],
            "branchName" => ["required"],
            "branchCode" => ["required"],
            "owner" => ["required"],
            "contact" => ["required"],
            "address" => ["required"],
            "email" => ["required|email"],
            "status" => ["required"],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'branch_name' => $this->branchName,
            'branch_code' => $this->branchCode,
        ]);
    }
}
