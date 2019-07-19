<?php

namespace backend\modules\xkx2\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use common\models\common\SearchModel;
use common\models\hgame\xkx2wxdb\UserEntergameLogs;
use common\components\Curd;
use backend\controllers\BaseController;

/**
 * UserEnterGameLogController implements the CRUD actions for UserEntergameLogs model.
 */
class UserEnterGameLogController extends BaseController
{
    use Curd;

    /**
    * @var
    */
    public $modelClass = 'common\models\hgame\xkx2wxdb\UserEntergameLogs';

    /**
    * Lists all UserEntergameLogs models.
    * @return mixed
    */
    public function actionIndex()
    {
        $searchModel = new SearchModel([
            'model' => $this->modelClass,
            'scenario' => 'default',
            'partialMatchAttributes' => [], // 模糊查询
            'defaultOrder' => [
                'id' => SORT_DESC
            ],
            'pageSize' => $this->pageSize
        ]);

        if (!empty(Yii::$app->request->queryParams) && !empty(Yii::$app->request->queryParams['SearchModel'])){
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        }else{
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $dataProvider->query->andWhere(['open_id'=> '']);
            }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }
}
