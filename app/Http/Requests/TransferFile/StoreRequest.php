<?php

namespace App\Http\Requests\TransferFile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            "detail_ids"            => ['required' , 'array'],
            "detail_ids.*"          => ['required' , 'exists:tbl_import_file_details,id'], // todo :check documented or not
            "shipping_name"         => ['required' , 'string', 'max:50'],
            "insurance_number"      => ['required' , 'string', 'max:50'],
            "freight_number"        => ['required' , 'string', 'max:50'],
            "freight_date"          => ['required' , 'jdate', 'max:20'],
            "arrival_notice_date"   => ['nullable' , 'jdate', 'max:20'],
            "release_date"          => ['nullable' , 'jdate', 'max:20'],


            'transport_details'     => ['required', 'array'],
            'transport_details.*.container_id' => ['required', 'exists:tbl_containers,id'],
            'transport_details.*.unit_price'    => ['required', 'digits_between:1,20'],
            'transport_details.*.count'         => ['required', 'digits_between:1,10'],
        ];
    }
}
