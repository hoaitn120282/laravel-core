<?php

namespace App\Modules\SiteManager\Models;

use Illuminate\Database\Eloquent\Model;

class ClinicLanguage extends Model
{
    protected $table = 'clinic_language';
    protected $primaryKey = 'clinic_language_id';
    public $timestamps = true;
    protected $fillable = array('language_id', 'clinic_id');

    public function site() {
        return $this->belongsTo('App\Modules\SiteManager\Models\Clinic','clinic_id');
    }
}