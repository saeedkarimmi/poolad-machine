<?php

/**
 * Created by Saaed Km2.
 * Date: 03/12/2020
 * Time: 09:35 AM
 */


namespace App\Models\Panel;


use App\Traits\PersianDateTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Wildside\Userstamps\Userstamps;

class BaseModel extends Model
{
    use LogsActivity, Userstamps, SoftDeletes, PersianDateTrait;

    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;
}
