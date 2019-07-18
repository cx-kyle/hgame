<?php

namespace backend\modules\xkx2\controllers;

use backend\components\ArrayDataProvider;
use common\components\Curd;
use common\components\gm\GameManagerHelper;
use Yii;

class UserMailController extends XBaseController
{
    use Curd;
    public $modelClass = 'common\models\hgame\xkx2wxdb\ServerInfo';

    public function actionIndex()
    {
        $where = "1=1";
        $search = Yii::$app->request->queryParams;
        if (!empty($search)) {
            $where .= $this->search($search); 
        }
        
        $data = GameManagerHelper::getUserMailInfo($this->serverId, $this->page, $this->limit,$where);
        $count = GameManagerHelper::getUserMailCount($this->serverId,$where);

        $searchModel = [];
        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'totalCount' => isset($count) ? $count : 0,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
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


    protected function Search($params)
    {
        $query = '';
        $data = Yii::$app->params['xkx2wx_usermail'];
        foreach ($params as $key => $attributes) {
            foreach($attributes as $name => $value){
                if(!empty($value)){
                    if(in_array($name,$data)){
                        if (intval($value)> 0){
                            $query .=  " and ".$name." = " .$value;
                        }else{
                            $query .= " and ".$name." like  '%" . $value . "%'";
                        }
                        
                    }
                }
               
            }
        }
        return $query;
    }
}
