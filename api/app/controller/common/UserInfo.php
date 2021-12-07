<?php


namespace app\controller\common;


use app\BaseController;
use app\model\User;
use app\service\TokenService;

class UserInfo extends BaseController
{
    public function user_info(){
        $uid = TokenService::getCurrentUid();
        $user = User::where('id',$uid)->find();
        $cid = $user['c_id'];
        if ($cid>0){

        }
        if ($uid==0){
           if (!$user['phone']){
               User::getWxMobile();
           }
        }
    }
}