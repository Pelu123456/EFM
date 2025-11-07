<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'code_name' => [
                'required',
                'string',
                'max:3',
                'regex:/^[A-Z]{1,3}$/',
            ],
            'position_alias_id' => 'required|exists:position_aliases,id',
        ];
    }
}
