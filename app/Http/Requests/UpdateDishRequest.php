<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDishRequest extends FormRequest
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
            'ingredients' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'decimal:0,2'],
            'image' => ['required', 'image',],
            'visibility' => ['nullable', 'boolean'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'name is require',
            'name.string' => 'name must be text',
            'name.max' => 'name must not exceed 50 characters',

            'ingredients.required' => 'ingredients are require',
            'ingredients.string' => 'ingredients fields must be text',

            'description.string' => 'description must be text',

            'price.required' => 'price is require',
            'price.numeric' => 'price must be a number',
            'price.decimal' => 'price can only have 2 values after decimal point',

            'image.required' => 'image is require',
            'image.image' => 'image must be a image',

            'visibility.boolean' => 'visibility must be value among those indicated'
        ];
    }
}