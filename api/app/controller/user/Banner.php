<?php


namespace app\controller\user;


use app\BaseController;
use app\model\Banner as BannerModel;

class Banner extends BaseController
{
    /**获取所有广告信息
     */
    public function getAllBanner(){
        $res = BannerModel::getAllbanner();
        return $this->success($res);
    }

    public function getBanner($id){
        $res = BannerModel::find($id);
        return $this->success($res);
    }
}