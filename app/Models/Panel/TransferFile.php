<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Wildside\Userstamps\Userstamps;

/**
 * @property mixed id
 */
class TransferFile extends BaseModel
{
    use HasFactory, Userstamps, LogsActivity, SoftDeletes;

    protected $table = 'tbl_transfer_files';
    protected $guarded = ['id'];

    public function details()
    {
        return $this->hasMany(TransferFileDetail::class, 'transfer_file_id');
    }
}
