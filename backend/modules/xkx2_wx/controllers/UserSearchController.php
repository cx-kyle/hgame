<?php

namespace backend\modules\xkx2_wx\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use common\models\common\SearchModel;
use common\models\hgame\xkx2wxdb\UserSearch;
use common\components\Curd;
use backend\controllers\BaseController;

/**
 * UserSearchController implements the CRUD actions for UserSearch model.
 */
class UserSearchController extends BaseController
{
    use Curd;

    /**
    * @var
    */
    public $modelClass = 'common\models\hgame\xkx2wxdb\UserSearch';

    /**
    * Lists all UserSearch models.
    * @return mixed
    */
    public function actionIndex()
    {
        $searchModel = new SearchModel([
            'model' => $this->modelClass,
            'scenario' => 'default',
            'partialMatchAttributes' => [], // 模糊查询
            'defaultOrder' => [
                'user_id' => SORT_DESC
            ],
            'pageSize' => $this->pageSize
        ]);

        if (!empty(Yii::$app->request->queryParams) && !empty(Yii::$app->request->queryParams['SearchModel']['open_id'])){
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
