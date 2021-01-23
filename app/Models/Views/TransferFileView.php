<?php

namespace App\Models\Views;

use App\Models\Panel\BaseModel;
use App\Traits\PersianDateTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferFileView extends BaseModel
{
    use PersianDateTrait;
    protected $table = 'v_transfer_files';
}
