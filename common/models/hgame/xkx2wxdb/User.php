<?php

namespace common\models\hgame\xkx2wxdb;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property string $userId 玩家唯一ID
 * @property string $openId 玩家账号
 * @property int $serverIndex 服务器索引
 * @property int $serverId 服务器ID
 * @property string $nickname 玩家昵称
 * @property int $level 玩家等级
 * @property string $avatar 玩家头像链接
 * @property int $sex 性别
 * @property int $vip VIP等级
 * @property int $medal 称号
 * @property string $combat 战力
 * @property int $colorId 自建门派名字颜色id
 * @property int $logoId 自建门派徽标id（全服去重）
 * @property string $beforeGuildName 公会名称
 * @property int $weaponId 武器ID
 * @property int $clothId 衣服ID
 * @property int $wingId 翅膀ID
 * @property int $jobId 职业ID
 * @property string $guildName 帮派名
 * @property string $updateTime 最后更新时间
 * @property string $prop1 自定义属性1
 * @property string $friendRecharge 英雄贴玩家数据
 * @property int $wearMedalLvl 穿戴称号特级
 * @property int $dayRechargeMax 玩家日充值最高金额
 * @property int $rechargeAll 玩家充值额
 * @property string $createTime 创角时间
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
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
            [['userId', 'beforeGuildName'], 'required'],
            [['userId', 'serverIndex', 'serverId', 'level', 'sex', 'vip', 'medal', 'combat', 'colorId', 'logoId', 'weaponId', 'clothId', 'wingId', 'jobId', 'wearMedalLvl', 'dayRechargeMax', 'rechargeAll'], 'integer'],
            [['updateTime', 'createTime'], 'safe'],
            [['prop1'], 'string'],
            [['openId'], 'string', 'max' => 100],
            [['nickname'], 'string', 'max' => 50],
            [['avatar'], 'string', 'max' => 200],
            [['beforeGuildName'], 'string', 'max' => 32],
            [['guildName'], 'string', 'max' => 128],
            [['friendRecharge'], 'string', 'max' => 256],
            [['userId'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userId' => '角色ID',
            'openId' => 'OpenID',
            'serverIndex' => '服务器索引',
            'serverId' => '服务器ID',
            'nickname' => '玩家昵称',
            'level' => '玩家等级',
            'avatar' => '玩家头像链接',
            'sex' => '性别',
            'vip' => 'VIP等级',
            'medal' => '称号',
            'combat' => '战力',
            'colorId' => 'Color ID',
            'logoId' => 'Logo ID',
            'beforeGuildName' => '公会名称',
            'weaponId' => '武器ID',
            'clothId' => 'Cloth ID',
            'wingId' => 'Wing ID',
            'jobId' => 'Job ID',
            'guildName' => 'Guild Name',
            'updateTime' => '最后更新时间',
            'prop1' => 'Prop1',
            'friendRecharge' => 'Friend Recharge',
            'wearMedalLvl' => 'Wear Medal Lvl',
            'dayRechargeMax' => 'Day Recharge Max',
            'rechargeAll' => 'Recharge All',
            'createTime' => 'Create Time',
        ];
    }
}
