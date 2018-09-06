<?php
/**
 * Created by PhpStorm.
 * User: LukaChen
 * Date: 17/11/16
 * Time: 下午4:55
 */

namespace App\Foundation\Response;

use App\Foundation\Traits\ArrayAccessTrait;
use App\Foundation\Traits\JsonableTrait;
use App\Foundation\Traits\JsonSerializableTrait;
use ArrayAccess;
use JsonSerializable;

use Illuminate\Support\Traits\Macroable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class ResponseData implements ArrayAccess, Arrayable, Jsonable, JsonSerializable
{
    use ArrayAccessTrait, JsonableTrait, JsonSerializableTrait , Macroable;

    const FLAG_SUCCESS = 'success';
    const FLAG_NOTICE  = 'notice';
    const FLAG_FAIL    = 'fail';

    protected $code;

    protected $message;

    protected $messageArgs;

    protected $response;

    protected $flag;

    protected $token = '';

    protected $processer = [];

    protected $successCode = [0];

    public function __construct(array $message, $response = [], $messageArgs = [])
    {
        $this->code        = $message['code'];
        $this->message     = $message['message'];
        $this->messageArgs = $messageArgs;
        $this->flag        = $message['flag'];
        $this->response    = isset($message['response']) ? $message['response'] : $response;
    }

    public static function create($code, $message, $response, $flag = null)
    {
        $data = [
            'code'     => $code,
            'message'  => $message,
            'flag'     => !empty($flag) ? $flag : ($code == 0 ? self::FLAG_SUCCESS : self::FLAG_NOTICE),
            'response' => $response,
        ];

        $instance = new static($data);

        return $instance;
    }

    public static function set($message, $response = [], $messageArgs = [])
    {
        if ($message instanceof ResponseData) {
            return $message;
        }
        return new static((array)$message, $response, $messageArgs);
    }

    public static function success($response = [])
    {
        if ($response instanceof ResponseData) {
            return $response;
        }

        if ($response instanceof Arrayable) {
            $response = $response->toArray();
        }
        return new static(SystemCode::SYSTEM_SUCCESS, $response);
    }

    /**
     * get raw response
     * @return [type] [description]
     */
    public function getRawResponse($field = null, $default = null)
    {
        if (is_string($field)) {
            return array_get($this->response, $field, $default);
        } else if (is_array($field)) {
            return array_only($this->response, $field);
        }

        return $this->response;
    }

    /**
     * get response after processer
     * @return [type] [description]
     */
    public function getResponse()
    {
        $data = $this->getRawResponse();

        if (count($this->processer) > 0) {
            foreach ($this->processer as $processer) {
                $data = is_callable($processer) ? $processer($data) : $processer->handler($data);
            }
        }

        return $data;
    }

    public function getMessage()
    {
        return $this->_formatMessage();
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getFlag()
    {
        return $this->flag;
    }

    /**
     * add processer
     * @param  [type] $processer [description]
     * @return [type]            [description]
     */
    public function processer($processer)
    {
        if (! is_array($processer)) {
            $processer = [$processer];
        }

        $this->processer = array_merge($this->processer, $processer);

        return $this;
    }

    /**
     * is success
     * @return boolean [description]
     */
    public function isSuccess($code = [])
    {
        $code = array_merge($this->successCode, $code);
        return in_array($this->code, $code) ? true : false;
    }

    /**
     * format message
     * @return [type] [description]
     */
    protected function _formatMessage()
    {
        if (empty(count($this->messageArgs))) {
            return $this->message;
        }

        $message = $this->message;

        foreach ($this->messageArgs as $key => $value) {
            $value = is_array($value) ? implode(', ', $value) : $value;
            $message = str_replace('#{'.$key.'}', $value, $message);
        }

        return $message;
    }

    public function toArray()
    {
        //debug_print_backtrace();
        $data = [
            'code'     => $this->code,
            'message'  => $this->_formatMessage(),
            'response' => $this->getResponse(),
            'flag'     => $this->flag,
        ];

        if (!empty($this->token)) {
            $data['token'] = $this->token;
        }

        return $data;
    }

    public function __toString()
    {
        return $this->toJson();
    }

}
