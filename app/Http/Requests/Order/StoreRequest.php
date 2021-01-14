<?php

namespace App\Http\Requests\Order;

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
            'order_name'        => ['required', 'string', 'max:50', 'unique:tbl_orders,order_name'],
            'seller_id'         => ['required', 'exists:tbl_sellers,id'],
            'currency_id'       => ['required', 'exists:tbl_currencies,id'],
            'payment_method_id' => ['required', 'exists:tbl_payment_methods,id'],
            'registered_at'     => ['required', 'jdate'],
            'sum'               => ['required', 'numeric'],
            'description'       => ['nullable', 'string', 'max:255'],

            'machine_models' => ['required', 'array'],
            'machine_models.*.machine_model_id'     => ['required', 'exists:tbl_machine_models,id'],
            'machine_models.*.spiral_id'            => ['required', 'exists:tbl_spirals,id'],
            'machine_models.*.system_control_id'    => ['required', 'exists:tbl_system_controls,id'],
            'machine_models.*.FOB_price'                  => ['required', 'numeric'],
        ];
    }
}
