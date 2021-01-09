<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends BaseModel
{
    public $timestamps = false;
    protected $table = 'tbl_payment_methods';
    protected $guarded = ['id'];
}
