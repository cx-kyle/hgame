<?php
namespace backend\modules\member\controllers;

use Yii;
use common\models\common\SearchModel;
use common\models\member\CreditsLog;
use common\enums\StatusEnum;
use backend\controllers\BaseController;

/**
 * Class CreditsLogController
 * @package backend\modules\member\controllers
 *   
 */
class CreditsLogController extends BaseController
{
    /**
     * 首页
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionIndex()
    {
        $credit_type = Yii::$app->request->get('credit_type', CreditsLog::CREDIT_TYPE_USER_MONEY);
        $searchModel = new SearchModel([
            'model' => CreditsLog::class,
            'scenario' => 'default',
            'partialMatchAttributes' => ['realname', 'mobile'], // 模糊查询
            'defaultOrder' => [
                'id' => SORT_DESC
            ],
            'pageSize' => $this->pageSize
        ]);

        $dataProvider = $searchModel
            ->search(Yii::$app->request->queryParams);
        $dataProvider->query
            ->andFilterWhere(['merchant_id' => $this->getMerchantId()])
            ->andWhere(['>=', 'status', StatusEnum::DISABLED])
            ->andWhere(['credit_type' => $credit_type])
            ->with('member');

        return $this->render($this->action->id, [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'creditGroup' => CreditsLog::$creditGroupExplain,
            'creditType' => CreditsLog::$creditTypeExplain,
            'credit_type' => $credit_type,
        ]);
    }
}