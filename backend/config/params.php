<?php
return [
    'adminEmail' => 'admin@example.com',
    'adminAcronym' => 'Hgame',
    'adminTitle' => 'Hgame',

    /** ------ 总管理员配置 ------ **/
    'adminAccount' => 1,// 系统管理员账号id
    'isMobile' => false, // 手机访问

    /** ------ 日志记录 ------ **/
    'user.log' => true,
    'user.log.level' => ['error'], // 级别 ['info', 'warning', 'error']
    'user.log.noPostData' => [ // 安全考虑,不接收Post存储到日志的路由
        'backend/site/login',
        'sys/manager/up-password',
        'sys/manager/ajax-edit',
        'member/member/ajax-edit',
    ],
    'user.log.except.code' => [404], // 不记录的code

    /** ------ 开发者信息 ------ **/
    'exploitDeveloper' => 'Hgame',
    'exploitFullName' => 'Hgame后台应用',
    'exploitOfficialWebsite' => '',
    'exploitGitHub' => '',

    /** ------ 备份配置配置 ------ **/
    'dataBackupPath' => Yii::getAlias('@root') . '/console/backup', // 数据库备份根路径
    'dataBackPartSize' => 20971520,// 数据库备份卷大小
    'dataBackCompress' => 1,// 压缩级别
    'dataBackCompressLevel' => 9,// 数据库备份文件压缩级别
    'dataBackLock' => 'backup.lock',// 数据库备份缓存文件名

    /**
     * 不需要验证的路由全称
     *
     * 注意: 前面以绝对路径/为开头
     */
    'noAuthRoute' => [
        '/main/index',// 系统主页
        '/main/system',// 系统首页
        '/wechat/qrcode/qr',// 二维码管理的二维码
    ],

    /** ------ 配置文本类型 ------ **/
    'configTypeList' => [
        'text' => "文本框",
        'password' => "密码框",
        'secretKeyText' => "密钥文本框",
        'textarea' => "文本域",
        'date' => "日期",
        'time' => "时间",
        'datetime' => "日期时间",
        'dropDownList' => "下拉文本框",
        'multipleInput' => "Input组",
        'radioList' => "单选按钮",
        'checkboxList' => "复选框",
        'baiduUEditor' => "百度编辑器",
        'image' => "图片上传",
        'images' => "多图上传",
        'file' => "文件上传",
        'files' => "多文件上传",
        'cropper' => "图片裁剪上传",
        'lat_lng_selection' => "经纬度选择",
    ],

    /** ------ 插件类型 ------ **/
    'addonsGroup' => [
        'plug' => [
            'name' => 'plug',
            'title' => '功能扩展',
            'icon' => 'fa fa-puzzle-piece',
        ],
        'business' => [
            'name' => 'business',
            'title' => '主要业务',
            'icon' => 'fa fa-random',
        ],
        'customer' => [
            'name' => 'customer',
            'title' => '客户关系',
            'icon' => 'fa fa-rocket',
        ],
        'activity' => [
            'name' => 'activity',
            'title' => '营销及活动',
            'icon' => 'fa fa-tachometer',
        ],
        'services' => [
            'name' => 'services',
            'title' => '常用服务及工具',
            'icon' => 'fa fa-magnet',
        ],
        'biz' => [
            'name' => 'biz',
            'title' => '行业解决方案',
            'icon' => 'fa fa-diamond',
        ],
        'h5game' => [
            'name' => 'h5game',
            'title' => 'H5游戏',
            'icon' => 'fa fa-gamepad',
        ],
    ],


    // 语言
    'individuationMenuLanguage' => [
        'zh_CN' => '简体中文',
        'en' => '英文',
    ],
];