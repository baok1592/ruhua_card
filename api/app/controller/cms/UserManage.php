<?php


namespace app\controller\cms;


use app\BaseController;
use app\lib\exception\FindException;
use app\model\Colleague;
use app\model\tjLogin;
use app\model\User;
use app\model\UserPhone;
use app\service\TokenService;
use app\model\User as UserModel;

class UserManage extends BaseController
{
    /**
     * 微信授权绑定手机号
     * @return mixed
     */
    public function getWxMobile(){
        $post = input('post.');
        $this->validate($post,['encryptedData'=>'require','iv'=>'require','ccid'=>'require']);
        $uid = TokenService::getCurrentUid();
        $res = UserModel::addWxMobile($uid,$post);

        $data = Colleague::where('c_phone',$res['phoneNumber'])->find();

        if (!$data){
            echo 1;
            self::add_login($uid,$post['ccid']);
            $mobile= UserPhone::where('phone',$res['phoneNumber'])->find();
            if (!$mobile) {
                $jl = UserPhone::create([
                    'phone' => $res['phoneNumber']
                ]);
                return $this->success($jl);
            }

        }
        $cid = $data['id'];
        $datas = User::where('u_phone',$res['phoneNumber'])->find();
        $tt = User::where('id',$datas['id'])->save([
            'c_id'=>$cid
        ]);

        return $this->success($tt);
    }

    public function user_info(){
        $uid = TokenService::getCurrentUid();
        $user = UserModel::where('id',$uid)->find();
        $cid = $user['c_id'];
        return $this->success($cid);
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