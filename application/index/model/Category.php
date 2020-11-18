<?php
namespace app\index\model;

use app\common\model\Category as CategoryModel;
use think\Cache;

/**
 * 文章分类模型
 * Class Category
 * @package app\stage\model
 */
class Category extends CategoryModel
{
	public static function getList(){
		$category = parent::getTreeList(parent::getAllList());
		return $category;
	}
	/**
	 * 获取顶级分类
	 * @return array
	 */
	public static function getParentCategory()
	{
		$model = new static;
		$data = $model->where(['parent_id'=> 0])->order(['sort' => 'asc', 'create_time' => 'asc'])->select();
		return $data;
	}
}