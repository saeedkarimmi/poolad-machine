<?php

namespace App\Models\Views;

use App\Models\Panel\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use saeedkarimmi\cms\Traits\PersianDateTrait;

class OrderView extends BaseModel
{
    use PersianDateTrait;
    protected $table = 'v_order';
}
