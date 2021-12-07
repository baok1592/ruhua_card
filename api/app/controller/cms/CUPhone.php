<?php


namespace app\controller\cms;
use app\model\TjLogin as CUmodel;

class CUPhone
{
    public function get(){

        $res=CUmodel::with(['coll','user'])->select();

        return app('json')->go($res);
    }

    public function get_one($cid){
        $res=CUmodel::with(['coll','user'])->where('c_id',$cid)->select();

        return app('json')->go($res);
    }




    public function edit(){
        $post=input('post.');

        foreach ($post as $it){
            $data['id']=$it['id'];
            $data['state']=$it['state'];
            $res=CUmodel::update($data);
        }

        return app('json')->go(['msg'=>'更新完毕']);
    }




}