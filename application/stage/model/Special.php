<?php
namespace app\stage\model;

use app\common\model\Special as SpecialModel;

class Special extends SpecialModel
{
	/**
	 * 添加专题
	 * @param $data
	 */
	public function add($data)	
	{
		if (empty($data['category_id'])) {
		    $this->error = '请选择专题分类';
		    return false;
		}
		if (empty($data['image_id'])) {
		    $this->error = '请上传封面图';
		    return false;
		}
		// 开启事务
		$this->startTrans();
		try {
			$this->allowField(true)->save($data);			
			$this->commit();
			return true;
		} catch (\Exception $e) {
		    $this->error = $e->getMessage();
		    $this->rollback();
		    return false;
		};
	}
	/**
	 * 更新记录
	 * @param $data
	 */
	public function edit($data)
	{
		if (empty($data['category_id'])) {
		    $this->error = '请选择专题分类';
		    return false;
		}
		if (empty($data['image_id'])) {
		    $this->error = '请上传封面图';
		    return false;
		}
		// 开启事务
		$this->startTrans();
		try {
			$this->allowField(true)->save($data);			
			$this->commit();
			return true;
		} catch (\Exception $e) {
		    $this->error = $e->getMessage();
		    $this->rollback();
		    return false;
		};
	}
	/**
	 * 获取专题列表
	 * @return \think\Paginator
	 * @throws \think\exception\DbException
	 */
	public function getList($query = [],$limit = 15)
	{
		!empty($query) && $this->setWhere($query);
	    return $this->with(['image', 'category'])
	        ->order(['sort' => 'asc', 'create_time' => 'desc'])
	        ->paginate($limit, false, [
	            'query' => request()->request()
	        ]);
	}
	
	/**
	 * 设置检索查询条件
	 * @param $query
	 */
	private function setWhere($query)
	{
	    if (isset($query['search']) && !empty($query['search'])) {
	        $this->where('name', 'like', '%' . trim($query['search']) . '%');
	    }
	    if (isset($query['category_id']) && !empty($query['category_id'])) {
	        $query['category_id'] > -1 && $this->where('category_id', '=', $query['category_id']);
	    }
	}
	//专题详情
	public static function detail($special_id)
	{
		 return static::get($special_id,['image']);
	}
	
	public function remove()
	{
		return $this->delete();
	}
}