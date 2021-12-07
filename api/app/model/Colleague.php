<?php


namespace app\model;


use app\lib\exception\BaseException;
use app\lib\exception\DeleteExcepthion;
use app\lib\exception\FindException;
use app\lib\exception\UpdateException;
use think\facade\Request;


class Colleague extends BaseModel
{
    public function user(){
        return $this->hasOne('user','c_id','id');
    }
    /*public function article()
    {
        //return $this->hasOne('article', 'uid', 'id')->field('uid,title');
        //return $this->belongsTo('article', 'id', 'uid')->field('uid,title');
    }*/

    /**获取职员详细信息
     */
    public static function getStaffMemberById($id){
        //$res = self::with('article')->find($id);
        $res = self::find($id);
        if(!$res){
            throw new FindException();
        }
        return $res;
    }

    /**获取职员的同事信息
     */
    public static function getColleagues($id){

        $res = self::where('id!='.$id)->select();

        if (($res->count())<1){
            throw new FindException();
        }
        return $res;
    }
    public static function deleteColleague($id){

        $res = self::find($id);
        if (!$res){
            throw new DeleteExcepthion(['msg'=>$id.'为编号的员工不存在']);
        }
        $res->delete();
        return $res;
    }
    public static function getAllColleague(){
        $res = self::select();
        return $res;
    }




    private static function img_save($id,$use, $name)
    {
        $data['himg_url'] = '/uploads/'. $use . '/' . $name;
        $res = Colleague::where('id',$id)->find();
        if ($res){
            $res->save([
                'himg_url'=>$data['himg_url']
            ]);
        }
        return $res;
    }
    //职员手机号获取id
    public static function phoneByCid($phone){
        $res = self::where('c_phone',$phone)->find();
        if ($res){
            return $res['id'];
        }
    }
}