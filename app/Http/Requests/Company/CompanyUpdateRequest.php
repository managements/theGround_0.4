<?php

namespace App\Http\Requests\Company;

use App\Rules\TelRule;
use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
            'brand_'    => 'nullable|mimes:jpeg,bmp,png',
            'name'      => 'required|string|max:20|min:3|unique:companies,name,' . $this->company->id,
            'email'     => 'required|email|unique:companies,email,' . $this->company->id,
            'tel'       => ['required','string', new TelRule(),'unique:companies,tel,' . $this->company->id],
            'speaker'   => 'required|string|min:3|max:25',
            'licence'   => 'required|string|min:2|max:50',
            'address'   => 'required|string|min:10|max:50',
            'build'     => 'required|string|max:5',
            'floor'     => 'required|string|max:5',
            'apt_nbr'   => 'required|string|max:5',
            'zip'       => 'required|string|min:3|max:10',
            'city'      => 'required|exists:cities,id',
            'turnover'  => 'required|string|min:3|max:10'
        ];
    }
}
