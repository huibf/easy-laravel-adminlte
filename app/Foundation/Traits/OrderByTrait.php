<?php
/**
 * Created by PhpStorm.
 * User: LukaChen
 * Date: 17/11/16
 * Time: 下午4:55
 */

namespace App\Foundation\Traits;

use Illuminate\Database\Eloquent\Builder;

trait OrderByTrait
{

    public function scopeSort(Builder $query, $order_by)
    {
        if (empty($order_by))
            return $query;

        if (is_string($order_by))
            return $query->orderByRaw($order_by);
        else {
            foreach ($order_by as $order) {
                list($field, $dir) = $order_by;

                $query->orderBy($field, $dir);
            }
            return $query;
        }

    }

}

