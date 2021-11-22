<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'customer' => 'required|exists:customers,id',
            'status' => 'required|in:pending,preparing,delivered,cancelled',
            'products' => 'required|array|min:1',
            'products.*.id' => 'required|exists:products,id'
        ];
    }

    public function messages()
    {
        return [
            'customer.exists' => 'O cliente informado não existe.',
            'customer.required' => 'É necessario informar o usuario.',
            'products.*.id.exists' => 'O produto informado não existe.',
        ];
    }
}
