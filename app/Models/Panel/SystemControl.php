<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemControl extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_system_controls';
    protected $guarded = ['id'];
}
