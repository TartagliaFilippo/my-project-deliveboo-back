<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string'],
            'address_number' => ['required', 'string'],
            'types' => ['required', 'array'],
            'image' => ['required', 'image'],
            'description' => ['nullable', 'string'],
            'phone' => ['required', 'string', 'min:8', 'max:20'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'name is require',
            'name.string' => 'name must be text',
            'name.max' => 'name must not exceed 50 characters',

            'address.required' => 'address is require',
            'address.string' => 'address must be text',

            'address_number.require' => 'address number is require',
            'address_number.string' => 'address number must be text',

            'types.required' => 'types is require',
            'types.array' => 'types must be a list among those marked',

            'image.required' => 'image is require',
            'image.image' => 'image must be a image',

            'description.string' => '',

            'phone.required' => 'phone number is require',
            'phone.string' => 'phone must be text with numbers',
            'phone.min' => 'phone cannot be smaller than 8 characters',
            'phone.max' => 'name must not exceed 20 characters',
        ];
    }
}