<?php


namespace app\controller\user;


use app\BaseController;
use app\model\Article as ArticleModel;

class Article extends BaseController
{
    /**获取一条文章详情
     */
    public function getArticleContentByID($id){
        $res = ArticleModel::getContentById($id);
        return $this->success($res);
    }

    /**获取所有文章标题
     */
    public function getAllArticle(){
        $res = ArticleModel::getAllArticle();
        return $this->success($res);
    }
}