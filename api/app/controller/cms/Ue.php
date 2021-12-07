<?php


namespace app\controller\cms;


use Uedit\controller;

class ue
{
    public function get(){
        $re=new controller();
        $res=$re->show();
        return $res;
    }
}