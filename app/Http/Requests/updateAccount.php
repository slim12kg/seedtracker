<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class updateAccount extends FormRequest
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
            'firstname' => ['required','max:255'],
            'lastname' => ['required','max:255'],
            'gender' => ['required','in:male,female,other'],
            'profile_image' => ['image'],
            'phone' => ['required','min:11','max:255', Rule::unique('users','phone')->ignore(auth()->user()->id)],
            'email' => ['required','email','max:255', Rule::unique('users','email')->ignore(auth()->user()->id)],
            'profession' => ['sometimes','required','max:255'],
        ];
    }
}
