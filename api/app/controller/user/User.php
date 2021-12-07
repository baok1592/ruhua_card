<?php


namespace app\controller\user;



use app\lib\exception\FindException;
use app\lib\exception\UpdateException;
use app\model\User as UserModel;
use app\model\Colleague as colleagueModel;
use ruhua\bases\BaseController;


class User extends BaseController
{
    public function gteAllUser(){
        $res = UserModel::getUser();
        return app('json')->go($res);
    }
}