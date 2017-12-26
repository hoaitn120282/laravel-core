<?php

namespace App\Modules\SiteManager\Models;

use Illuminate\Database\Eloquent\Model;

class ClinicHosting extends Model
{
    protected $table = 'clinic_hosting';
    protected $primaryKey = 'clinic_hosting_id';
    public $timestamps = true;
    protected $fillable = array('clinic_id', 'host', 'port', 'username','password');

    public function site() {
        return $this->belongsTo('App\Modules\SiteManager\Models\Clinic','clinic_id');
    }
}