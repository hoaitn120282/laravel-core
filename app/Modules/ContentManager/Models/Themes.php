<?php

namespace App\Modules\ContentManager\Models;

use Illuminate\Database\Eloquent\Model;

class Themes extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'themes';

    public $timestamps = false;

    /**
     * Relationship belongs to theme
     */
    public function parent()
    {
        return $this->belongsTo('App\Modules\ContentManager\Models\Themes', 'parent_id', 'id');
    }

    public function meta()
    {
        return $this->hasMany('App\Modules\ContentManager\Models\ThemeMeta', 'theme_id');
    }

    public function metaOptions()
    {
        return $this->meta()->where("meta_group", "options")->get();
    }
    /**
     * Relation ship site site
     */
    public function clinics()
    {
        return $this->belongsToMany(
            'App\Modules\SiteManager\Models\Clinic',
            'clinic_theme', 'theme_id', 'clinic_id'
        );
    }

    /**
     * Boot model
     * @return mixed
     */
    public static function boot()
    {
        parent::boot();

        // Listen event deleting
        static::deleting(function ($node) {
            // Detach relation ship site site
            $node->clinics()->detach();
        });
    }
}
