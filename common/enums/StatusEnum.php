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
        self::ENABLED => '',
        self::DISABLED => '',
        self::DELETE => '',
        self::FINISHED => ''
    ];
}
