<?php

namespace common\models\hgame\xkx2wxdb;

use Yii;

/**
 * This is the model class for table "server_info".
 *
 * @property string $id id
 * @property string $name
 * @property string $area 游戏区
 * @property int $serverIndex
 * @property int $serverId
 * @property string $appId 渠道分区名
 * @property string $crossGroup 所属跨服组名
 * @property string $crossCD
 * @property string $crossRank 排行榜所在跨服组,必须cross开头数字结尾
 * @property string $crossChat 聊天跨服组 必须cross开头数字结尾
 * @property string $crossFlyUp 飞升榜跨服组名(必须cross开头数字结尾)
 * @property string $crossFlyUpDate 飞升榜跨服组生效日期，比如2019-01-01，则跨服组在2019-01-01这天0点开始生效
 * @property string $crossFlyUpAutoMatchId 飞升榜跨服自动匹配跨服组id
 * @property string $crossFlyUpAutoMatchDate 飞升榜跨服自动匹配开启日期
 * @property string $crossChivalryDate 屠鲲刀跨服生效日期，比如2019-01-01，则屠鲲刀在2019-01-01这天0点结算时开始进入跨服匹配
 * @property int $isCrossGroupModify 是否更改了跨服组
 * @property string $gates gate列表
 * @property string $redisAddr redis_info
 * @property string $gsHostIn 内网Gs服务器ip
 * @property string $gsHostWww 外网Gs服务器ip
 * @property string $gsPort GameServer的端口
 * @property string $centerPort CenterServer的端口
 * @property int $isNew 是否是新区
 * @property int $status 状态:, 1:良好，2:正常，3:爆满
 * @property string $openTime 开服时间
 * @property int $isClose 是否维护
 * @property string $closeExplain 维护说明
 * @property int $ipFilter 是否开启白名单登录0否，1是
 * @property string $prefix
 * @property string $version 版本号
 * @property string $clientVersion 客户端资源版本号
 * @property int $isTrialVersion 是否是体验服
 * @property string $dblink 数据库连接地址
 * @property string $dblinkLog 日志数据库连接地址
 * @property int $svridx serverIndex记录值
 */
class ServerInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'server_info';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('xkx2wxdb');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['serverIndex', 'closeExplain'], 'required'],
            [['serverIndex', 'serverId', 'crossFlyUpAutoMatchId', 'isCrossGroupModify', 'isNew', 'status', 'isClose', 'ipFilter', 'isTrialVersion', 'svridx'], 'integer'],
            [['crossCD', 'crossFlyUpDate', 'crossFlyUpAutoMatchDate', 'crossChivalryDate', 'openTime'], 'safe'],
            [['closeExplain'], 'string'],
            [['name', 'area'], 'string', 'max' => 32],
            [['appId', 'crossGroup', 'crossRank', 'crossChat', 'crossFlyUp', 'gsHostIn', 'gsHostWww', 'clientVersion', 'dblinkLog'], 'string', 'max' => 100],
            [['gates'], 'string', 'max' => 255],
            [['redisAddr'], 'string', 'max' => 25],
            [['gsPort', 'centerPort', 'version'], 'string', 'max' => 50],
            [['prefix'], 'string', 'max' => 16],
            [['dblink'], 'string', 'max' => 200],
            [['serverIndex'], 'unique'],
            [['serverId'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '服名称',
            'area' => '游戏区',
            'serverIndex' => 'Server',
            'serverId' => 'ServerID',
            'appId' => '渠道',
            'crossGroup' => '战斗跨服组',
            'crossCD' => 'Cross Cd',
            'crossRank' => '七日比拼跨服组',
            'crossChat' => '聊天跨服组',
            'crossFlyUp' => '飞升榜跨服组',
            'crossFlyUpDate' => '飞升榜跨服组生效日期',
            'crossFlyUpAutoMatchId' => 'Cross Fly Up Auto Match ID',
            'crossFlyUpAutoMatchDate' => 'Cross Fly Up Auto Match Date',
            'crossChivalryDate' => 'Cross Chivalry Date',
            'isCrossGroupModify' => 'Is Cross Group Modify',
            'gates' => 'Gates',
            'redisAddr' => 'Redis Addr',
            'gsHostIn' => 'Gs Host In',
            'gsHostWww' => 'Gs Host Www',
            'gsPort' => 'Gs Port',
            'centerPort' => 'Center Port',
            'isNew' => '是否新区',
            'status' => '状态',
            'openTime' => '开服时间',
            'isClose' => '是否维护',
            'closeExplain' => '维护说明',
            'ipFilter' => 'Ip Filter',
            'prefix' => 'Prefix',
            'version' => 'Version',
            'clientVersion' => 'Client Version',
            'isTrialVersion' => 'Is Trial Version',
            'dblink' => 'Dblink',
            'dblinkLog' => 'Dblink Log',
            'svridx' => 'Svridx',
        ];
    }
}
