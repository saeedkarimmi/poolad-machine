<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class TransferFileDetail extends BaseModel
{
    use HasFactory, Userstamps;

    protected $table = 'tbl_transfer_file_details';
    protected $guarded = ['id'];

    public function transferFile()
    {
        return $this->belongsTo(TransferFile::class, 'transfer_file_id');
    }

    public function container()
    {
        return $this->belongsTo(Container::class, 'container_id');
    }

}
