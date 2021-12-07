<?php


namespace app\service;


use app\lib\exception\BaseException;
use app\lib\exception\TokenException;
use app\lib\exception\WeChartException;
use app\model\User;
use Exception;
use think\facade\Log;

class UserTokenService extends TokenService
{
    protected $code;
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxLoginUrl;

    /**构造函数赋值
     */
    function __construct($code)
    {

        $this->code = $code;
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');

        $this->wxLoginUrl = sprintf(
            config('wx.login_url'), $this->wxAppID, $this->wxAppSecret, $this->code);

    }

    /**请求微信小程序获取code码
     * 获取openid，session_key等
     */
    public function get()
    {

        $result = curl_get($this->wxLoginUrl);//请求http获取openid，session_key
        $wxResult = json_decode($result, true);//编码（key,value数组形式）
        Log::error($wxResult);
        //判断返回的关联数组是否为空***
        if (empty($wxResult)) {
            throw new BaseException('获取session_key以及openid是异常，微信内部错误！');
        }

        $loginFail = array_key_exists('errcode', $wxResult);
        if ($loginFail) {
            $this->processLoginError($wxResult);
        }
        return $this->grantToken($wxResult);


    }

    /**获取用户id
     * 封装用户id、wxResult
     * 返回token
     */
    private function grantToken($wxResult)
    {
        //颁发令牌
        //拿到openid
        //去数据库看是否存在这个openid，如果存在则不处理
        //不存在则要为用户新增一条记录，相当于注册新用户
        //生成令牌，准备缓存数据，写入缓存
        //把令牌返回客户端
        //存缓存，用户携带Key：令牌  value：wxResult（session_key,openid,令牌有效时间），uid用户唯一标识，scope（用户身份，权限）
        $openid = $wxResult['openid'];
        $user = User::getByOpenID($openid);//目的  拿到用户id放入缓存
        if ($user) {
            $uid = $user->id;
        } else {
            $uid = $this->newUser($openid);
        }
        $cachedValue = $this->prepareCachedValue($wxResult, $uid);//封装(openid,session_key,uid)得到一个value
        $token = $this->savaToCach($cachedValue);//写入缓存，返回token
        return $token;

    }


    /**把value写入缓存
     * 返回token
     */
    private function savaToCach($cachedValue)
    {
        $key = self::generateToken();//生成32位随机字符串
        $value = json_encode($cachedValue);//把value转化为字符串
        $expire_in = config('setting.token_expire_in');//有效时间
        //写入缓存
        $requst = cache($key, $value, $expire_in);//写入缓存
        if (!$requst) {
            throw new TokenException([
                //覆盖默认值
                'msg' => '服务器缓存异常！',
                'errcode' => 1005
            ]);
        }
        return $key;//返回令牌到客户端
    }


    /**封装，准备一个value
     */
    private function prepareCachedValue($wxResult, $uid)
    {
        $cachedValue = $wxResult;
        $cachedValue['uid'] = $uid;
        return $cachedValue;
    }

    /**创建用户把openid存入数据库
     */
    private function newUser($openid)
    {
        $user = User::create([
            'openid' => $openid
        ]);
        return $user->id;
    }

    private function processLoginError($wxResule)
    {
        throw new WeChartException([
            'msg' => $wxResule['errmsg'],
            'errcode' => $wxResule['errcode']
        ]);
    }
}