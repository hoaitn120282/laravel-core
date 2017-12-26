<?php

namespace App\Modules\TemplateManager\Models;

use Illuminate\Database\Eloquent\Model;

class TemplateMeta extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'theme_meta';
    public $timestamps = false;
    protected $fillable = array('meta_group', 'meta_key', 'meta_value');

    /**
     * Get meta value
     *
     * @return json
     */
    public function getValue()
    {
        $value = unserialize($this->meta_value);
        return $value;
    }

    /**
     * Get meta option
     */
    public function getOption($key)
    {
        $options = $this->getValue();
        foreach ($options as $option) {
            if ($option['name'] == $key) {
                return $option['value'];
            }
        }
    }


    /**
     * Scope query options by key
     *
     * @param Illuminate\Database\Query\Builder $query
     * @param string $key
     * @return Illuminate\Database\Query\Builder
     */
    public function scopeOptionsKey($query, $key, $operator = '=')
    {
        return $query->where('meta_group', 'options')
            ->where('meta_key', $operator, $key);
    }
}
