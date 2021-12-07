<?php


namespace app\controller\cms;


use app\BaseController;
use app\lib\exception\AddException;
use app\lib\exception\FindException;
use app\lib\exception\UpdateException;
use app\model\Colleague as ColleagueModel;

class ColleagueManage extends BaseController
{
    /**添加职员
     */
    public function addColleague(){

        $post = input('post.');
        $rule = ([
            'name' => 'require',
            'himg_url' => 'require',
            'position' => 'require',
            'c_phone' => 'require|max:11',
            'wechart_nub' => 'require',
            'wechart_eurl' => 'require',
            'email' => 'require|email',
            'content' => 'require'
        ]);

            $this->validate($post, $rule);

            $data = ColleagueModel::create($post);
       if (!$data['id']){
           throw new AddException();
       }
        return $this->success($data['id']);
    }

    /**删除职员
     */
    public function deleteColleague($id){

        ColleagueModel::deleteColleague($id);
        return $this->success(['msg'=>'删除成功']);
    }

    /**修改职员资料
     */
    public function updateColleague($id){
        $post = input('post.');
        $rule = [
                'name' => 'require',
                'himg_url' => 'require',
                'position' => 'require',
                'c_phone' => 'require|max:11',
                'wechart_nub' => 'require',
                'wechart_eurl' => 'require',
                'email' => 'require|email',
                'content' => 'require'
            ];
        $this->validate($post,$rule);
        $res = ColleagueModel::find($id);
        if (!$res){
            throw new FindException();
        }
        $data = ColleagueModel::update($post);
           if (!$data['id']){
               throw new UpdateException();
           }
            return $this->success($data);
        }

    /**修改员工基本资料
     * @param $id
     */
    public function updateColl($id){
        $post = input('post.');
        unset($post['create_time']);
        unset($post['update_time']);

        $res = ColleagueModel::find($id);
        if (!$res){
            throw new FindException();
        }
        $data = ColleagueModel::update($post);
        if (!$data['id']){
            throw new UpdateException();
        }
        return $this->success($data);
    }
}