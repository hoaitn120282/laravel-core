<?php

namespace App\Entities;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contact
 * @package App\Entities
 * @version November 3, 2016, 3:40 pm UTC
 */
class Contact extends Model
{
    use SoftDeletes;

    public $table = 'contacts';
    
    public $timestamps = false;


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'message' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'message' => 'required'
    ];

    
}
