<?php


namespace app\controller\common;


use app\BaseController;
use app\model\User;
use app\model\UserPhone;

class UserPhoneManage extends BaseController
{
    public function get_all_userphone(){
        $data = UserPhone::select();
        return $this->success($data);
    }
}