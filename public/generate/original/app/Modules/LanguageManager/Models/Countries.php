<?php

namespace App\Modules\LanguageManager\Models;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    protected $table = 'countries';
    protected $primaryKey = 'country_id';
    public $timestamps = false;
    protected $fillable = array('name', 'locale');

}