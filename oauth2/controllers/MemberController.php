<?php

namespace oauth2\controllers;

use Yii;
use yii\filters\Cors;
use yii\web\BadRequestHttpException;
use oauth2\behaviors\JWTAuth;
use common\components\BaseAction;

/**
 * Class MemberController
 * @package oauth2\controllers
 *   
 */
class MemberController extends \yii\rest\ActiveController
{
    use BaseAction;

    /**
     * 不用进行登录验证的方法
     * 例如： ['index', 'update', 'create', 'view', 'delete']
     * 默认全部需要验证
     *
     * @var array
     */
    protected $optional = [];

    /**
     * 启始位移
     *
     * @var int
     */
    protected $offset = 0;

    /**
     * 实际每页数量
     *
     * @var
     */
    protected $limit;

    /**
     * 行为验证
     *
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        // 跨域支持
        $behaviors['corsFilter'] = [
            'class' => Cors::class,
        ];

        // 授权验证
        $behaviors['jwtAuth'] = [
            'class' => JWTAuth::class,
            'optional' => $this->optional, // 不进行认证判断方法
        ];

        return $behaviors;
    }

    /**
     * @return array
     */
    public function actions()
    {
        $actions = parent::actions();
        // 注销系统自带的实现方法
        unset($actions['index']);

        return $actions;
    }

    /**
     * @return array|\common\models\member\Member|null|\yii\db\ActiveRecord
     */
    public function actionIndex()
    {
        $member_id = Yii::$app->user->identity->member_id;
        $member = Yii::$app->services->member->get($member_id);

        // TODO 校验返回那些用户信息

        return $member;
    }

    /**
     * @param $action
     * @return bool|void
     * @throws BadRequestHttpException
     */
    public function beforeAction($action)
    {
        parent::beforeAction($action);

        // 方法名称
        if (in_array($action, ['view', 'update', 'create', 'delete'])) {
            throw new \yii\web\BadRequestHttpException('您的权限不足，如需要请联系管理员');
        }
    }
}