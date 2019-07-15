<?php
namespace services\common;

use Yii;
use common\components\Service;

/**
 * Class AuthService
 * @package services\common
 *   
 */
class AuthService extends Service
{
    /**
     * 是否超级管理员
     *
     * @return bool
     */
    public function isSuperAdmin()
    {
        return Yii::$app->user->id == Yii::$app->params['adminAccount'];
    }
}