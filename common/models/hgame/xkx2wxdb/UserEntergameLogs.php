<?php

namespace common\models\hgame\xkx2wxdb;

use Yii;

/**
 * This is the model class for table "user_entergame_logs".
 *
 * @property string $id
 * @property int $user_id
 * @property int $game_id
 * @property int $app_id
 * @property string $open_id
 * @property string $created
 * @property string $area
 * @property string $group
 * @property string $role_id
 * @property string $nickname
 * @property int $level 用户角色等级
 * @property string $vip_level 用户VIP等级
 * @property int $score 用户分数战力等
 * @property string $platform
 * @property string $timing
 * @property int $is_new 是否是第一次角色登录（1：Y ，0：N）
 * @property int $ad
 * @property string $ip
 * @property string $location
 * @property string $province
 * @property string $city
 * @property double $longitude 经度
 * @property double $latitude 经度
 * @property string $user_agent 客户端信息
 * @property int $is_valid 达到一定等级用户的标示
 * @property string $gamecoin 用户目前的金币数
 * @property int $cash 用户目前的元宝数
 * @property string $share_uid
 * @property string $imei
 * @property string $idfa
 * @property string $register_time
 * @property string $sub_channel 广告子渠道标识
 */
class UserEntergameLogs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_entergame_logs';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('h5loguser');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'game_id', 'app_id', 'level', 'score', 'is_new', 'ad', 'is_valid', 'gamecoin', 'cash', 'share_uid'], 'integer'],
            [['created'], 'required'],
            [['created', 'register_time'], 'safe'],
            [['longitude', 'latitude'], 'number'],
            [['open_id', 'area', 'group', 'imei', 'idfa'], 'string', 'max' => 64],
            [['role_id', 'nickname', 'vip_level', 'location', 'user_agent'], 'string', 'max' => 255],
            [['platform', 'sub_channel'], 'string', 'max' => 50],
            [['timing'], 'string', 'max' => 300],
            [['ip'], 'string', 'max' => 20],
            [['province', 'city'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '用户ID',
            'game_id' => '游戏ID',
            'app_id' => '渠道ID',
            'open_id' => 'OpenID',
            'created' => 'Created',
            'area' => '区',
            'group' => '服',
            'role_id' => 'RoleID',
            'nickname' => '昵称',
            'level' => '等级',
            'vip_level' => 'VIP等级',
            'score' => '用户分数战力等',
            'platform' => '平台',
            'timing' => 'Timing',
            'is_new' => '是否是第一次角色登录（1：Y ，0：N）',
            'ad' => 'Ad',
            'ip' => 'Ip',
            'location' => '地址',
            'province' => 'Province',
            'city' => 'City',
            'longitude' => '经度',
            'latitude' => '经度',
            'user_agent' => '设备信息',
            'is_valid' => '达到一定等级用户的标示',
            'gamecoin' => '用户目前的金币数',
            'cash' => '用户目前的元宝数',
            'share_uid' => 'Share Uid',
            'imei' => 'Imei',
            'idfa' => 'Idfa',
            'register_time' => 'Register Time',
            'sub_channel' => '广告子渠道标识',
        ];
    }
}
