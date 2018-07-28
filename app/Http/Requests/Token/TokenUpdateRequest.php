<?php

namespace App\Http\Requests\Token;

use Illuminate\Foundation\Http\FormRequest;

class TokenUpdateRequest extends FormRequest
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
        $max = $this->company->sold + $this->token->range;
        return [
            'range'     => 'required|integer|between:1,' . $max,
            'category'  => 'required|integer|min:2|exists:categories,id'
        ];
    }
}
