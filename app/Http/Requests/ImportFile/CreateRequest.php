<?php

namespace App\Http\Requests\ImportFile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
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
            'order_id'  => ['required', 'exists:tbl_orders,id'],
            'details'   => ['required', 'array'],
            'details.*' => ['required', Rule::exists('tbl_order_details', 'id')->where(function ($q){
                $q->where('documented', 0);
            })],
        ];
    }

    public function messages()
    {
        return [
            'details.required' => 'انتخاب حداقل یک مورد از آیتم ها الزامی می باشد.'
        ];
    }
}
