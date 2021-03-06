<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use saeedkarimmi\cms\Traits\PersianDateTrait;
use Wildside\Userstamps\Userstamps;

class ImportFile extends BaseModel
{
    use HasFactory, Userstamps, SoftDeletes, PersianDateTrait;

    protected $table = 'tbl_import_files';
    protected $guarded = ['id'];

    public function details()
    {
        return $this->hasMany(ImportFileDetail::class, 'import_file_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    /*****************************************/

    public function hasUnDocumentedDetails(): bool
    {
        return (bool) $this->details()->where('documented', 0)->count();
    }
}
