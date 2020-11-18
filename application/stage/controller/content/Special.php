<?php
namespace app\stage\controller\content;

use app\stage\controller\Controller;
use app\stage\model\Special as SpecialModel;
use app\stage\model\Category as CategoryModel;
/**
 * 专题控制器
 * Class Special
 * @package app\stage\controller\Special
 */
class Special extends Controller
{	
	/**
	 * 文章列表
	 * @return mixed
	 * @throws \think\exception\DbException
	 */
	public function index()
	{
		$model = new SpecialModel;
		$list = $model->getList($this->request->param());
		
		// 文章分类
		$category = (new CategoryModel)->getList();
		//pre($list->toArray());
		return $this->fetch('index',compact('list','category'));
	}
	/**
	 * 添加专题记录
	 * @return mixed
	 * @throws \think\exception\DbException
	 */
	public function add()
	{
		$model = new SpecialModel;
		if(!$this->request->isAjax()){
			$category = (new CategoryModel)->getList();
			//pre($category);
			return $this->fetch('add',compact('category'));
		}
		//新增记录
		if($model->add($this->postData('special'))){
			return $this->renderSuccess('添加成功',url('content.special/index'));
		}
		return $this->renderError($model->getError() ?:'添加失败');
	}
	public function edit($special_id)
	{
		$model = SpecialModel::detail($special_id);
		//dump($model->toArray());exit;
		if(!$this->request->isAjax()){
			$category = (new CategoryModel)->getList();			
			return $this->fetch('edit', compact('model', 'category'));
		}
		//更新记录
		if($model->edit($this->postData('special'))){
			return $this->renderSuccess('更新成功',url('content.special/index'));
		}
		return $this->renderError($model->getError() ?:'更新失败');
	}
	/**
	 * 删除文章
	 * @param $article_id
	 * @return array
	 * @throws \think\exception\DbException
	 */
	public function delete($special_id)
	{
	    // 文章详情
	    $model = SpecialModel::detail($special_id);
		//dump($model->toArray());exit;
	    if (!$model->remove()) {
	        return $this->renderError($model->getError() ?: '删除失败');
	    }
	    return $this->renderSuccess('删除成功');
	}
}