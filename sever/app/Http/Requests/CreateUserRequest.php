<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'username' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:users,email',
           'password' => [
                            'required',
                            'string',
                            'min:8',
                            'regex:/[a-z]/',
                            'regex:/[A-Z]/',
                            'regex:/[0-9]/',
                            'regex:/[@$!%*?&]/',
                            'confirmed',
                        ],
           'role' => 'required|in:user,admin,manager',
        ];
    }
}
