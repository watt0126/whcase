<?php
namespace app\common\model;

use think\Session;

class User extends BaseModel
{
	protected $name = 'user';
	
	/**
	 * 关联用户角色表表
	 * @return \think\model\relation\BelongsToMany
	 */
	public function role()
	{
	    return $this->belongsToMany('Role', 'UserRole');
	}
	
	/**
	 * 验证用户名是否重复
	 * @param $userName
	 * @return bool
	 */
	public static function checkExist($userName)
	{
	    return !!static::useGlobalScope(false)
	        ->where('user_name', '=', $userName)
	        ->where('is_delete', '=', 0)
	        ->value('user_id');
	}
	/**
	 * 管理员用户详情
	 * @param $where
	 * @param array $with
	 * @return static|null
	 * @throws \think\exception\DbException
	 */
	public static function detail($where, $with = [])
	{
	    !is_array($where) && $where = ['user_id' => (int)$where];
	    return static::get(array_merge(['is_delete' => 0], $where), $with);
	}
	/**
	 * 保存登录状态
	 * @param $user
	 * @throws \think\Exception
	 */
	public function loginState($user)
	{
	    // 保存登录状态
	    Session::set('whc_stage', [
	        'user' => [
	            'user_id' => $user['user_id'],
	            'user_name' => $user['user_name'],
				'real_name' => $user['real_name'],
	        ],
	        'is_login' => true,
	    ]);
	}
}