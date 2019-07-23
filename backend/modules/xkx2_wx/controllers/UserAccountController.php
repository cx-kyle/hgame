<?php

namespace backend\modules\xkx2_wx\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use common\models\common\SearchModel;
use common\models\hgame\xkx2wxdb\Account;
use common\components\Curd;
use backend\controllers\BaseController;

/**
 * UserAccountController implements the CRUD actions for Account model.
 */
class UserAccountController extends BaseController
{
    use Curd;

    /**
    * @var
    */
    public $modelClass = 'common\models\hgame\xkx2wxdb\Account';

    /**
    * Lists all Account models.
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

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }
}
