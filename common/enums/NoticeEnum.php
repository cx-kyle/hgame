<?php

namespace common\enums;

/**
 * Notice 状态枚举
 */

class NoticeEnum
{
    const ZERO = 0;
    const SUCCESS = 1;
    const ERROR = 2; 

    public static $listExplain = [
        self::ZERO => '未发送',
        self::SUCCESS => '发送成功',
        self::ERROR => '发送失败',
    ];
}