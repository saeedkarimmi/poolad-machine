<?php

namespace App\Models\Views;

use App\Models\Panel\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use saeedkarimmi\cms\Traits\PersianDateTrait;

class TransferFileView extends BaseModel
{
    use PersianDateTrait;
    protected $table = 'v_transfer_files';
}
