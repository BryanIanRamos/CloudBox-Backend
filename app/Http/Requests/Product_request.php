<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Product_request extends FormRequest
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
            'prod_name'     => 'required|string|max:255',
            'price'         => 'required|numeric|between:0.01,9999999.99',
            'status'        => 'string|max:255',
            'category_name' => 'string|max:255',
        ];
    }
}
