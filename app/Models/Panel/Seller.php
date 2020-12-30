<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends BaseModel
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_sellers';
    protected $guarded = ['id'];
}
