<?php

namespace App\Models\Views;

use App\Models\Panel\BaseModel;
use saeedkarimmi\cms\Traits\PersianDateTrait;


class ImportFileView extends BaseModel
{
    use PersianDateTrait;
    protected $table = 'v_import_files';
}
