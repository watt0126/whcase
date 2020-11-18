<?php
namespace app\stage\controller\admin;

use app\stage\controller\Controller;
use app\stage\model\User as UserModel;
use app\stage\model\Role as RoleModel;

class User extends Controller
{
	/**
	 * 管理员列表
	 * @return mixed
	 * @throws \think\exception\DbException
	 */
	public function index()
	{
		$list = (new UserModel)->getList();
		return $this->fetch('index',compact('list'));
	}
	/**
	 * 添加管理员
	 * @return array|mixed
	 * @throws \think\exception\DbException
	 */
	public function add()
	{
		$model = new UserModel;
		if (!$this->request->isAjax()) {
			// 获取所有权限组
			$roleList = (new RoleModel)->getList();
			//$list = getRoleTree($data);
			return $this->fetch('add', compact('roleList'));
		}
		if ($model->add($this->postData('user'))) {
			return $this->renderSuccess('添加成功', url('admin.user/index'));
		}
		$error = $model->getError() ?: '添加失败';
		return $this->renderError($error);
	}
	/**
	 * 更新管理员
	 * @param $user_id
	 * @return array|mixed
	 * @throws \think\Exception
	 * @throws \think\db\exception\DataNotFoundException
	 * @throws \think\db\exception\ModelNotFoundException
	 * @throws \think\exception\DbException
	 */
	public function edit($user_id)
	{
	    // 管理员详情
	    $model = UserModel::detail($user_id);
	    if (!$this->request->isAjax()) {
	        return $this->fetch('edit', [
	            'model' => $model,
	            // 角色列表
	            'roleList' => (new RoleModel)->getList()
	        ]);
	    }
	    // 更新记录
	    if ($model->edit($this->postData('user'))) {
	        return $this->renderSuccess('更新成功', url('admin.user/index'));
	    }
	    return $this->renderError($model->getError() ?: '更新失败');
	}
}