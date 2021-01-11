<?php

namespace App\Models\Views;

use App\Models\Panel\BaseModel;
use App\Traits\PersianDateTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportFileView extends BaseModel
{
    use PersianDateTrait;
    protected $dates =[
        'order_register_issue_date',
        'order_register_validity_date',
        'currency_allocate_issue_date',
        'validity_currency_allotment_date'
    ];
    protected $table = 'v_import_files';
}
