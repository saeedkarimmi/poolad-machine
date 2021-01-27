<?php

namespace App\Models\Panel;

use saeedkarimmi\cms\Traits\PersianDateTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class MachineModel extends BaseModel
{
    public $timestamps = false;
    protected $table = 'tbl_machine_models';
    protected $guarded = ['id'];

    public function series()
    {
        return $this->belongsTo(MachineSeries::class, 'machine_series_id');
    }

    public function weight()
    {
        return $this->belongsTo(MachineWeight::class, 'machine_weight_id');
    }

    public function drive()
    {
        return $this->belongsTo(MachineDrive::class, 'machine_drive_id');
    }

    public function type()
    {
        return $this->belongsTo(MachineType::class, 'machine_type_id');
    }

    public function getEnNameAttribute()
    {
        return $this->drive->description.' '.$this->weight->description . ' '.$this->series->code;
    }

    public function getFaNameAttribute()
    {
        return $this->type->description.' '.$this->drive->description.' '.$this->weight->description . ' '.$this->series->description;
    }
}
