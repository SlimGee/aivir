<?php

namespace App\Http\Requests;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
{
    use PasswordValidationRules;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('update user', $this->route('user'));
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
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->route('user')->id),
            ],
            'password' => ['sometimes', 'nullable', 'string', Password::default()],
            'role_ids' => ['sometimes', 'nullable', 'array'],
            'role_ids.*' => ['exists:'.config('permission.table_names.roles').',id'],
        ];
    }

    /**
     * Handles a passed validation
     */
    protected function passedValidation()
    {
        if ($this->filled('password')) {
            $this->replace(['password' => Hash::make($this->input('password'))]);
        }
    }
}
