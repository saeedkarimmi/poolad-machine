<?php

namespace App\Http\Requests\Seller;

use App\Rules\RouteExist;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreRequest extends FormRequest
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
            'name'          => ['required', 'string', 'max:50'],
            'phoneNumber'   => ['required', 'string', 'max:20'],
            'email'         => ['nullable', 'email', 'max:50'],
            'tel'           => ['nullable', 'string', 'max:20'],
            'fax'           => ['nullable', 'string', 'max:20'],
            'agent'         => ['nullable', 'string', 'max:50'],
            'address'       => ['nullable', 'string', 'max:255'],
        ];
    }
}
