<?php

namespace App\Http\Requests\Post;

use App\Rules\TelRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PostUpdateRequest extends FormRequest
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
            'name'      => 'required|string|max:255',
            'password'  => 'nullable|string|min:6|confirmed',
            'first_name'=> 'required|string|min:3|max:15',
            'last_name' => 'required|string|min:3|max:15',
            'tel'       => ['required','string', new TelRule(),'unique:companies,tel','unique:users,tel,' . Auth::user()->id],
            'email'     => 'required|string|email|max:255|unique:companies,email|unique:users,email,' . Auth::user()->id,
        ];
    }
}
