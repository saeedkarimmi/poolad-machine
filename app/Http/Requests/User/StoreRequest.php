<?php

namespace App\Http\Requests\User;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    use PasswordValidationRules;

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
            'name'          => ['required', 'string'],
            'roles'         => ['required', 'array'],
            'roles.*'       => ['required', 'exists:roles,id'],
            'password'      => $this->passwordRules(),
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ];
    }
}
