<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:5',
                'max:64',
                Rule::unique('products', 'name')
            ],
            'price' => 'required|int|min:1'
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Ime je obavezno",
            "name.min" => "Ime mora biti najmanje 5 karaktera"
        ];
    }
}
