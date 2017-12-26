<?php

namespace App\Modules\TemplateManager\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $table = 'themes';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = array('parent_id', 'theme_type_id', 'name', 'machine_name', 'theme_root', 'version', 'author', 'author_url', 'description', 'image_preview', 'status', 'is_publish');

    /**
     * Relationship belongs to theme
     */
    public function parent()
    {
        return $this->belongsTo('App\Modules\TemplateManager\Models\Template', 'parent_id', 'id');
    }

    /**
     * Relationship one - many ThemeMeta
     */
    public function meta()
    {
        return $this->hasMany('App\Modules\TemplateManager\Models\TemplateMeta', 'theme_id');
    }

    /**
     * Get meta options where meta_group
     *
     * @return mixed
     */
    public function metaOptions()
    {
        return $this->meta()->where("meta_group", "options")->get();
    }

    /**
     * Relation ship widget groups
     *
     */
    public function widgetGroups()
    {
        return $this->hasMany('App\Modules\ContentManager\Models\WidgetGroups', 'theme_id');
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
