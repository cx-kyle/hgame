<?php

namespace common\models\hgame\xkx2wxdb;

use Yii;

/**
 * This is the model class for table "account".
 *
 * @property string $id 序号
 * @property string $openId 账号名
 * @property int $channelId 渠道id
 * @property int $loginCount
 * @property int $status 账号状态  0正常 ，1普通封号，2设备封号
 * @property string $freeze 封号备注
 * @property string $bendExpireAt 禁言过期时间
 * @property int $bendType 禁言类型，第一位为普通聊天，第二位客服聊天
 * @property int $lastLoginServerId 最后登录服务器ID
 * @property string $lastLoginTime
 * @property string $createIP 创建ip
 * @property string $createTime 创建时间
 * @property string $InviterOpenId 英雄贴-邀请者openId
 */
class Account extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'account';
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
            [['openId'], 'required'],
            [['channelId', 'loginCount', 'status', 'bendType', 'lastLoginServerId'], 'integer'],
            [['bendExpireAt', 'lastLoginTime', 'createTime'], 'safe'],
            [['openId', 'createIP'], 'string', 'max' => 50],
            [['freeze'], 'string', 'max' => 255],
            [['InviterOpenId'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'openId' => 'OpenID',
            'channelId' => '渠道ID',
            'loginCount' => '登录次数',
            'status' => '状态',
            'freeze' => '封号备注',
            'bendExpireAt' => '禁言过期时间',
            'bendType' => '禁言类型',
            'lastLoginServerId' => '最后登录服务器ID',
            'lastLoginTime' => '最近登录时间',
            'createIP' => '创建ip',
            'createTime' => '创角时间',
            'InviterOpenId' => '英雄贴-邀请者openId',
        ];
    }
}
