<?php
/**
 * Created by PhpStorm.
 * User: LukaChen
 * Date: 17/12/25
 * Time: 上午11:22
 */

namespace App\Foundation\Helpers;

class EasyEncrypt
{

    private static $crypt_key = '12()3xc.2$'; //密钥

    public static function encrypt($txt)
    {
        $txt = (string) $txt;
        srand((double)microtime() * 1000000);
        $encrypt_key = md5(rand(0, 32000));
        $ctr = 0;
        $tmp = '';
        for ($i = 0; $i < strlen($txt); $i++) {
            $ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
            $tmp .= $encrypt_key[$ctr] . ($txt[$i] ^ $encrypt_key[$ctr++]);
        }
        return base64_encode(self::_key($tmp, self::$crypt_key));
    }

    public static function decrypt($txt)
    {
        $txt = (string) $txt;
        $txt = self::_key(base64_decode($txt), self::$crypt_key);
        $tmp = '';
        for ($i = 0; $i < strlen($txt); $i++) {
            $md5 = $txt[$i];
            $tmp .= $txt[++$i] ^ $md5;
        }
        return $tmp;
    }

    private static function _key($txt, $encrypt_key)
    {
        $encrypt_key = md5($encrypt_key);
        $ctr = 0;
        $tmp = '';
        for ($i = 0; $i < strlen($txt); $i++) {
            $ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
            $tmp .= $txt[$i] ^ $encrypt_key[$ctr++];
        }
        return $tmp;
    }
}