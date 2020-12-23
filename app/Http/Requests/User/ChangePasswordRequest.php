<?php

namespace App\Http\Requests\User;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Foundation\Http\FormRequest;
use Laravel\Fortify\Rules\Password;

class ChangePasswordRequest extends FormRequest
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
            'last_password'         => ['required', 'string', new Password],
            'new_password'          => array_merge($this->passwordRules() , ['different:last_password']),
        ];
    }
}
