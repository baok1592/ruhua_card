<?php


namespace app\controller;


use app\BaseController;

class Admin extends BaseController
{
    public function see(){
        $res=\app\model\Admin::select();
        return $res;
    }
}