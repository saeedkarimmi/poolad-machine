<?php

namespace App\Models\Panel;

use App\Models\Panel\BaseModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use saeedkarimmi\cms\Traits\PersianDateTrait;
use Wildside\Userstamps\Userstamps;

/**
 * @property integer id
 * @property string name
 * @property string description
 * @property boolean status
 * @property integer created_by
 * @property integer updated_by
 * @property string created_at
 * @property string updated_at
 */
class Group extends BaseModel
{
    use HasFactory, Userstamps, SoftDeletes, PersianDateTrait;

    protected $table = "groups";
    protected $guarded = ['id'];

    public function users()
    {
        return $this->morphedByMany(User::class, 'groupable', 'groupables');
    }
}
