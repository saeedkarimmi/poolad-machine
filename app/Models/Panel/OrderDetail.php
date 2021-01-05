<?php

namespace App\Models\Panel;

use App\Traits\PersianDateTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class OrderDetail extends Model
{
    use HasFactory, Userstamps, SoftDeletes, PersianDateTrait;

    protected $table = 'tbl_order_details';
    protected $guarded = ['id'];
}
