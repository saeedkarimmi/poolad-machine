<?php

namespace App\Models\Panel;

use App\Traits\PersianDateTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class OrderDetail extends BaseModel
{
    use HasFactory, Userstamps, SoftDeletes, PersianDateTrait;

    protected $table = 'tbl_order_details';
    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function machineModel()
    {
        return $this->belongsTo(MachineModel::class, 'machine_model_id');
    }

    public function systemControl()
    {
        return $this->belongsTo(SystemControl::class, 'system_control_id');
    }

    public function spiral()
    {
        return $this->belongsTo(Spiral::class, 'spiral_id');
    }
}
