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
     * Scope a query to only include users of a given filter.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array $filter
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeApplyFilter($query, $filters = [])
    {
        if (isset($filters)) {
            $filters = is_array($filters) ? $filters : json_decode($filters, true);
            $opDef = ['==' => '=', 'gt' => '>', 'ge' => '>=', 'lt' => '<', 'le' => '<=', 'eq' => '=', 'ne' => '!=', 'like' => 'like', 'ilike' => 'like', 'in' => 'in', 'notin' => 'notin', 'bw' => 'between'];
            if ($filters) {
                foreach ($filters as $filter) {
                    $where = [];
                    $where['property'] = $filter['property'];
                    $where['operator'] = $opDef[$filter['operator']];
                    $where['value'] = $filter['value'];

                    // Check relationship
                    if (!empty($filter['rela'])) {
                        $where['rela'] = $filter['rela'];
                        $query = $query->whereHas($where['rela'], function ($query) use ($where) {
                            return $this->processFilter($query, $where);
                        });
                    } else {

                        $query = $this->processFilter($query, $where);
                    }
                }
            }
        }

        return $query;
    }

    /**
     * Process Filter
     *
     * @param Illuminate\Database\Query\Builder $query
     * @param Array $where
     *
     * @return Illuminate\Database\Query\Builder
     */
    private function processFilter($query, $where)
    {
        if ($where['operator'] == 'between') {
            $where['value'] = (is_array($where['value'])) ? $where['value'] : explode('', $where['value']);

            return $query->whereBetween($where['property'], $where['value']);
        } elseif ($where['operator'] == 'in') {

            $where['value'] = (is_array($where['value'])) ? $where['value'] : explode('', $where['value']);

            return $query->whereIn($where['property'], $where['value']);
        } elseif ($where['operator'] == 'notin') {

            $where['value'] = (is_array($where['value'])) ? $where['value'] : explode('', $where['value']);

            return $query->whereNotIn($where['property'], $where['value']);
        } else {
            $where['value'] = ($where['operator'] == 'like') ? '%' . strtolower($where['value']) . '%' : strtolower($where['value']);

            return $query->where($where['property'], $where['operator'], $where['value']);
        }
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
