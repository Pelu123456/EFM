<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'founded_year' => ['required', 'integer', 'digits:4', 'min:1850', 'max:' . date('Y')],
            'home_city' => ['nullable', 'string', 'max:255'],
            'organization_id' => ['required', 'exists:organizations,id'],
            'logo' => ['nullable', 'image', 'mimes:png,webp', 'max:2048'],
        ];
    }
}
