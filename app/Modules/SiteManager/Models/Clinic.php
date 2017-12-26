<?php

namespace App\Modules\SiteManager\Models;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $table = 'site';
    protected $primaryKey = 'clinic_id';
    public $timestamps = true;
    protected $fillable = array('domain', 'is_sanmax_hosting', 'contact_info', 'description');

    public static $rules = [

    ];

    /*
     *  relationship with hosting
     * */
    public function hosting()
    {
        return $this->hasOne('App\Modules\SiteManager\Models\ClinicHosting','clinic_id');
    }
    /*
     *  relationship with database
     * */
    public function database()
    {
        return $this->hasOne('App\Modules\SiteManager\Models\ClinicDatabase','clinic_id');
    }

    /*
     *  relationship with info
     * */
    public function info()
    {
        return $this->hasOne('App\Modules\SiteManager\Models\ClinicInfo','clinic_id');
    }

    /*
     *  relationship with language
     * */
    public function language()
    {
        return $this->hasMany('App\Modules\SiteManager\Models\ClinicLanguage','clinic_id', 'clinic_id');
    }

    /*
     *  relationship with theme
     * */
    public function theme()
    {
        return $this->hasMany('App\Modules\SiteManager\Models\ClinicTheme','clinic_id', 'clinic_id');
    }

    public function themes()
    {
        return $this->belongsToMany('App\Modules\ContentManager\Models\Themes', 'clinic_theme', 'clinic_id', 'theme_id');
    }


}