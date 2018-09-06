<?php
/**
 * Created by PhpStorm.
 * User: LukaChen
 * Date: 17/11/16
 * Time: 下午4:55
 */

namespace App\Foundation\Traits;

use App\Foundation\Response\SystemCode;
use App\Foundation\Response\ResponseData;
use Validator;


trait ValidatorTrait
{
    public function validator(array $data, array $rules, array $messages = [])
    {
        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {

            return [
                'is_valid'  => false,
                'errors'    => $validator->errors(),
            ];
        }

        return [
            'is_valid'  => true,
            'errors'    => []
        ];
    }

    public function validateErrorResponse($valid, $message)
    {
        foreach ($valid['errors']->getMessages() as $errorKey => $errorMessage) {
            foreach ($message as $mk => $mv) {
                $field = strpos($mk, '.') !== false ? explode('.', $mk) : [$mk];
                if ($field[0] == $errorKey) {
                    return ResponseData::set(SystemCode::PARAMETER_ERROR_WITH_MESSAGE, $valid['errors'], ['message' => $errorMessage]);
                }
            }
        }

        return ResponseData::set(SystemCode::PARAMETER_ERROR, $valid['errors']);
    }

    public function getOkValid()
    {
        return [
            'is_valid'  => true,
            'errors'    => []
        ];
    }

}
