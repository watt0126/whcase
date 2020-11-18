<?php
namespace app\index\controller;

use app\index\model\Article as ArticleModel;
use app\index\model\Category as CategoryModel;

class Index extends Controller
{
    public function index()
    {	
		$count = (new CategoryModel)->getCacheCounts();
		//dump($count);exit;
		//$category = (new CategoryModel)->getCacheTree();
		$category = CategoryModel::getList();
		$parent = CategoryModel::getParentCategory();
		//dump($parent->toArray());exit;
        return $this->fetch('index',compact('count','category','parent'));
    }
	public function detail($article_id)
	{
		$model = ArticleModel::detail($article_id);
		//dump($model->toArray());exit;
		return $this->fetch('detail',compact('model'));
	}
	/**
	 * 获取文章列表
	 */
	public function lists()
	{
		$model = new ArticleModel;
		$list =  $model->getAllList($this->request->param());
		return json($list);
	} 
}
