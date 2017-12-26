<?php

namespace App\Modules\LanguageManager\Models;

use Illuminate\Database\Eloquent\Model;

class Translate extends Model
{
    protected $table = 'translate';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['trans_key', 'trans_meta'];

}