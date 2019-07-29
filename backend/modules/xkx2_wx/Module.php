<?php
namespace backend\modules\xkx2_wx;

use Yii;
/**
 * member module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'backend\modules\xkx2_wx\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        $config = require(__DIR__.'/config.php');

        // 获取应用程序的组件
        $components = \Yii::$app->getComponents();
        foreach( $config['components'] AS $k=>$component ){
            if( isset($component['class']) && isset($components[$k]) == false ) continue;
            $config['components'][$k] = array_merge($components[$k], $component);
        }

        \Yii::configure(\Yii::$app, $config);

        
    }
}
