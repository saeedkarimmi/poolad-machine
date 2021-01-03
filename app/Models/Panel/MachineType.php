<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineType extends Model
{
    public $timestamps = false;
    protected $table = 'tbl_machine_types';
    protected $guarded = ['id'];
}
