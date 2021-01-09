<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends BaseModel
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_containers';
    protected $guarded = ['id'];
}
