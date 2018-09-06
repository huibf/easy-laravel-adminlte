<?php
/**
 * Created by PhpStorm.
 * User: LukaChen
 * Date: 17/11/16
 * Time: 下午4:55
 */

namespace App\Foundation\Response;

class SystemCode
{

    public function range()
    {
        return [1, 999];
    }

    const SYSTEM_SUCCESS         = ['code' => 0, 'message' => 'ok', 'flag' => ResponseData::FLAG_SUCCESS];
    const SYSTEM_EXCEPTION       = ['code' => 1, 'message' => 'system exception', 'flag' => ResponseData::FLAG_FAIL];
    const SYSTEM_BUSY            = ['code' => 2, 'message' => 'system busy', 'flag' => ResponseData::FLAG_FAIL];
    const SYSTEM_NOT_FOUND_ROUTE = ['code' => 3, 'message' => 'invalid interface', 'flag' => ResponseData::FLAG_FAIL];

    const PARAMETER_ERROR        = ['code' => 10, 'message' => 'params error', 'flag' => ResponseData::FLAG_NOTICE];
    const PARAMETER_ERROR_WITH_MESSAGE = ['code' => 11, 'message' => '#{message}', 'flag' => ResponseData::FLAG_NOTICE];
    const ERROR_WITH_MESSAGE           = ['code' => 12, 'message' => '#{message}', 'flag' => ResponseData::FLAG_NOTICE];
    const NOT_FOUND                    = ['code' => 13, 'message' => 'not found', 'flag' => ResponseData::FLAG_NOTICE];
    const EXISTS_DATA                  = ['code' => 14, 'message' => 'exists data', 'flag' => ResponseData::FLAG_NOTICE];
    const ADD_ERROR                    = ['code' => 15, 'message' => 'add fail', 'flag' => ResponseData::FLAG_NOTICE];
    const UPDATE_ERROR                 = ['code' => 16, 'message' => 'update fail', 'flag' => ResponseData::FLAG_NOTICE];
    const NOT_REPEAT                   = ['code' => 17, 'message' => 'not repeat', 'flag' => ResponseData::FLAG_NOTICE];
    const DELETE_ERROR                 = ['code' => 18, 'message' => 'delete fail', 'flag' => ResponseData::FLAG_NOTICE];
    const SYSTEM_ERROR                 = ['code' => 19, 'message' => 'system error', 'flag' => ResponseData::FLAG_NOTICE];
    const NOT_LOGIN                    = ['code' => 20, 'message' => 'not login or login expire', 'flag' => ResponseData::FLAG_FAIL];

}
