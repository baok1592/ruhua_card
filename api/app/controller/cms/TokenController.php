<?php


namespace app\controller\cms;


use app\BaseController;
use app\service\UserTokenService;
use app\validate\TokenGet;

class TokenController extends BaseController
{
    /**用户获取token
     */
    public function get_token($code='')
    {

        (new TokenGet())->goCheck();//验证code

        $wx = new UserTokenService($code);
        $token['token'] = $wx->get();
        return $this->success($token);
    }

    public function get_cid(){

    }

}