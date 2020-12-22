<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'          => ['required', 'string'],
            'last_name'     => ['required', 'string'],
            'roles'         => ['required', 'array'],
            'roles.*'       => ['required', 'exists:roles,id'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$this->user->id],
            'status'        => ['required' , 'in:1,0']
        ];
    }
}
