<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;


class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {

        return true;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [


        //     'name' => ['required','string','max:255'],
        //     'email' => ['required', 'unique:users'],
        //    'mobile' => ['required','string','max:20'],
        //    'gender'=>['required',Rule::in(['male', 'female'])],
        //    'password'=>['required,confirmed'],



           'name' => 'required',
           'email' => 'required|unique:users',
           'mobile' => 'required|max:20',
           'gender' => ['required', Rule::in(['male', 'female'])],
           'password' => 'required|confirmed',
        ];
    }
}
