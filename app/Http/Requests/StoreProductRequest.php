<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:50', 'unique:products,title'],
            'description' => ['required', 'string'],
            'summary' => ['required', 'string'],
            'price' => ['required', 'integer', 'min:0'],
            'category_id' => ['required', 'exists:categories,id'],
            'picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'quantity' => ['required', 'integer', 'min:1'],
            'in_stock' => ['boolean','nullable'],
            'visible' => ['boolean', 'nullable'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'A cím kötelező.',
            'title.string' => 'A címnek szövegnek kell lennie.',
            'title.max' => 'A cím maximum 50 karakter hosszú lehet.',
            'title.unique' => 'A cím már létezik.',
            'description.required' => 'A leírás kötelező.',
            'description.string' => 'A leírásnak szövegnek kell lennie.',
            'summary.required' => 'Az összefoglaló kötelező.',
            'summary.string' => 'Az összefoglalónak szövegnek kell lennie.',
            'price.required' => 'Az ár kötelező.',
            'price.integer' => 'Az árnak számnak kell lennie.',
            'price.min' => 'Az árnak legalább 0-nak kell lennie.',
            'category_id.required' => 'A kategória kötelező.',
            'category_id.exists' => 'A megadott kategória nem létezik.',
            'picture.image' => 'A képnek képfájl formátumúnak kell lennie.',
            'picture.mimes' => 'A kép formátuma jpeg, png, jpg, gif vagy svg lehet.',
            'picture.max' => 'A kép maximális mérete 2MB lehet.',
            'quantity.required' => 'A mennyiség kötelező.',
            'quantity.integer' => 'A mennyiségnek számnak kell lennie.',
            'quantity.min' => 'A mennyiség legalább 1 legyen.',
        ];
    }
}
