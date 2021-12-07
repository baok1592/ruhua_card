<?php


namespace app\model;


use app\lib\exception\DeleteExcepthion;
use app\lib\exception\FindException;

class SysConfig extends BaseModel
{
    /**获取配置所有信息
     */
    public static function getAllSysteam(){
        $res = self::select();
        if (($res->count())<1){
            throw new FindException();
        }
        return $res;
    }

    /**删除配置信息
     */
    public static function deleteSysteam($id){
        $res = self::find($id);
        if (!$res){
            throw new DeleteExcepthion();
        }
        $res->delete();
        return $res;
    }

    public static function get($key)
    {
        return self::where(['key'=>$key])->value('value');
    }
}