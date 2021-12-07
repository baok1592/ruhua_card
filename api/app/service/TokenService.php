<?php


namespace app\service;


use app\lib\exception\TokenException;
use app\lib\exception\TokenFindException;
use think\facade\Cache;
use think\facade\Request;

class TokenService
{

    static function getRandChar($length)
    {
        $str = null;
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol) - 1;

        for ($i = 0;
             $i < $length;
             $i++) {
            $str .= $strPol[rand(0, $max)];
        }

        return $str;
    }

    public static function generateToken()
    {
        $randChar = self::getRandChar(32);
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        $tokenSalt = config('setting.token_salt');
        return md5($randChar.$timestamp.$tokenSalt);
    }

    /**token缓存找到并获取值
     */
    public static function getCurrentTokenVar($key)
    {
        $token = Request::instance()
            ->header('token');
        $vars = Cache::get($token);
        if (!$vars)
        {
            throw new TokenException();
        }
        else {
            if(!is_array($vars))
            {
                $vars = json_decode($vars, true);
            }
            if (array_key_exists($key, $vars)) {
                return $vars[$key];
            }
            else{
                throw new TokenFindException();
            }
        }
    }

    /**获取uid
     */
    public static function getCurrentUid()
    {
        $uid = self::getCurrentTokenVar('uid');
        return $uid;
    }
    public static function getCurrentAuth()
    {
        $auth = self::getCurrentTokenVar('auth');
        return $auth;
    }

}