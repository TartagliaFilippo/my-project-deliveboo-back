<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'lastname' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'string', 'min:8', 'max:20'],
            'address' => ['required', 'string'],
            'address_number' => ['required', 'string'],
            'total' => ['required', 'numeric', 'deciamal: 0,2'],
            'success' => ['required', 'boolean'],
            'date' => ['required', 'date_format:Y-m-d\\TH:i:sO'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'name is require',
            'name.string' => 'name must be text',
            'name.max' => 'name must not exceed 50 characters',

            'lastname.required' => 'lastname is require',
            'lastname.string' => 'lastname must be text',
            'lastname.max' => 'lastname must not exceed 50 characters',

            'email.required' => 'email is require',
            'email.string' => 'email must be text',

            'phone.required' => 'phone is require',
            'phone.string' => 'phone must be text',
            'phone.min' => 'phone cannot be smaller than 8 characters',
            'phone.max' => 'phone must not exceed 20 characters',

            'address.required' => 'address is require',
            'address.string' => 'address must be text',

            'address_number.required' => 'address number is require',
            'address_number.string' => 'address number must be text',

            'total.required' => 'total is require',
            'total.numeric' => 'total must be a number',
            'total.decimal' => 'total can only have 2 values after decimal point',

            'success.required' => 'success is require',
            'success.boolean' => 'success must be boolean value',

            'date.require' => 'date is require',
            'date.date_format' => 'date must be a date and time',
        ];
    }
}