<?php


namespace app\controller\common;


use app\BaseController;
use app\model\tjLogin;

/**
 * Class TjLoginManage
 * @package app\controller\common
 */
class TjLoginManage extends BaseController
{
    /**统计访客数量
     * @return \think\response\Json
     */
    public function statistics_count($cid){
            $count = tjLogin::where('c_id',$cid)->count();
            $data = $count;
            return $this->success($data);
        }

    /**新增访客记录
     * @param $uid
     * @param $cid
     */
    public function add_login($uid, $cid){
        if($uid<>0 &&$cid<>0){
            $res = tjLogin::where('u_id',$uid)
                ->where('c_id',$cid)->find();
            if (!$res){
                tjLogin::create([
                    'c_id'=>$cid,
                    'u_id'=>$uid
                ]);
                return $this->success('新增记录!');
            }
        }
    }
}