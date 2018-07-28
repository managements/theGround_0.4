<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        $max = $this->company->sold + $this->user->range;
        return [
            'range'     => 'required|integer|between:0,' . $max,
            'status'    => 'required|integer|exists:statutes,id'
        ];
    }
}
