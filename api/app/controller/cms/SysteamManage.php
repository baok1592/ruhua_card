<?php


namespace app\controller\cms;


use app\BaseController;
use app\lib\exception\UpdateException;
use app\model\SysConfig;

class SysteamManage extends BaseController
{
    /**删除配置信息
     */
    public function deleteSysteam($id){
        SysConfig::deleteSysteam($id);
        return $this->success([],'删除成功！');
    }

    /**修改配置信息
     */
    public function updateSysteam()
    {
        //*****批量修改数据*****
        $post = input('post.');
        $datas = (new SysConfig())->saveAll($post);
        return $this->success($datas);
    }
}