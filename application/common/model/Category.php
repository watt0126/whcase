<?php
namespace app\common\model;

use think\Cache;
use app\common\library\helper;
/**
 * 文章分类模型
 * Class Category
 * @package app\common\model
 */
class Category extends BaseModel
{
	protected $name = 'category';
	/**
	 * 关联文章列表
	 */
	public function article()
	{
		return $this->hasMany('article');
	}
	/**
	 * 关联专题列表
	 */
	public function special()
	{
		return $this->hasMany('special');
	}
	/**
	 * 获取所有分类
	 * @return mixed
	 */
	public static function getCacheAll()
	{
	    return self::getCacheData()['all'];
	}
	/**
	 * 获取所有分类(树状结构)
	 * @return mixed
	 */
	public static function getCacheTree()
	{
	    return self::getCacheData()['tree'];
	}
	/**
	 * 获取所有分类的总数
	 * @return mixed
	 */
	public static function getCacheCounts()
	{
	    return static::getCacheData()['counts'];
	}
	/**
	 * 获取缓存中的数据(存入静态变量)
	 * @param null $item
	 * @return array|mixed
	 */
	private static function getCacheData($item = null)
	{
	    static $cacheData = [];
	    if (empty($cacheData)) {
	        $static = new static;
	        $cacheData = $static->getALL();
	    }
	    if (is_null($item)) {
	        return $cacheData;
	    }
	    return $cacheData[$item];
	}
	/**
	 * 所有分类
	 * @return mixed
	 */
	public static function getALL()
	{
	    $model = new static;
	    if (!Cache::get('article_category')) {			
			$allList = $tempList = self::getAllList();
			//dump(self::getTreeList($allList));exit;
			$complete = [
				'all' => $allList,
				'tree' => self::getTreeList($allList),
				'counts' => self::getCount($allList)
			];			
	        Cache::tag('cache')->set('article_category', $complete);
	    }
		
	    return Cache::get('article_category');
	}
	/**
	 * 构建分类树状图
	 * @param $allList
	 */
	public static function getTreeList($allList)
	{
		$treeList = [];
		foreach ($allList as $pKey => $parent) {
		    if ($parent['level'] == 1) {    // 顶级栏目
		        $treeList[$parent['category_id']] = $parent;
		        unset($allList[$pKey]);
		        foreach ($allList as $cKey => $child) {
		            if ($child['level'] == 2 && $child['parent_id'] == $parent['category_id']) {    // 二级栏目
		                $treeList[$parent['category_id']]['child'][$child['category_id']] = $child;
		                unset($allList[$cKey]);			                
		            }
		        }
		    }
		}
		return reform_keys($treeList);
	}
	private static function getCount($allList)
	{
	    $counts = [
	        'total' => count($allList),
	        'parent' => 0,
	        'child' => 0,
	    ];
	    $level = [1 => 'parent', 2 => 'child'];
	    foreach ($allList as $item) {
	        $counts[$level[$item['level']]]++;
	    }
	    return $counts;
	}
	/**
	 * 从数据库中获取所有分类
	 * @return array
	 * @throws \think\db\exception\DataNotFoundException
	 * @throws \think\db\exception\ModelNotFoundException
	 * @throws \think\exception\DbException
	 */
	public static function getAllList()
	{
		$model = new static;
	    $list = $model->with(['article'])->order(['sort' => 'asc', 'create_time' => 'asc'])->select()->toArray();
		
	    return helper::arrayColumn2Key($list, 'category_id');
	}
}