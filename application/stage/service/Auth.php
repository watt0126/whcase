<?php

namespace app\stage\service;

use think\Session;
use app\stage\model\Access;
use app\stage\model\User;
use app\stage\model\RoleAccess;

/**
 * 商家后台权限业务
 * Class Auth
 * @package app\stage\service
 */
class Auth
{
    /** @var self $instance 存放实例 */
    static public $instance;

    /** @var array $stage 商家登录信息 */
    private $stage;

    /** @var User $user 商家用户信息 */
    private $user;

    /** @var array $allowAllAction 权限验证白名单 */
    protected $allowAllAction = [
        // 测试入口
        'index/test',
        // 用户登录
        'passport/login',
        // 退出登录
        'passport/logout',
        // 修改当前用户信息
        'user/renew',
        // 文件库
        'upload.library/*',
        // 图片上传
        'upload/image',
        // 数据选择
        'data/*',
        // 数据统计
        'statistics.data/survey',
    ];

    /** @var array $accessUrls 商家用户权限url */
    private $accessUrls = [];

    /**
     * 公有化获取实例方法
     * @return Auth
     * @throws \think\exception\DbException
     */
    public static function getInstance()
    {
        if (!(self::$instance instanceof Auth)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * 私有化构造方法
     * Auth constructor.
     * @throws \think\exception\DbException
     */
    private function __construct()
    {
        // 商家登录信息
        $this->stage = Session::get('whc_stage');
        // 当前用户信息
        if (!empty($this->stage)) {
            $this->user = User::detail($this->stage['user']['user_id']);
        }
    }

    /**
     * 私有化克隆方法
     */
    private function __clone()
    {
    }

    /**
     * 验证指定url是否有访问权限
     * @param string|array $url
     * @param bool $strict 严格模式(必须全部通过才返回true)
     * @return bool
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function checkPrivilege($url, $strict = true)
    {
        if (!is_array($url)):
            return $this->checkAccess($url);
        else:
            foreach ($url as $val):
                if ($strict && !$this->checkAccess($val)) {
                    return false;
                }
                if (!$strict && $this->checkAccess($val)) {
                    return true;
                }
            endforeach;
        endif;
        return true;
    }

    /**
     * 验证url的权限
     * @param string $url
     * @return bool
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    private function checkAccess($url)
    {
        // 超级管理员无需验证
        if (!empty($this->user) && $this->user['is_super']) {
            return true;
        }
        // 验证当前请求是否在白名单
        if (in_array($url, $this->allowAllAction)) {
            return true;
        }
        // 通配符支持
        foreach ($this->allowAllAction as $action) {
            if (strpos($action, '*') !== false
                && preg_match('/^' . str_replace('/', '\/', $action) . '/', $url)
            ) {
                return true;
            }
        }
        // 获取当前用户的权限url列表
        if (!in_array($url, $this->getAccessUrls())) {
            return false;
        }
        return true;
    }

    /**
     * 获取当前用户的权限url列表
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    private function getAccessUrls()
    {
        if (empty($this->accessUrls)) {
            // 获取当前用户的角色集
            $user = User::detail($this->user['user_id']);
            // 根据已分配的权限
            $accessIds = RoleAccess::getAccessIds($user['role_id']);
            // 获取当前角色所有权限链接
            $this->accessUrls = Access::getAccessUrls($accessIds);
        }
        return $this->accessUrls;
    }

}