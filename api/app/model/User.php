<?php


namespace app\model;


use app\lib\exception\FindException;
use app\service\TokenService;
use WxCode\demoWxCode;

class User extends BaseModel
{
    /**获取所有用户信息
     */
    public static function getUser(){
        $res = self::select();
        if (!$res){
            throw new FindException();
        }
        return $res;
    }

    /**openid获取用户信息
     */
    public static function getByOpenID($openid){
        $user = self::where('openid',$openid)->find();
        return $user;
    }

    /**获取用户信息
     */
    public static function getUSerByID($id){
        $user = self::find($id);
        if (!$user){
            throw new FindException();
        }
        return $user;
    }
    public static function getByAuth($auth){
        $user = self::where('auth',$auth)->find();
        if (!$user){
            throw new FindException();
        }
        return $user;
    }
    /**
     * 微信获取手机号
     * @param $uid
     * @param $post
     * @return mixed
     */
    public static function addWxMobile($uid, $post)
    {
        $session_key = TokenService::getCurrentTokenVar('session_key');

        $data = (new demoWxCode())->decryptData($post['encryptedData'], $post['iv'], $session_key);
           if (isset($data['phoneNumber'])) {
               self::where(['id' => $uid])->update(['u_phone' => $data['phoneNumber']]);
               return $data;
           }

        return $data;
    }

}