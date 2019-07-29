<?php

namespace common\models\hgame\xkx2wxdb;

use Yii;

/**
 * This is the model class for table "userorders".
 *
 * @property int $id
 * @property int $user_id
 * @property int $app_id 用户所在渠道ID
 * @property int $game_id 游戏厂商ID
 * @property string $open_id
 * @property string $orderno 游戏中心订单号
 * @property string $gameorderno 消费使用，游戏方产生的订单号
 * @property string $billorderno 充值使用，支付方生成的订单号
 * @property string $subject
 * @property string $description
 * @property int $quantity
 * @property string $total_fee
 * @property string $recharge_fee 充值使用，用户实际充值数目
 * @property string $need_recharge_fee 消费使用，用户完成此次消费需要充值的数目
 * @property int $points
 * @property string $ip
 * @property string $product_id 苹果支付使用
 * @property string $payname 充值使用，此次充值使用的支付方式
 * @property string $current_balance 本次操作完成后用户余额
 * @property string $notify_url
 * @property int $notify_count 向游戏服务器发起通知的次数
 * @property string $notify_time 最后一次通知游戏端的时间
 * @property int $status 订单状态(创建，充值成功，消费成功，通知游戏成功)
 * @property string $finishedtime 订单完成支付的时间
 * @property string $verifytime 客户端完成支付过来校验的时间
 * @property string $createdtime 订单创建的时间
 */
class UserOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userorders';
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
            [['user_id', 'app_id', 'game_id', 'quantity', 'points', 'notify_count', 'status'], 'integer'],
            [['app_id', 'open_id', 'orderno', 'billorderno', 'subject', 'need_recharge_fee', 'payname', 'current_balance', 'notify_time', 'status', 'finishedtime', 'verifytime', 'createdtime'], 'required'],
            [['total_fee', 'recharge_fee', 'need_recharge_fee', 'current_balance'], 'number'],
            [['notify_time', 'finishedtime', 'verifytime', 'createdtime'], 'safe'],
            [['open_id', 'orderno', 'gameorderno', 'billorderno'], 'string', 'max' => 64],
            [['subject'], 'string', 'max' => 200],
            [['description', 'notify_url'], 'string', 'max' => 1000],
            [['ip'], 'string', 'max' => 32],
            [['product_id'], 'string', 'max' => 100],
            [['payname'], 'string', 'max' => 30],
            [['orderno'], 'unique'],
            [['game_id', 'gameorderno'], 'unique', 'targetAttribute' => ['game_id', 'gameorderno']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'user_id' => '用户ID',
            'app_id' => '渠道ID',
            'game_id' => '游戏ID',
            'open_id' => 'OpenID',
            'orderno' => '订单号',
            'gameorderno' => 'Gameorderno',
            'billorderno' => '支付方订单号',
            'subject' => '购买物品',
            'description' => '描述',
            'quantity' => 'Quantity',
            'total_fee' => '物品价格',
            'recharge_fee' => '支付金额',
            'need_recharge_fee' => '需要支付金额',
            'points' => 'Points',
            'ip' => 'Ip',
            'product_id' => 'Product ID',
            'payname' => '支付方式',
            'current_balance' => 'Current Balance',
            'notify_url' => 'Notify Url',
            'notify_count' => 'Notify Count',
            'notify_time' => 'Notify Time',
            'status' => '订单状态',
            'finishedtime' => '完成时间',
            'verifytime' => 'Verifytime',
            'createdtime' => '创建时间',
        ];
    }

    public function getUserInfo()
    {
        return $this->hasOne(OrderExtraLogs::className(),['orderno'=>'orderno']);
    }
}
