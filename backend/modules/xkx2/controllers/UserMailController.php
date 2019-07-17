<?php

namespace backend\modules\xkx2\controllers;

use common\components\gm\GameManagerHelper;
use Yii;
use backend\components\ArrayDataProvider;

class UserMailController extends XBaseController
{

    public function actionIndex()
    {
        $data = GameManagerHelper::getUserMailInfo($this->serverId,$this->page,$this->limit);
        $count = GameManagerHelper::getUserMailCount($this->serverId);

        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'totalCount' => isset($count) ? $count : 0,
            'pagination' => [
            'pageSize' => 20,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);

    }

    public function actionEdit()
    {
        $id = Yii::$app->request->get('id', null);

        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render($this->action->id, [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        /* @var $model \yii\db\ActiveRecord */
        if (empty($id) || empty(($model = $this->modelClass::find()->where(['id' => $id])->one()))) {
            $model = new $this->modelClass;
            return $model->loadDefaultValues();
        }

        return $model;
    }

}
