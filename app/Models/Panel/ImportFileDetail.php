<?php

namespace App\Models\Panel;

use App\Traits\PersianDateTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

/**
 * @property boolean documented
 */
class ImportFileDetail extends BaseModel
{
    use HasFactory, Userstamps, SoftDeletes, PersianDateTrait;

    protected $table = 'tbl_import_file_details';
    protected $guarded = ['id'];

    public function orderDetail()
    {
        return $this->belongsTo(OrderDetail::class, 'order_detail_id');
    }

    public function isDocumented()
    {
        return $this->documented;
    }
}
