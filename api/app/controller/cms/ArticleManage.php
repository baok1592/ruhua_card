<?php


namespace app\controller\cms;


use app\BaseController;
use app\lib\exception\AddException;
use app\lib\exception\FindException;
use app\lib\exception\UpdateException;
use app\model\Article as ArticleModel;
use ruhua\exceptions\BaseException;

class ArticleManage extends BaseController
{
    /**添加文章
     */
    public function addArticle()
    {
        $post = input('post.');
        $rule = ([
            'title' => 'require|chsDash',
            'content' => 'require',
            'type' => 'require',
        ]);

            $this->validate($post, $rule);
        if($post['type']==1) {
            $res = ArticleModel::where('type', $post['type'])->select()->count();
            if ($res < 10) {
                $data = ArticleModel::create($post);
                return $this->success($data);
            }
            throw new BaseException(['msg'=>'该类型的文章已经满了']);
        }
            if($post['type'] ==3 || $post['type'] == 2) {
                $res = ArticleModel::where('type', $post['type'])->select()->count();
                if ($res < 6) {
                    $data = ArticleModel::create($post);
                    return $this->success($data);
                }
                throw new BaseException(['msg'=>'该类型的文章已经满了']);
            }
    }

    /**删除文章
     */
    public function deleteArticle($id){
        ArticleModel::deleteArticle($id);
        return $this->success([],'删除成功！');
    }

    /**更新文章
     */
    public function updataArticle($id){
        $post = input('post.');
        $rule = [
            'title' => 'require|chsDash',
            'content' => 'require'
        ];
        $this->validate($post,$rule);
        $res = ArticleModel::find($id);
        if (!$res){
            throw new FindException();
             }
            $data = ArticleModel::update($post);
        if (!$data['id']){
            throw new UpdateException();
        }
        return $this->success($data);

    }

}