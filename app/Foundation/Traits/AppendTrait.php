<?php
/**
 * Created by PhpStorm.
 * User: LukaChen
 * Date: 17/11/16
 * Time: 下午4:55
 */

namespace App\Foundation\Traits;

trait AppendTrait
{

    public function isAppended($append_field)
    {
        if (!property_exists($this, 'appends')) return false;

        return in_array($append_field, $this->appends);
    }

    public function isAppendable($append_field)
    {
        $append_method = $this->appendMethod($append_field);

        return !in_array($append_field, $this->getFillable())&&method_exists($this, $append_method);
    }

    public function appendMethod($append_field)
    {
        return 'get' . studly_case($append_field) . 'Attribute';
    }

    public function tryAppend($append_field)
    {
        if ($this->isAppended($append_field)) return true;

        if ($this->isAppendable($append_field)) {
            $this->appends[] = $append_field;
            return true;
        }

        return false;
    }

    public function dotGet($key, $default = null)
    {
        $keys = explode('.', $key);

        $val = $this;
        foreach ($keys as $key) {
            $val = array_get($val->attributes, $key, array_get($val->relations, $key));

            if ($val === null) {
                return $default;
            }
        }

        return $val;

    }

    public function tryLoadWithTrashed($relations)
    {
        if (is_string($relations)) $relations = func_get_args();

        $to_load_relations = [];
        foreach ($relations as $relation => $constraint) {

            if (is_numeric($relation)) {
                $relation = $constraint;
                $constraint = function ($q) {
                    return $q->withTrashed();
                };
            }

            if ($this->dotGet($relation) === null) {
                $to_load_relations[$relation] = $constraint;
            }
        }

        if ($to_load_relations) {
            $this->load($to_load_relations);
        }
    }

    public function tryLoad($relations)
    {
        if (is_string($relations)) $relations = func_get_args();

        $to_load_relations = [];
        foreach ($relations as $relation => $constraint) {

            if (is_numeric($relation)) {
                $relation = $constraint;
                $constraint = function () {
                };
            }

            if (!array_key_exists($relation, $this->relations)) {
                $to_load_relations[$relation] = $constraint;
            }
        }

        if ($to_load_relations) {
            $this->load($to_load_relations);
        }
    }
}
