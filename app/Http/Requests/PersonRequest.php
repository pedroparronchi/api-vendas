<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
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
            'email' => "string|email|{$strRequired}",
            'cpf' => "string|{$strRequired}|cpf|unique:persons,cpf"
        ];
    }

    /**
     * Prepare data for validation
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        if ($this->has('cpf')) {
            $this->merge(['cpf' => onlyNumbers($this->cpf)]);
        }
    }
}
