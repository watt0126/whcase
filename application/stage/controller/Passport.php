<?php

namespace app\stage\controller;

use app\stage\model\User as UserModel;
use think\Session;

/**
 * 用户认证
 * Class Passport
 * @package app\stage\controller
 */
class Passport extends Controller
{
    /**
     * 商户后台登录
     * @return array|bool|mixed
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function login()
    {
        if ($this->request->isAjax()) {
            $model = new UserModel;
            if ($model->login($this->postData('User'))) {
                return $this->renderSuccess('登录成功', url('index/index'));
            }
            return $this->renderError($model->getError() ?: '登录失败');
        }
        $this->view->engine->layout(false);
        return $this->fetch('login', [
            // 系统版本号
            //'version' => get_version()
        ]);
    }

    /**
     * 退出登录
     */
    public function logout()
    {
        Session::clear('whc_stage');
        $this->redirect('passport/login');
    }

}
