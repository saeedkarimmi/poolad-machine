<?php

namespace App\Models\Views;

use App\Models\Panel\BaseModel;
use App\Traits\PersianDateTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderView extends BaseModel
{
    use PersianDateTrait;
    protected $dates =[
        'registered_at'
    ];
    protected $table = 'v_order';
}
