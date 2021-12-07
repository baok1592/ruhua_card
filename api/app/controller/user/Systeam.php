<?php


namespace app\controller\user;


use app\BaseController;
use app\model\SysConfig as SysteamModel;

class Systeam extends BaseController
{
    /**获取所有配置信息
     */
    public function getAllSysteam($type=''){
        if($type!=''){
            $re=SysteamModel::where('auth',$type)->select();
            $a=$b=[];
            foreach ($re as $item){
               array_push($a,$item['key']);
                array_push($b,$item['value']);
            }
            $c=array_combine($a,$b);
            return app('json')->go($c);
        }
        $res = SysteamModel::getAllSysteam();
        return $this->success($res);
    }

    public function getAllSysteam2(){

            $re=SysteamModel::select();
            $a=$b=[];
            foreach ($re as $item){
                array_push($a,$item['key']);
                array_push($b,$item['value']);
            }
            $c=array_combine($a,$b);
            return app('json')->go($c);


    }


}