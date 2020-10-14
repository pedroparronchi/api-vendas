<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
        $strRequired = $this->method() === "POST"
            ? "required"
            : "nullable";

        return [
            'name' => "string|{$strRequired}|max:255",
            'description' => "string|{$strRequired}",
            'image' => "image|{$strRequired}|mimes:jpeg,bmp,png,webp|max:20000",
            'value' => "numeric|{$strRequired}",
            'quantity' => "numeric|{$strRequired}",
            'supplier_id' => [
                "numeric",
                $strRequired,
                Rule::exists('persons', 'id')
                    ->where('supplier', true),
            ]
        ];
    }
}
