<?php

namespace backend\modules\xkx2\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use common\models\common\SearchModel;
use common\models\hgame\xkx2wxdb\UserOrder;
use common\components\Curd;
use backend\controllers\BaseController;

/**
 * UserOrderController implements the CRUD actions for UserOrder model.
 */
class UserOrderController extends BaseController
{
    use Curd;

    /**
    * @var
    */
    public $modelClass = 'common\models\hgame\xkx2wxdb\UserOrder';

    /**
    * Lists all UserOrder models.
    * @return mixed
    */
    public function actionIndex()
    {
        
        $searchModel = new SearchModel([
            'model' => $this->modelClass,
            'scenario' => 'default',
            'partialMatchAttributes' => [], // 模糊查询
            //'relations' => ['userInfo' => []],
            'defaultOrder' => [
                'id' => SORT_DESC
            ],
            'pageSize' => $this->pageSize
        ]);

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere('game_id = 100468');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }
}
