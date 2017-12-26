<?php

namespace App\Modules\ContentManager\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function meta()
    {
        return $this->hasMany('App\Modules\ContentManager\Models\UserMeta', 'user_id', 'id');
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
}
