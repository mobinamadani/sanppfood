<?php

namespace App\Http\Requests\Seller\Restaurant;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'seller_id' => ['required', 'integer', 'exists:users,id'],
            'restaurant_category_id' => ['required', 'integer', 'exists:restaurants,id'],
            'address' => ['required', 'string'],
            'account' => ['required'],
            'phone_number' => ['required', 'string'],
        ];
    }
}
