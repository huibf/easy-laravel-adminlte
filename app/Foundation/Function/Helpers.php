<?php
/**
 * Created by PhpStorm.
 * User: LukaChen
 * Date: 17/11/16
 * Time: 下午4:55
 */
function p($data)
{
    echo '<pre>'.PHP_EOL;
    print_r($data);
}

function ve($data)
{
    var_dump($data);
    exit;
}

function pe($data, $isJson = false)
{
    if ($isJson === true) {
        $data = json_encode($data);
    }
    p($data);
    exit;
}

// defined cache prefix
function cachePrefix($key)
{
    $mapping = [
        'token' => 'token:'
    ];
    return array_get($mapping, $key, 'undefined:');
}