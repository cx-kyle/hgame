<?php

namespace common\models\hgame\xkx2wxdb;

use Yii;

/**
 * This is the model class for table "user_1".
 *
 * @property string $user_id
 * @property string $name
 * @property string $app_user_id
 * @property string $nickname
 * @property string $real_name
 * @property string $gender
 * @property string $birthday
 * @property string $email
 * @property string $cell
 * @property string $phone
 * @property string $status
 * @property string $platform
 * @property string $platform_user_id
 * @property string $udid
 * @property int $partner_id 合作伙伴id
 * @property int $app_id 合作伙伴的appid
 * @property string $equipment_id
 * @property string $register_time
 * @property string $bind_time
 * @property string $update_time
 * @property string $last_login_time
 * @property string $register_ip
 * @property int $is_guest 是否是游客账户 1:是  0:不是
 * @property string $open_id
 * @property string $avatar
 * @property string $channel_id 渠道id，对于hgame自己的账户有用。
 * @property string $share_uid
 * @property int $point 用户金币
 */
class UserSearch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_1';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('h5center');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'partner_id', 'app_id', 'is_guest', 'channel_id', 'share_uid', 'point'], 'integer'],
            [['birthday', 'register_time', 'bind_time', 'update_time', 'last_login_time'], 'safe'],
            [['name'], 'string', 'max' => 128],
            [['app_user_id'], 'string', 'max' => 64],
            [['nickname'], 'string', 'max' => 36],
            [['real_name', 'phone'], 'string', 'max' => 32],
            [['gender'], 'string', 'max' => 10],
            [['email', 'platform_user_id', 'udid', 'equipment_id'], 'string', 'max' => 50],
            [['cell'], 'string', 'max' => 11],
            [['status', 'platform'], 'string', 'max' => 30],
            [['register_ip'], 'string', 'max' => 16],
            [['open_id'], 'string', 'max' => 66],
            [['avatar'], 'string', 'max' => 258],
            [['name'], 'unique'],
            [['open_id'], 'unique'],
            [['app_user_id', 'app_id'], 'unique', 'targetAttribute' => ['app_user_id', 'app_id']],
            [['user_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => '用户ID',
            'name' => 'Name',
            'app_user_id' => '渠道方UserID',
            'nickname' => '昵称',
            'real_name' => 'Real Name',
            'gender' => 'Gender',
            'birthday' => 'Birthday',
            'email' => 'Email',
            'cell' => 'Cell',
            'phone' => '手机号',
            'status' => '状态',
            'platform' => 'Platform',
            'platform_user_id' => 'Platform User ID',
            'udid' => 'Udid',
            'partner_id' => 'Partner ID',
            'app_id' => 'App ID',
            'equipment_id' => 'Equipment ID',
            'register_time' => '注册时间',
            'bind_time' => 'Bind Time',
            'update_time' => 'Update Time',
            'last_login_time' => 'Last Login Time',
            'register_ip' => 'Register Ip',
            'is_guest' => '是否游客',
            'open_id' => 'OpenID',
            'avatar' => 'Avatar',
            'channel_id' => '渠道ID',
            'share_uid' => 'Share Uid',
            'point' => '用户金币',
        ];
    }
}
