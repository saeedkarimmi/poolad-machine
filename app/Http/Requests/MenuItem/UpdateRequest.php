<?php

namespace App\Http\Requests\MenuItem;

use App\Rules\RouteExist;
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
            'name'      => ['required', 'string', 'max:100'],
            'link'      => ['required', 'string', new RouteExist()],
            'parent_id' => ['nullable', 'exists:menu_items,id','not_in:'.$this->menu_item->id]
        ];
    }
}
