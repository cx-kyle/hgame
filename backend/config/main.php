<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'defaultRoute' => 'main', // 默认控制器
    'bootstrap' => ['log'],
    'modules' => [
        /** ------ 公用模块 ------ **/
        'common' => [
            'class' => 'backend\modules\common\Module',
        ],
        /** ------ 系统模块 ------ **/
        'sys' => [
            'class' => 'backend\modules\sys\Module',
        ],
        
        /** ------ 会员模块 ------ **/
        'member' => [
            'class' => 'backend\modules\member\Module',
        ],
        /** ------ oauth2 ------ **/
        'oauth2' => [
            'class' => 'backend\modules\oauth2\Module',
        ],

        /** ------- 基础模块 ----- */
        'xkx2' => [
            'class' => 'backend\modules\xkx2\Module',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\sys\Manager',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            'idParam' => '__backend',
            'as afterLogin' => 'backend\behaviors\AfterLogin',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
            'timeout' => 86400,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logFile' => '@runtime/logs/' . date('Y-m/d') . '.log',
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'js' => []
                ],
            ],
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'on beforeSend' => function($event) {
                Yii::$app->services->log->record($event->sender);
            },
        ],
    ],
    'controllerMap' => [
        'file' => 'common\controllers\FileBaseController', // 文件上传公共控制器
        'ueditor' => 'common\widgets\ueditor\UeditorController', // 百度编辑器
        'provinces' => 'backend\widgets\provinces\ProvincesController', // 省市区
        'notify' => 'backend\widgets\notify\NotifyController', // 消息
        'selector' => 'backend\widgets\selector\SelectorController', // 微信资源选择
        'select-map' => 'backend\widgets\selectmap\MapController', // 经纬度选择
        'cropper' => 'backend\widgets\cropper\CropperController', // 图片裁剪
    ],
    'params' => $params,
];
