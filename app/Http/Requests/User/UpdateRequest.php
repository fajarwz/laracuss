<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'alpha_dash', 
                Rule::unique('users')->ignore(request()->username, 'username'),
                'min:3', 'max:50'],
            'password' => ['nullable', 'confirmed', 
                Password::min(8)->mixedCase()->numbers()->symbols()],
            'password_confirmation' => ['nullable'],
            'picture' => ['nullable', 'image', 'max:1500'],
        ];
    }
}
