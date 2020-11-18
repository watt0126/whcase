<?php
namespace app\stage\controller;

use app\stage\model\Setting as SettingModel;

/**
 * 系统设置
 * Class Setting
 * @package app\stage\controller
 */
class Setting extends Controller
{
    /**
     * 后台设置
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function stage()
    {
        return $this->updateEvent('stage');
    }

    /**
     * 上传设置
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function storage()
    {
        return $this->updateEvent('storage');
    }    

    /**
     * 更新后台设置事件
     * @param $key
     * @param $vars
     * @return array|mixed
     * @throws \think\exception\DbException
     */
    private function updateEvent($key, $vars = [])
    {
        if (!$this->request->isAjax()) {
            $vars['values'] = SettingModel::getItem($key);
            return $this->fetch($key, $vars);
        }
        $model = new SettingModel;
        if ($model->edit($key, $this->postData($key))) {
            return $this->renderSuccess('操作成功');
        }
        return $this->renderError($model->getError() ?: '操作失败');
    }

}
