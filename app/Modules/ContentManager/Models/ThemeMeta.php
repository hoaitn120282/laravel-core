<?php

namespace App\Modules\ContentManager\Models;

use Illuminate\Database\Eloquent\Model;

class ThemeMeta extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'theme_meta';
    protected $fillable = array('meta_group', 'meta_key', 'meta_value');
    public $timestamps = false;

    public function getValue()
    {
        $value = unserialize($this->meta_value);
        return $value;
    }

    /**
     * Get meta option
     *
     * @param string $key
     * @return mixed
     */
    public function getOption($key, $value = 'value')
    {
        $options = $this->getValue();
        foreach ($options as $option) {
            if ($option['name'] == $key) {

                return isset($option[$value])?$option[$value]:[];
            }
        }
    }

    /**
     * Scope query get meta by group
     *
     * @param Illuminate\Database\Query\Builder $query
     * @param string $group
     * @param string $operator
     * @return Illminate\Database\Query\Buider
     */
    public function scopeMetaGroup($query, $group, $operator = '=')
    {
        return $query->where('meta_group', $operator, $group);
    }

    /**
     * Scope query get options by key
     *
     * @param Illuminate\Database\Query\Builder $query
     * @param string $key
     * @param string $operator
     * @return Illuminate\Database\Query\Builder
     */
    public function scopeOptionsKey($query, $key, $operator = '=')
    {
        return $query->where('meta_group', 'options')
            ->where('meta_key', $operator, $key);
    }

}
