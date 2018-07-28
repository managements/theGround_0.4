<?php

namespace App\Http\Requests\Deal;

use App\Rules\TelRule;
use Illuminate\Foundation\Http\FormRequest;

class ProviderCreateRequest extends FormRequest
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
            'name'      => 'required|string|min:3|max:20',
            'email'     => 'nullable|email',
            'tel'       => ['nullable',new TelRule()],
            'speaker'   => 'nullable|string|min:3|max:10',
            'address'   => 'nullable|min:5|max:150',
            'city'      => 'nullable|integer|exists:cities,id',
        ];
    }
}
