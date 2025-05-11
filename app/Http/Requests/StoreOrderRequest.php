<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:20'],
            'street' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'min:8', 'max:20'],
            'delivery' => ['required', 'in:hazhoz,szemelyes'],
            'payment' => ['required', 'in:online,utanvet'],
            'cart_id' => ['required', 'exists:carts,id'],
        ];
    }
    /**
     * Get the custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'phone.required' => 'A telefonszám megadása kötelező.',
            'name.required' => 'A név megadása kötelező.',
            'city.required' => 'A város megadása kötelező.',
            'postcode.required' => 'Az irányítószám megadása kötelező.',
            'street.required' => 'Az utca, házszám és ajtó megadása kötelező.',
            'delivery.required' => 'Válaszd ki az átvételi módot.',
            'delivery.in' => 'Érvénytelen átvételi mód lett megadva.',
            'payment.required' => 'Válaszd ki a fizetési módot.',
            'payment.in' => 'Érvénytelen fizetési mód lett megadva.',
            'cart_id.required' => 'Hiányzik a kosár azonosító.',
            'cart_id.exists' => 'A megadott kosár nem létezik.',
        ];
    }
}
