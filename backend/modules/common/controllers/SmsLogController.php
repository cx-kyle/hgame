<?php
namespace backend\modules\common\controllers;

use Yii;
use common\models\common\SearchModel;
use common\models\common\SmsLog;
use common\enums\StatusEnum;
use backend\controllers\BaseController;

/**
 * Class SmsLogController
 * @package backend\modules\common\controllers
 *   
 */
class SmsLogController extends BaseController
{
    /**
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionIndex()
    {
        $searchModel = new SearchModel([
            'model' => SmsLog::class,
            'scenario' => 'default',
            'partialMatchAttributes' => ['mobile'], // 模糊查询
            'defaultOrder' => [
                'id' => SORT_DESC
            ],
            'pageSize' => $this->pageSize
        ]);

        $dataProvider = $searchModel
            ->search(Yii::$app->request->queryParams);
        $dataProvider->query
            ->andFilterWhere(['merchant_id' => $this->getMerchantId()])
            ->andWhere(['>=', 'status', StatusEnum::DISABLED]);

        return $this->render($this->action->id, [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
}