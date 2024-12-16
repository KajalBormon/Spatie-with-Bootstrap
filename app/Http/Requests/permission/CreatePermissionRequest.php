<?php

namespace App\Http\Requests\permission;

use Illuminate\Foundation\Http\FormRequest;

class CreatePermissionRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:permissions,name',
        ];
    }

    public function messages():array
    {
        return [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be string',
            'name.max' => 'Permission Name must contain max 255 character',
            'name.unique' => 'Permission name must unique Name',
        ];
    }
}
