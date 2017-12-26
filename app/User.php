<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\UserACL;

class User extends Authenticatable
{
    use UserACL;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'photo', 'description'
    ];

    protected $cast = [
        'is_admin' => 'boolean',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function meta()
    {
        return $this->hasMany('App\Modules\ContentManager\Models\UserMeta','user_id');
    }

    public function roles()
    {
        return $this->belongsTo(\App\Entities\Roles::class, 'role_id', 'id');
    }

    public function role()
    {
        return $this->hasOne(\App\Entities\Roles::class);
    }
}
