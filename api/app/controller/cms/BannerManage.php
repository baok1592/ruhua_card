<?php


namespace app\controller\cms;


use app\BaseController;
use app\lib\exception\AddException;
use app\lib\exception\FindException;
use app\lib\exception\UpdateException;
use app\model\Banner as BannerModel;

class BannerManage extends BaseController
{
    /**添加广告
     */
    public function addBanner(){
      $post = input('post.');
        
           
        $data = BannerModel::create($post);
      
        return $this->success($data['id']);
    }

    /**删除广告
     */
    public function deleteBanner($id){
        BannerModel::deleteBanner($id);
        return $this->success([],'删除成功！');
    }

    /**修改广告
     */
    public function updataBanner($id){

            $post = input('post.');
            $res = BannerModel::find($id);

            $data = BannerModel::update($post);
            if (!$data['id']){
                throw new UpdateException();
            }
            return $this->success($data);
    }
}