<?php


namespace app\service;


use app\lib\exception\LoginException;
use app\lib\exception\TokenException;
use app\model\Admin;

class AdminService extends TokenService
{
    /**管理员登录
     * 返回token
     */
    public function loginService($user, $psw){
        $user = Admin::where('name',$user)->where('pwd',$psw)->find();
        if (!$user){
            throw new LoginException('账户或密码错误！');
        }
        $cachedValue = $this->setWxCache($user);//仅组合
        $res['token'] = $this->saveCache($cachedValue);
        return $res['token'];
    }

    /**组合数据
     */
    public function setWxCache($user){
        $cache['admin_id'] = $user['id'];
        $cache['username'] = $user['username'];
        $cache['auth'] =$user['auth'];
        return $cache;
    }

    /**写入缓存
     */
    public function saveCache($cachedValue){
        $key = self::generateToken();//生成token
        $value = json_encode($cachedValue);
        $expire_in = config('setting.token_expire_in');//有效时间
        $request = cache($key, $value,$expire_in );
        if (!$request) {
            throw new TokenException(['msg' => '服务器缓存异常']);
        }
        return $key;
    }
}