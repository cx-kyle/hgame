<?php

namespace backend\modules\sys\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use common\models\hgame\xkx2_wx\MailTask;
use common\components\Curd;
use backend\controllers\BaseController;

/**
 * MailTaskController implements the CRUD actions for MailTask model.
 */
class MailTaskController extends BaseController
{
    use Curd;

    /**
    * @var
    */
    public $modelClass = 'common\models\hgame\xkx2_wx\MailTask';

    /**
    * Lists all MailTask models.
    * @return mixed
    */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => MailTask::find()->orderBy('id desc'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
