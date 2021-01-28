<?php

namespace App\Http\Requests\TransferFile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ChangeStatusRequest extends FormRequest
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
        $rules= [];
       if ($this->transfer_file->status == constant('COMPLETE_FILES')){
           $rules =  [
               'arrival_notice_date' => ['required' ,  'jdate', 'max:20']
           ];
       }

       if ($this->transfer_file->status == constant('ARRIVAL_NOTICE')){
           $rules =  [
               'release_date' => ['required' ,  'jdate', 'max:20']
           ];
       }

        return  $rules;
    }
}
