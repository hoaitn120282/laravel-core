<?php

namespace App\Entities;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Clinic
 * @package App\Entities
 * @version November 3, 2016, 3:40 pm UTC
 */
class Clinic extends Model
{
    use SoftDeletes;

    public $table = 'site';

    public $timestamps = false;


    protected $dates = ['deleted_at'];

    public $fillable = [
        'domain', 'is_sanmax_hosting', 'contact_info', 'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'domain' => 'string',
        'is_sanmax_hosting' => 'integer',
        'contact_info' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
//    public static $rules = [
//        'name' => 'required',
//        'email' => 'required|email',
//        'message' => 'required'
//    ];


}
