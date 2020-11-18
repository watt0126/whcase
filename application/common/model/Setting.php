<?php
namespace app\common\model;

use think\Cache;

/**
 * 系统设置模型
 * Class Setting
 * @package app\common\model
 */
class Setting extends BaseModel
{
    protected $name = 'setting';
    protected $createTime = false;

    /**
     * 获取器: 转义数组格式
     * @param $value
     * @return mixed
     */
    public function getValuesAttr($value)
    {
        return json_decode($value, true);
    }

    /**
     * 修改器: 转义成json格式
     * @param $value
     * @return string
     */
    public function setValuesAttr($value)
    {
        return json_encode($value);
    }

    /**
     * 获取指定项设置
     * @param $key
     * @param $wxapp_id
     * @return array
     */
    public static function getItem($key)
    {
        $data = self::getAll();
        return isset($data[$key]) ? $data[$key]['values'] : [];
    }

    /**
     * 获取设置项信息
     * @param $key
     * @return null|static
     * @throws \think\exception\DbException
     */
    public static function detail($key)
    {
        return self::get(compact('key'));
    }

    /**
     * 全局缓存: 系统设置
     * @return array|mixed
     */
    public static function getAll()
    {
        $static = new static;
        if (!$data = Cache::get('setting')) {
            $setting = $static::all();
            $data = empty($setting) ? [] : array_column(collection($setting)->toArray(), null, 'key');
            Cache::tag('cache')->set('setting', $data);
        }
        return $static->getMergeData($data);
    }

    /**
     * 合并用户设置与默认数据
     * @param $userData
     * @return array
     */
    private function getMergeData($userData)
    {
        $defaultData = $this->defaultData();
        return array_merge_multiple($defaultData, $userData);
    }

    /**
     * 默认配置
     * @param null|string $storeName
     * @return array
     */
    public function defaultData($storeName = null)
    {
        return [
            // 后台设置
            'stage' => [
                'key' => 'store',
                'describe' => '后台设置',
                'values' => [
                    // 后台名称
                    'name' => $storeName ?: '案例信息管理系统',
                ],
            ],            
            // 上传设置
            'storage' => [
                'key' => 'storage',
                'describe' => '上传设置',
                'values' => [
                    'default' => 'local',
                    'engine' => [
                        'local' => [],
						'qiniu' => [
						    'bucket' => '',
						    'access_key' => '',
						    'secret_key' => '',
						    'domain' => 'http://'
						],
						'aliyun' => [
						    'bucket' => '',
						    'access_key_id' => '',
						    'access_key_secret' => '',
						    'domain' => 'http://'
						],
						'qcloud' => [
						    'bucket' => '',
						    'region' => '',
						    'secret_id' => '',
						    'secret_key' => '',
						    'domain' => 'http://'
						],
                    ]
                ],
            ],
            // // 短信通知
            // 'sms' => [
            //     'key' => 'sms',
            //     'describe' => '短信通知',
            //     'values' => [
            //         'default' => 'aliyun',
            //         'engine' => [
            //             'aliyun' => [
            //                 'AccessKeyId' => '',
            //                 'AccessKeySecret' => '',
            //                 'sign' => '萤火科技',
            //                 'order_pay' => [
            //                     'is_enable' => '0',
            //                     'template_code' => '',
            //                     'accept_phone' => '',
            //                 ],
            //             ],
            //         ],
            //     ],
            // ],
            // 模板消息
            //    'tplMsg' => [
            //        'key' => 'tplMsg',
            //        'describe' => '模板消息',
            //        'values' => [
            //            'payment' => [
            //                'is_enable' => '0',
            //                'template_id' => '',
            //            ],
            //            'delivery' => [
            //                'is_enable' => '0',
            //                'template_id' => '',
            //            ],
            //            'refund' => [
            //                'is_enable' => '0',
            //                'template_id' => '',
            //            ],
            //        ],
            //    ],
            // 小票打印机设置
            // 'printer' => [
            //     'key' => 'printer',
            //     'describe' => '小票打印机设置',
            //     'values' => [
            //         'is_open' => '0',   // 是否开启打印
            //         'printer_id' => '', // 打印机id
            //         'order_status' => [], // 订单类型 10下单打印 20付款打印 30确认收货打印
            //     ],
            // ],
            // 满额包邮设置
            // 'full_free' => [
            //     'key' => 'full_free',
            //     'describe' => '满额包邮设置',
            //     'values' => [
            //         'is_open' => '0',   // 是否开启满额包邮
            //         'money' => '',      // 单笔订单额度
            //         'notin_region' => [ // 不参与包邮的地区
            //             'province' => [],
            //             'citys' => [],
            //             'treeData' => [],
            //         ],
            //         'notin_goods' => [],  // 不参与包邮的商品   (商品id集)
            //     ],
            // ],
            // 用户充值设置
            
        ];
    }

}
