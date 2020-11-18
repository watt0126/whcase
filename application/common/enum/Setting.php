<?php
namespace app\common\enum;

/**
 * 商城设置枚举类
 * Class Setting
 * @package app\common\enum
 */
class Setting extends EnumBasics
{
    // 系统设置
    const STAGE = 'stage';

    // 上传设置
    const STORAGE = 'storage';    

    /**
     * 获取订单类型值
     * @return array
     */
    public static function data()
    {
        return [
            self::STAGE => [
                'value' => self::STAGE,
                'describe' => '系统设置',
            ],
            
            self::STORAGE => [
                'value' => self::STORAGE,
                'describe' => '上传设置',
            ],
            
        ];
    }

}