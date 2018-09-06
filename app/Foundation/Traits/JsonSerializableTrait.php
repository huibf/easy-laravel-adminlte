<?php
/**
 * Created by PhpStorm.
 * User: LukaChen
 * Date: 17/11/16
 * Time: 下午4:55
 */

namespace App\Foundation\Traits;

trait JsonSerializableTrait
{
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
