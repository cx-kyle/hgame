<?php

namespace backend\modules\xkx2\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use common\models\hgame\xkx2_wx\MailTask;
use common\components\Curd;
use backend\controllers\BaseController;

/**
 * MailTaskController implements the CRUD actions for MailTask model.
 */
class Xkx2WxController extends BaseController
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
