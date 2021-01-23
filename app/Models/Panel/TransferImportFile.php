<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferImportFile extends BaseModel
{

    protected $table = 'tbl_transfer_import_files';
    protected $guarded = ['id'];
}
