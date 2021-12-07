<?php


namespace app\controller\user;


use app\BaseController;
use app\model\Colleague as ColleagueModel;
use app\service\Token;

class Colleague extends BaseController
{
    public function gett1(){
        $res = ColleagueModel::select();
        return $this->success($res[0]);
    }
    /**获取职员详细信息
     */
    public function getColleague($id){
        $res = ColleagueModel::find($id);
        if(!$res){
            $res=$this->gett1();
            return $res;
        }
        return $this->success($res);
    }

    /**获取同事信息
     */
    public function getOtherColleague($id=''){

        $res = ColleagueModel::getColleagues($id);
        return $this->success($res);
    }
    public function get_all_colleague(){
        $res = ColleagueModel::getAllColleague();
        return $this->success($res);
    }

    public function edcoll()
    {
        $post=input('post.');

        $id=Token::getCurrentTokenVar('uid');
        $cid=\app\model\User::find($id);

        $post['id']=$cid['c_id'];
        $re=ColleagueModel::update($post);
        return app('json')->go($re);
    }

    public function getcoll()
    {

        $id=Token::getCurrentTokenVar('uid');
        $cid=\app\model\User::find($id);
        $re=ColleagueModel::find($cid['c_id']);

        return app('json')->go($re);
    }

}