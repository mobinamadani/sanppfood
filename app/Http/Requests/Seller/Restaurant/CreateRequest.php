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
            'name' => ['required'],
//            'seller_id' => ['required'],
            'category_id' => ['required', 'exists:restaurant_categories,id'],
            'address' => ['required'],
            'account' => ['required'],
            'phone_number' => ['required'],
        ];
    }
}
