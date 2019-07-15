<?php
namespace addons\RfNotice;

use addons\RfNotice\common\config\Bootstrap;

/**
 * Class Addon
 * @package addons\RfNotice */
class AddonConfig
{
    /**
     * 配置信息
     *
     * @var array
     */
    public $info = [
        'name' => 'RfNotice',
        'title' => '公告',
        'brief_introduction' => '',
        'description' => '',
        'author' => '111',
        'version' => '1.0.0',
    ];

    /**
    * 引导文件
    *
    * 设置后系统会在执行插件控制器前执行
    *
    * @var Bootstrap
    */
    public $bootstrap = '';

    /**
     * 可授权权限
     *
     * 注意：采用Yii2的路由命名方式
     * 例子：array(
     *          'index/index' => '首页',
     *          'cate-index/index' => '分类首页',
     *          'cate-index/first-data' => '分类数据',
     *        )
     * @var array
     */
    public $authItem = [
        'backend' => [
        ],
        'frontend' => [
        ],
        'wechat' => [
        ],
        'api' => [
        ],
    ];

    /**
     * 参数配置
     *
     * @var bool
     */
    public $isSetting = true;

    /**
     * 钩子
     *
     * @var bool
     */
    public $isHook = true;

    /**
     * 规则管理
     *
     * @var bool
     */
    public $isRule = true;

    /**
     * 类别
     *
     * @var string
     * [
     *      'plug'      => "功能插件",
     *      'business'  => "主要业务",
     *      'customer'  => "客户关系",
     *      'activity'  => "营销及活动",
     *      'services'  => "常用服务及工具",
     *      'biz'       => "行业解决方案",
     *      'h5game'    => "H5游戏",
     *      'other'     => "其他",
     * ]
     */
    public $group = 'plug';

    /**
     * 微信接收消息类别
     *
     * @var array
     * 例如 : ['image','voice','video','shortvideo']
     */
    public $wechatMessage = [];

    /**
     * 后台菜单
     *
     * 例如
     * public $menu = [
     *  [
     *      'title' => '基本表格',
     *      'route' => 'curd-base/index',
     *      'icon' => ''
     *   ]
     * ]
     * @var array
     */
    public $menu = [
    ];

    /**
     * 同menu上
     *
     * @var array
     */
    public $cover = [
    ];

    /**
     * 保存在当前模块的根目录下面
     *
     * 例如 public $install = 'Install';
     * 安装SQL,只支持php文件
     * @var string
     */
    public $install = 'Install';
    
    /**
     * 卸载SQL
     *
     * @var string
     */
    public $uninstall = 'UnInstall';
    
    /**
     * 更新SQL
     *
     * @var string
     */
    public $upgrade = 'Upgrade';
}
            