<?php

namespace App\Http\Requests\ImportFile;

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
            'order_id'                  => ['required', 'exists:tbl_orders,id'],
            'file_number'               => ['required', 'string', 'max:50'],
            'order_registration_code'   => ['nullable', 'string', 'max:50'],
            'incoterm'                  => ['nullable', 'string', 'max:50'],
            'proforma_number'           => ['nullable', 'string', 'max:50'],
            'currency_id'               => ['nullable', 'string', 'max:50'],
            'bank_id'                   => ['nullable', 'string', 'max:50'],
            'order_register_completion_date'        => ['nullable', 'date'],
            'order_register_issue_date'             => ['nullable', 'date'],
            'order_register_validity_date'          => ['nullable', 'date'],
            'currency_allocate_application_date'    => ['nullable', 'date'],
            'currency_allocate_issue_date'          => ['nullable', 'date'],
            'validity_currency_allotment_date'      => ['nullable', 'date'],
            'order_details'                         => ['required', 'array'],
            'order_details.*.order_detail_id'       => ['required', Rule::exists('tbl_order_details', 'id')->where(function ($q){
                $q->where('documented', 0)->where('order_id', $this->request->get('order_id'));
            })], // todo: belongs to only this order
        ];
    }
}
