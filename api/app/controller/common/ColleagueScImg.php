<?php


namespace app\controller\common;


use app\BaseController;

use app\model\Colleague;
use ruhua\exceptions\BaseException;
use think\facade\Request;

class ColleagueScImg extends BaseController
{
    /**
     * 上传图片
     */
    public function uploadImg()
    {
        $file = Request::file('img');
        if (!$file) {
            throw new BaseException(['msg'=>'请上传文件img']);
        }

        $filename=$file->getOriginalExtension();
        if($filename!="jpg"&&$filename!="jpeg"&&$filename!="png"&&$filename!="gif"){
            throw new BaseException(['msg'=>'非图片上传']);
        }
        $savename = \think\facade\Filesystem::putFile( '', $file,'md5');
            if(!$savename){
                throw new BaseException(['msg'=>'图片上传失败']);
            }
        $savename=str_replace('\\', '/', $savename );

        $savename='http://'.IP.'/uploads/'.$savename;

        return app('json')->go(['url'=>$savename]);

    }
}