<?php

namespace App\Http\Requests\Token;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TokenCreateRequest extends FormRequest
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
        dd($this->token);
        return [
            'range'     => 'required|integer|between:1,' . $this->company->sold,
            'category'  => 'required|integer|min:2|exists:categories,id'
        ];
    }
}
