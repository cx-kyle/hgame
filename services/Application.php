<?php
namespace services;

use common\components\Service;

/**
 * Class Application
 *
 * @package services
 * @property \services\merchant\MerchantService $merchant 商户
 * @property \services\sys\SysService $sys 系统
 * @property \services\sys\ManagerService $sysManager 管理员
 * @property \services\sys\ActionLogService $sysActionLog 系统行为日志
 * @property \services\sys\MenuService $sysMenu 菜单
 * @property \services\sys\MenuCateService $sysMenuCate 菜单分类
 * @property \services\sys\NotifyService $sysNotify 消息
 * @property \services\api\AccessTokenService $apiAccessToken Api授权key
 * @property \services\member\MemberService $member 会员
 * @property \services\member\AuthService $memberAuth 会员第三方授权
 * @property \services\member\AddressService $memberAddress 会员收货地址
 * @property \services\common\AttachmentService $attachment 公用资源
 * @property \services\common\LogService $log 公用日志
 * @property \services\common\MailerService $mailer 公用邮件
 * @property \services\common\SmsService $sms 公用短信
 * @property \services\common\AddonsService $addons 插件
 * @property \services\common\AddonsBindingService $addonsBinding 插件菜单入口
 * @property \services\common\AuthItemService $authItem 权限
 * @property \services\common\AuthRoleService $authRole 角色
 * @property \services\common\AuthService $auth 权限验证
 * @property \services\common\ConfigService $config 基础配置
 * @property \services\common\ConfigCateService $configCate 基础配置分类
 * @property \services\common\ProvincesService $provinces 省市区
 * @property \services\oauth2\ServerService $oauth2Server oauth2服务
 * @property \services\oauth2\ClientService $oauth2Client oauth2客户端
 * @property \services\oauth2\AccessTokenService $oauth2AccessToken oauth2授权token
 * @property \services\oauth2\RefreshTokenService $oauth2RefreshToken oauth2刷新token
 * @property \services\oauth2\AuthorizationCodeService $oauth2AuthorizationCode oauth临时code
 *
 *   
 */
class Application extends Service
{
    /**
     * @var array
     */
    public $childService = [
        'merchant' => [
            'class' => 'services\merchant\MerchantService',
        ],
        'apiAccessToken' => [
            'class' => 'services\api\AccessTokenService',
            'cache' => false, // 启用缓存到缓存读取用户信息
            'timeout' => 720, // 缓存过期时间，单位秒
        ],
        /** ------ 系统 ------ **/
        'sys' => 'services\sys\SysService',
        'sysActionLog' => 'services\sys\ActionLogService',
        'sysMenu' => 'services\sys\MenuService',
        'sysMenuCate' => 'services\sys\MenuCateService',
        'sysNotify' => 'services\sys\NotifyService',
        'sysManager' => 'services\sys\ManagerService',
        /** ------ 用户 ------ **/
        'member' => 'services\member\MemberService',
        'memberAuth' => 'services\member\AuthService',
        'memberAddress' => 'services\member\AddressService',
        /** ------ 公用部分 ------ **/
        'config' => 'services\common\ConfigService',
        'configCate' => 'services\common\ConfigCateService',
        'provinces' => 'services\common\ProvincesService',
        'attachment' => 'services\common\AttachmentService',
        'addons' => 'services\common\AddonsService',
        'addonsBinding' => 'services\common\AddonsBindingService',
        'auth' => 'services\common\AuthService',
        'authItem' => 'services\common\AuthItemService',
        'authRole' => 'services\common\AuthRoleService',
        'log' => [
            'class' => 'services\common\LogService',
            'queueSwitch' => false, // 是否丢进队列
            'exceptCode' => [403] // 除了数组内的状态码不记录，其他按照配置记录
        ],
        'jPush' => 'services\common\JPushService',
        'sms' => [
            'class' => 'services\common\SmsService',
            'queueSwitch' => false, // 是否丢进队列
        ],
        'mailer' => [
            'class' => 'services\common\MailerService',
            'queueSwitch' => false, // 是否丢进队列
        ],
        /** ------ oauth2 ------ **/
        'oauth2Server' => 'services\oauth2\ServerService',
        'oauth2Client' => 'services\oauth2\ClientService',
        'oauth2AccessToken' => 'services\oauth2\AccessTokenService',
        'oauth2RefreshToken' => 'services\oauth2\RefreshTokenService',
        'oauth2AuthorizationCode' => 'services\oauth2\AuthorizationCodeService',
    ];
}