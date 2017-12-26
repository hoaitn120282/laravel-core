<?php

namespace App\Modules\SiteManager\Models;

use Illuminate\Database\Eloquent\Model;

class ClinicInfo extends Model
{
    protected $table = 'clinic_info';
    protected $primaryKey = 'clinic_info_id';
    public $timestamps = true;
    protected $fillable = array('clinic_id', 'site_name', 'site_slogan', 'username', 'email', 'password', 'description');

    public function site() {
        return $this->belongsTo('App\Modules\SiteManager\Models\Clinic','clinic_id');
    }


}