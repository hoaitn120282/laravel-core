<?php

namespace App\Modules\SiteManager\Models;

use Illuminate\Database\Eloquent\Model;

class ThemeType extends Model
{
    protected $table = 'theme_type';
    protected $primaryKey = 'theme_type_id';
    public $timestamps = true;
    protected $fillable = array('name', 'description');

    public static $rules = [

    ];
}