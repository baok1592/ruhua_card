<?php


namespace app\controller\cms;

use app\BaseController;
use app\service\AdminService;
use app\model\Admin as AdminModel;
use app\service\Token;
use ruhua\exceptions\BaseException;

class Admin extends BaseController
{/**
 *管理员登录
 **/
    public function AdminLogin()
    {

        $post = input('post.');
        $rule = [
            'username' => 'require',
            'password' => 'require',
        ];
        $this->validate($post, $rule);
        $res = new AdminService();
        $token['token ']  = $res->loginService($post['username'],$post['password']);
        return $this->success($token);
    }

    /**管理员注册
     */
  /*  public function admin_register(){
        $post = input('post.');
        $rule = [
            'username' => 'require',
            'password' => 'require',
        ];
        $this->validate($post, $rule);
        $res = AdminModel::where('username',$post['user.name'])
            ->where('password',)
    }*/
    public function editPSW(){
        $post=input('post.');
        $id=Token::getCurrentTokenVar('aid');

        $admin=adminmodel::find($id);
        if($admin['pwd']!=md5($post['oldpwd'])){
            throw new BaseException(['msg'=>'旧密码不对']);
        }
        $admin['pwd']=md5($post['pwd']);
        $admin->save();
        return app('json')->go(['id'=>$admin['id']]);
    }

    public function login(){
        $post=input('post.');
        $post['pwd']=md5($post['pwd']);
        $res=adminmodel::where(['name'=>$post['name'],'pwd'=>$post['pwd']])->find();

        if(!$res){
            throw new BaseException(['msg'=>'账号或者密码错误']);
        }

        $t=new Token();
        $cachedValue=[
            'aid'=>$res['id'],
        ];
        $token=$t->saveToCache($cachedValue);



        return app('json')->go(['is_login'=>'true','token'=>$token]);
    }

    public function add(){
        $post=input('post.');
        $post['pwd']=md5($post['pwd']);
        $if=adminmodel::where('name',$post['name'])->find();
        if($if!='')
            throw new BaseException(['msg'=>'用户名已存在']);

        $res=adminmodel::create($post);
        return app('json')->go(['id'=>$res['id'],'name'=>$res['name']]);
    }

    public function del(){
        $post=input('post.');
        $id=$post['id'];
        adminmodel::find($id)->delete();
        return app('json')->go(['msg'=>'删除成功']);
    }

    public function get(){
        echo 1;
        echo 1;    echo 1;    echo 1;
        $res=adminmodel::select();
        return app('json')->go($res);
    }

    public function ed_pwd(){
        $post=input('post.');
        $id=$post['id'];

        $admin=adminmodel::find($id);
        if($admin['pwd']!=md5($post['oldpwd'])){
            throw new BaseException(['msg'=>'旧密码不对']);
        }
        $admin['pwd']=md5($post['pwd']);
        $admin->save();
        return app('json')->go(['id'=>$admin['id']]);
    }
    /**获取Auth
     */
    public function TokenByAdmin()
    {
        $auth = AdminService::getCurrentAuth();
        return $this->auth($auth);
    }

}