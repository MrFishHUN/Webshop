<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'title' => ['string', 'max:50', 'unique:products,title,' . $this->route('product')->id],
            'description' => ['string'],
            'summary' => ['string'],
            'price' => ['integer', 'min:0'],
            'category_id' => ['exists:categories,id'],
            'picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'quantity' => ['integer', 'min:1'],
            'in_stock' => ['boolean','nullable'],
            'visible' => ['boolean', 'nullable'],
        ];
    }

    public function messages()
    {
        return [
            'title.string' => 'A címnek szövegnek kell lennie.',
            'title.max' => 'A cím maximum 50 karakter hosszú lehet.',
            'title.unique' => 'A cím már létezik.',
            'description.string' => 'A leírásnak szövegnek kell lennie.',
            'summary.string' => 'Az összefoglalónak szövegnek kell lennie.',
            'price.integer' => 'Az árnak számnak kell lennie.',
            'price.min' => 'Az árnak legalább 0-nak kell lennie.',
            'category_id.exists' => 'A megadott kategória nem létezik.',
            'picture.image' => 'A képnek képfájl formátumúnak kell lennie.',
            'picture.mimes' => 'A kép formátuma jpeg, png, jpg, gif vagy svg lehet.',
            'picture.max' => 'A kép maximális mérete 2MB lehet.',
            'quantity.integer' => 'A mennyiségnek számnak kell lennie.',
            'quantity.min' => 'A mennyiség legalább 1 legyen.',
        ];
    }
}
