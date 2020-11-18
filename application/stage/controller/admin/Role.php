<?php
namespace app\stage\controller\admin;

use app\stage\controller\Controller;
use app\stage\model\Role as RoleModel;
use app\stage\model\Access as AccessModel;

/**
 * 用户角色控制器
 * Class Role
 * @package app\stage\controller\admin
 */
class Role extends Controller
{
	/**
	 * 角色列表
	 * @return mixed
	 * @throws \think\Exception
	 * @throws \think\db\exception\DataNotFoundException
	 * @throws \think\db\exception\ModelNotFoundException
	 */
	public function index()
	{
		$model = new RoleModel;
		$list = $model->getList();
		return $this->fetch('index', compact('list'));
	}
	/**
	 * 添加角色
	 * @return array|mixed
	 * @throws \think\db\exception\DataNotFoundException
	 * @throws \think\db\exception\ModelNotFoundException
	 * @throws \think\exception\DbException
	 * @throws \Exception
	 */
	public function add()
	{
	    $model = new RoleModel;
	    if (!$this->request->isAjax()) {
	        // 权限列表
	        $accessList = (new AccessModel)->getJsTree();
			//pre($accessList);
	        // 角色列表
	        //$roleList = $model->getList();
	        return $this->fetch('add', compact('accessList'));
	    }
	    // 新增记录
	    if ($model->add($this->postData('role'))) {
	        return $this->renderSuccess('添加成功', url('admin.role/index'));
	    }
	    return $this->renderError($model->getError() ?: '添加失败');
	}
	/**
	 * 更新角色
	 * @param $role_id
	 */
	public function edit($role_id)
	{
	    // 角色详情
	    $model = RoleModel::detail($role_id);
	    if (!$this->request->isAjax()) {
	        // 权限列表
	        $accessList = (new AccessModel)->getJsTree($model['role_id']);
			//dump($accessList);exit;
	        return $this->fetch('edit', compact('model', 'accessList'));
	    }
	    // 更新记录
	    if ($model->edit($this->postData('role'))) {
	        return $this->renderSuccess('更新成功', url('admin.role/index'));
	    }
	    return $this->renderError($model->getError() ?: '更新失败');
	}
}