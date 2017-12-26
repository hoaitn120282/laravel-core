<?php

namespace App\Modules\SiteManager\Models;

use Illuminate\Database\Eloquent\Model;

class ClinicTheme extends Model
{
    protected $table = 'clinic_theme';
    protected $primaryKey = 'clinic_theme_id';
    public $timestamps = true;
    protected $fillable = array('clinic_id', 'theme_id');

    public function site() {
        return $this->belongsTo('App\Modules\SiteManager\Models\Clinic','clinic_id');
    }
}