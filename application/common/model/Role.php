<?php
namespace app\common\model;

class Role extends BaseModel
{
	protected $name = 'role';
	
	/**
	 * 角色信息
	 * @param $where
	 * @return null|static
	 * @throws \think\exception\DbException
	 */
	public static function detail($where)
	{
	    return self::get($where);
	}
}