<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class AssignRoleRequest extends FormRequest
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
            'roles' => 'required|array',
        ];
    }

    public function messages()
    {
        return [
            'roles.required' => 'Please select at least one role.',
            'roles.array' => 'Roles must be an array.',
        ];
    }
}
