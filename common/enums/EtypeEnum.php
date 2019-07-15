<?php

namespace common\enums;

/**
 * 状态枚举
 *
 * Class EtypeEnum
 * @package common\enums
 *   
 */
class EtypeEnum
{
    const ENABLED = -1;
    const DISABLED = 0;

    /**
     * @var array
     */
    public static $listExplain = [
        self::ENABLED => '后台人工',
        self::DISABLED => '全部',
    ];
}
