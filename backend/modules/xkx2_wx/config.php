<?php

return $configs = [

    'components' => [

        /** 侠客行后台 */
        'xkx2wx' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=212.64.37.107;port=63306;dbname=xkx2test_admin',
            'username' => 'doujiang',
            'password' => 'k3d&IMd7q^*3',
            'charset' => 'utf8mb4',
            //'tablePrefix' => 'xkx2_',
            // 'enableSchemaCache' => true, // 是否开启缓存
            // 'schemaCacheDuration' => 3600, // 缓存时间
            // 'schemaCache' => 'cache', // 缓存名称
        ],

        /** 侠客行用户 */
        'xkx2wxdb' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=212.64.37.107;port=63306;dbname=xkx2test_accountdb',
            'username' => 'doujiang',
            'password' => 'k3d&IMd7q^*3',
            'charset' => 'utf8mb4',
           
        ],

        /** 侠客行h5log */
        'h5log' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=121.43.163.185;port=63306;dbname=h5_cs',
            'username' => 'h5_cs',
            'password' => 'h5_cs73T2%#',
        ],

        /** 查询平台 */
        
        'h5loguser' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=121.43.163.185;port=63306;dbname=h5_log',
            'username' => 'h5_cs',
            'password' => 'h5_cs73T2%#',
        ],
        
        /** 侠客行h5pay */
        'h5pay' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=121.43.163.185;port=63306;dbname=h5_pay',
            'username' => 'h5_cs',
            'password' => 'h5_cs73T2%#',
        ],

        'h5center' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=121.43.163.185;port=43321;dbname=h5_center',
            'username' => 'select',
            'password' => 'select123!@#HD',
        ],
        'activdb' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;port=3306;dbname=yulong_account',
            'username' => 'lx',
            'password' => '123456',
            'charset' => 'utf8',
        ],
        
    ],

    
    
];
