<?php
namespace app\stage\controller\content;

use app\stage\controller\Controller;
use app\stage\model\Article as ArticleModel;
use app\stage\model\Category as CategoryModel;
use app\stage\model\User as UserModel;

/**
 * 案例文章控制器
 * Class Article
 * @package app\stage\controller\content
 */
class Article extends Controller
{
	/**
	 * 文章列表
	 * @return mixed
	 * @throws \think\exception\DbException
	 */
	public function index()
	{
	    $model = new ArticleModel;
	    $list = $model->getList($this->request->param());
		
		//dump($list->toArray());exit;
		// 文章分类
		$category = (new CategoryModel)->getList();
		// 用户列表
		$user = (new UserModel)->getList();
		
	    return $this->fetch('index', compact('list','category','user'));
	}
	/**
	 * 添加文章
	 * @return array|mixed
	 */
	public function add()
	{
	    $model = new ArticleModel;
	    if (!$this->request->isAjax()) {
	        // 文章分类
	        $catgory = (new CategoryModel)->getList();
	        return $this->fetch('add', compact('catgory'));
	    }
	    // 新增记录
	    if ($model->add($this->postData('article'))) {
	        return $this->renderSuccess('添加成功', url('content.article/index'));
	    }
	    return $this->renderError($model->getError() ?: '添加失败');
	}
	/**
	 * 更新文章
	 * @param $article_id
	 * @return array|mixed
	 * @throws \think\exception\DbException
	 */
	public function edit($article_id)
	{
	    // 文章详情
	    $model = (new ArticleModel)->detail($article_id);	
		//dump($model->toArray());exit;
	    if (!$this->request->isAjax()) {
	        // 文章分类
	        $catgory = (new CategoryModel)->getList();
			
	        return $this->fetch('edit', compact('model', 'catgory'));
	    }
	    // 更新记录
	    if ($model->edit($this->postData('article'))) {
	        return $this->renderSuccess('更新成功', url('content.article/index'));
	    }
	    return $this->renderError($model->getError() ?: '更新失败');
	}
	/**
	 * 删除文章
	 * @param $article_id
	 * @return array
	 * @throws \think\exception\DbException
	 */
	public function delete($article_id)
	{
	    // 文章详情
	    $model = ArticleModel::detail($article_id);
	    if (!$model->setDelete()) {
	        return $this->renderError($model->getError() ?: '删除失败');
	    }
	    return $this->renderSuccess('删除成功');
	}
}