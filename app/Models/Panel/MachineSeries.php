<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineSeries extends BaseModel
{
    public $timestamps = false;
    protected $table = 'tbl_machine_weights';
    protected $guarded = ['id'];
}
