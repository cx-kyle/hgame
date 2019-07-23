<?php

namespace common\models\hgame\xkx2_wx;

use Yii;

/**
 * This is the model class for table "mail_task".
 *
 * @property int $id
 * @property int $etype 0个人邮件    1全服邮件
 * @property string $sendTime 发送时间
 * @property string $expireAt
 * @property string $title
 * @property string $content
 * @property string $userId json数组[100221, 137654, 5] 格式的userId
 * @property string $extCondition 邮件发送附加条件， 比如是否在线等。json字符串
 * @property string $excelItems 导入excel批量发送邮件的明细
 * @property string $items 具体发送的道具，json字符串
 * @property int $status 0 - 还未开始发送， 99 - 已删除， 1 - 发送进行中， 2 - 发送完毕
 * @property int $mailCount 本批发送总邮件数
 * @property string $createdtime
 * @property string $sender
 * @property int $type
 * @property string $serverId
 */
class MailTask extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mail_task';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('xkx2wx');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['etype', 'status', 'mailCount', 'type'], 'integer'],
            [['sendTime', 'expireAt', 'createdtime'], 'safe'],
            [['expireAt', 'title'], 'required'],
            [['content', 'userId', 'extCondition', 'excelItems', 'items', 'serverId'], 'string'],
            [['title'], 'string', 'max' => 50],
            [['sender'], 'string', 'max' => 255],
            ['etype', 'default', 'value' => 0],
            [['sender'], 'default', 'value' => '系统消息'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'etype' => 'Etype',
            'sendTime' => '发送时间',
            'expireAt' => '截止时间',
            'title' => '标题',
            'content' => '内容',
            'userId' => '用户ID',
            'extCondition' => 'ExtCondition',
            'excelItems' => '导入excel',
            'items' => '具体发送的道具',
            'status' => '状态',
            'mailCount' => '邮件总数',
            'createdtime' => '时间时间',
            'sender' => 'Sender',
            'type' => '邮件类型',
            'serverId' => 'Server ID',
        ];
    }
}
