<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDiscountRequest extends FormRequest
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
            'percentage' => ['required', 'integer', 'between:5,80'],
            'starts_at' => ['required', 'date'],
            'ends_at' => ['required', 'date', 'after_or_equal:starts_at'],
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => 'A termék kötelező.',
            'product_id.exists' => 'A megadott termék nem létezik.',
            'product_id.unique' => 'A kedvezmény már létezik a megadott termékhez.',
            'percentage.required' => 'A kedvezmény mértéke kötelező.',
            'percentage.integer' => 'A kedvezmény mértéke számnak kell lennie.',
            'percentage.between' => 'A kedvezmény mértéke 5 és 80 között kell legyen.',
            'starts_at.required' => 'A kezdési időpont kötelező.',
            'starts_at.date' => 'A kezdési időpontnak dátumnak kell lennie.',
            'ends_at.required' => 'A befejezési időpont kötelező.',
            'ends_at.date' => 'A befejezési időpontnak dátumnak kell lennie.',
            'ends_at.after_or_equal' => 'A befejezési időpontnak nagyobbnak vagy egyenlőnek kell lennie a kezdési időponttal.',
        ];
    }
}
