<?php

namespace common\enums;

/**
 * 状态枚举
 *
 * Class StatusEnum
 * @package common\enums
 *   
 */
class StatusEnum
{
    const ENABLED = 1;
    const DISABLED = 0;
    const DELETE = 99;
    const FINISHED = 2;

    /**
     * @var array
     */
    public static $listExplain = [
        self::ENABLED => '发送中',
        self::DISABLED => '未发送',
        self::DELETE => '已删除',
        self::FINISHED => '已发送'
    ];
}
