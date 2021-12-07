<?php


namespace app\model;


use app\lib\exception\DeleteExcepthion;
use app\lib\exception\FindException;


class Article extends BaseModel
{
    protected $dateFormat = 'Y-m-d';
    protected $type = [
        'status'    =>  'integer',
        'score'     =>  'float',
        'birthday'  =>  'timestamp',
    ];
    /**查询一条文章详情
     */
    public static function getContentById($id){
        $res = self::find($id);
        if(!$res){
            throw new FindException();
        }
        return $res;
    }
    /**查询所有文章
     */
    public static function getAllArticle(){
        $res = self::select();
        if (($res->count())<1){
            return [];
        }
        return $res;
    }

    /**删除某条文章
     */
    public static function deleteArticle($id){
        $res = self::find($id);
        if (!$res){
            throw new DeleteExcepthion();
        }
        $res->delete();
        return $res;
    }

}