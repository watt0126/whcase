<?php
namespace app\stage\controller\content;

use app\stage\controller\Controller;
use app\stage\model\Category as CategoryModel;

/**
 * 文章分类控制器
 * Class Category
 * @package app\stage\controller\content
 */
class Category extends Controller
{
	/**
	 * 文章分类列表
	 * @return mixed
	 */
	public function index()
	{
	    $model = new CategoryModel;
	    $list = $model->getList();
	    return $this->fetch('index', compact('list'));
	}
	/**
	 * 添加文章分类
	 * @return array|mixed
	 */
	public function add()
	{
	    $model = new CategoryModel;
	    if (!$this->request->isAjax()) {
			$categoryList = $model->getList();
			//dump($categoryList);exit;
	        return $this->fetch('add',compact('categoryList'));
	    }
	    // 新增记录
	    if ($model->add($this->postData('category'))) {
	        return $this->renderSuccess('添加成功', url('content.category/index'));
	    }
	    return $this->renderError($model->getError() ?: '添加失败');
	}
	/**
	 * 编辑文章分类
	 * @param $category_id
	 * @return array|mixed
	 * @throws \think\exception\DbException
	 */
	public function edit($category_id)
	{
	    // 分类详情
	    $model = CategoryModel::detail($category_id);
		//dump($model->toArray());exit;
	    if (!$this->request->isAjax()) {
			$categoryList = $model->getList();			
	        return $this->fetch('edit', compact('model','categoryList'));
	    }
	    // 更新记录
	    if ($model->edit($this->postData('category'))) {
	        return $this->renderSuccess('更新成功', url('content.category/index'));
	    }
	    return $this->renderError($model->getError() ?: '更新失败');
	}
	/**
	 * 删除文章分类
	 * @param $category_id
	 * @return array
	 * @throws \think\exception\DbException
	 */
	public function delete($category_id)
	{
	    $model = CategoryModel::detail($category_id);
		//pre($model);
	    if (!$model->remove($category_id)) {
	        return $this->renderError($model->getError() ?: '删除失败');
	    }
	    return $this->renderSuccess('删除成功');
	}
}