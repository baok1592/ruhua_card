<?php


namespace app\controller\user;


use app\BaseController;
use app\lib\exception\FindException;
use app\model\User;
use app\service\TokenService;

class GetUserID extends BaseController
{
    /**token获取用户信息
     */
    public function user_info()
    {
        $uid = TokenService::getCurrentUid();
        $user = User::find($uid);
        if (!$user){
            throw new FindException();
        }
        return $this->success($user);
    }

}