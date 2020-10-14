<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaleRequest extends FormRequest
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
            'items.*.product_id' => 'required|numeric|exists:products,id',
            'items.*.quantity' => 'required|numeric',
            'items.*.discount_percentage' => 'nullable|numeric',
            'customer_id' => [
                "numeric",
                "required",
                Rule::exists('persons', 'id')
                    ->where('customer', true),
            ]
        ];
    }
}
