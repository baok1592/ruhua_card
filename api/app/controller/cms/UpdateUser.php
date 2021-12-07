<?php


namespace app\controller\cms;


use app\BaseController;
use app\lib\exception\UpdateException;
use app\model\User;
use app\service\TokenService as TokenService;
use app\validate\UserNews;

class UpdateUser extends BaseController
{
    /**更新用户数据
     */
 /*   public function UpdateUserContent()
    {

        (new UserNews())->goCheck();
        TokenService::getCurrentUid();
        $post = input('post.');
        $user = User::where(['id'=>$post['id']])->update($post);//*****
        if (!$user){
            throw new UpdateException();
        }
        return $this->success($post,'更新成功！');
    }*/
    public function UpdateOrCreateUser(){
        (new UserNews())->goCheck();
        $uid = TokenService::getCurrentUid();
        $user = User::getUSerByID($uid);
        if (!$user){
            throw new UpdateException();
        }
        $post = input('post.');
        $res = User::update($post);//*****
        return $this->success($res,'更新成功！');
    }
}
