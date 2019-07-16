<?php

namespace common\models\hgame\xkx2_wx;

use Yii;

/**
 * This is the model class for table "notice".
 *
 * @property int $id
 * @property string $info 公告内容
 * @property string $createTime 公告时间
 * @property int $status 0初始化状态（未发送）   1发送成功   2发送失败
 * @property string $market 备注
 * @property string $serverIds
 * @property string $result 发送结果展示
 */
class Notice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notice';
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
            [['info', 'serverIds', 'result'], 'string'],
            [['createTime'], 'safe'],
            [['status'], 'integer'],
            [['market'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'info' => '公告内容',
            'createTime' => '发送时间',
            'status' => '状态',
            'market' => '备注',
            'serverIds' => '服',
            'result' => '公告结果',
        ];
    }
}
