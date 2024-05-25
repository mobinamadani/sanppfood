<?php

namespace App\Http\Requests\API\Address;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
            'title'=> ['required', 'string'],
            'address' => ['required', 'string'],
            'latitude' => ['required', 'string'],
            'longitude' => ['required',  'string'],
            'shopper_id' => ['required', 'integer'],
        ];
    }
}
