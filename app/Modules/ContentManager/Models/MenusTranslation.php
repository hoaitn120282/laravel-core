<?php

namespace App\Modules\ContentManager\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Trans;

class MenusTranslation extends Model
{
    protected $primaryKey = 'post_translations_id';
    protected $table = 'post_translations';
}
