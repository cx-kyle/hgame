<?php
namespace addons\RfNotice;

use Yii;
use backend\interfaces\AddonWidget;

/**
 * 安装
 *
 * Class Install
 * @package addons\RfNotice */
class Install implements AddonWidget
{
    /**
    * @param $addon
    * @return mixed|void
    * @throws \yii\db\Exception
    */
    public function run($addon)
    {
        $sql = "";

        // 执行sql
        // Yii::$app->getDb()->createCommand($sql)->execute();
    }
}