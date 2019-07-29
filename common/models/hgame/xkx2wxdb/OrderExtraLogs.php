<?php

namespace common\models\hgame\xkx2wxdb;

use Yii;

/**
 * This is the model class for table "order_extra_logs".
 *
 * @property int $id
 * @property string $open_id
 * @property string $orderno 游戏中心订单号
 * @property int $adposition
 * @property string $area 游戏 - 区
 * @property string $group 游戏 - 服
 * @property string $level 游戏等级
 * @property string $role_id
 * @property string $createdtime 创建的时间
 * @property string $nickname
 * @property int $vip_level
 * @property int $progress
 * @property int $score
 * @property string $register_time
 * @property string $createrole_time
 * @property string $platform
 * @property string $user_agent
 * @property string $ip IP
 * @property string $location 地址
 * @property double $longitude 经度
 * @property double $latitude 纬度
 * @property string $imei
 * @property string $idfa
 * @property string $sub_channel 广告子渠道标识
 */
class OrderExtraLogs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_extra_logs';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('h5pay');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['open_id', 'orderno', 'adposition', 'area', 'group', 'level', 'role_id', 'createdtime'], 'required'],
            [['adposition', 'vip_level', 'progress', 'score'], 'integer'],
            [['createdtime', 'register_time', 'createrole_time'], 'safe'],
            [['longitude', 'latitude'], 'number'],
            [['open_id', 'orderno', 'role_id', 'imei', 'idfa'], 'string', 'max' => 64],
            [['area', 'group'], 'string', 'max' => 100],
            [['level'], 'string', 'max' => 32],
            [['nickname', 'sub_channel'], 'string', 'max' => 50],
            [['platform'], 'string', 'max' => 30],
            [['user_agent', 'location'], 'string', 'max' => 255],
            [['ip'], 'string', 'max' => 20],
            [['orderno'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'open_id' => 'Open ID',
            'orderno' => 'Orderno',
            'adposition' => 'Adposition',
            'area' => 'Area',
            'group' => 'Group',
            'level' => 'Level',
            'role_id' => 'Role ID',
            'createdtime' => 'Createdtime',
            'nickname' => 'Nickname',
            'vip_level' => 'Vip Level',
            'progress' => 'Progress',
            'score' => 'Score',
            'register_time' => 'Register Time',
            'createrole_time' => 'Createrole Time',
            'platform' => 'Platform',
            'user_agent' => 'User Agent',
            'ip' => 'Ip',
            'location' => 'Location',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'imei' => 'Imei',
            'idfa' => 'Idfa',
            'sub_channel' => 'Sub Channel',
        ];
    }
}
