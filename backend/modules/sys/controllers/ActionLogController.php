<?php
namespace backend\modules\sys\controllers;

use Yii;
use common\models\common\SearchModel;
use common\enums\StatusEnum;
use common\models\sys\ActionLog;
use backend\controllers\BaseController;

/**
 * Class ActionLogController
 * @package backend\modules\sys\controllers
 *   
 */
class ActionLogController extends BaseController
{
    /**
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionIndex()
    {
        $searchModel = new SearchModel([
            'model' => ActionLog::class,
            'scenario' => 'default',
            'partialMatchAttributes' => ['behavior', 'method', 'url', 'remark'], // 模糊查询
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
            ->with(['manager']);

        return $this->render($this->action->id, [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * 行为日志详情
     *
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        $model = ActionLog::find()
            ->where(['id' => $id])
            ->one();

        return $this->renderAjax($this->action->id, [
            'model' => $model,
        ]);
    }
}