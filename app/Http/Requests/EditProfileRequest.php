<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class EditProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' =>[
                'required', 'string', 'max:255'
            ],
            'email' => [
                'required', 'email', 'max:255', Rule::unique('users', 'email')->ignore(Auth::user()->id)
            ],
            'nik' =>[
                'required', 'numeric', 'digits:16'
            ],
            'telp' =>[
                'required', 'numeric', 'digits_between:12,13'
            ],
        ];
    }
}
