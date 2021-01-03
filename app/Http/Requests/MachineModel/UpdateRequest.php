<?php

namespace App\Http\Requests\MachineModel;

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
            'machine_drive_id'  => ['required', 'exists:tbl_machine_drives,id'],
            'machine_weight_id' => ['required', 'exists:tbl_machine_weights,id'],
            'machine_series_id' => ['required', 'exists:tbl_machine_series,id'],
            'machine_type_id'   => ['required', 'exists:tbl_machine_types,id'],
        ];
    }
}
