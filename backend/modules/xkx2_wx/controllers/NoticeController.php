<?php

namespace backend\modules\xkx2_wx\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use common\models\hgame\xkx2_wx\Notice;
use common\components\Curd;
use yii\web\Controller;

/**
 * NoticeController implements the CRUD actions for Notice model.
 */
class NoticeController extends Controller
{
    use Curd;

    /**
    * @var
    */
    public $modelClass = 'common\models\hgame\xkx2_wx\Notice';

    /**
    * Lists all Notice models.
    * @return mixed
    */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Notice::find()->orderBy('id desc'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
