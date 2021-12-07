<?php


namespace app\model;

use app\lib\exception\DeleteExcepthion;
use app\lib\exception\FindException;

class Banner extends BaseModel
{
    /**获取所有广告信息
     */
    public static function getAllbanner(){
        $res = self::withoutField('category_id')->select();
       
        return $res;
    }

    /**删除广告
     */
    public static function deleteBanner($id){
        $res = self::find($id);
        if (!$res){
            throw new DeleteExcepthion();
        }
        $res->delete();
        return $res;
    }

}