<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name' => ['string', 'max:50', 'unique:categories,name,' . $this->route('category')->id],
            'description' => ['string'],
            'parent_id' => ['integer'],
            'tags' => ['array'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'The category name is already taken.',
        ];
    }
}
