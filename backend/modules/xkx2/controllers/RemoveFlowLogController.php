<?php

namespace backend\modules\xkx2\controllers;

use backend\components\ArrayDataProvider;
use common\components\Curd;
use common\components\gm\GameManagerHelper;
use Yii;

class RemoveFlowLogController extends XBaseController
{
    
    public $dsnInfo = '_server_log_'; 

    public function actionIndex()
    {
        $where = "1=1";
        $search = Yii::$app->request->queryParams;
        if (!empty($search)) {
            $where .= $this->search($search); 
        }
        
        $data = GameManagerHelper::getRemoveFlowLog($this->serverId, $this->page, $this->limit,$where,$this->dsnInfo);
        $count = GameManagerHelper::getRemoveFlowLogCount($this->serverId,$where,$this->dsnInfo);

        $searchModel = [];
        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'totalCount' => isset($count) ? $count : 0,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'area' => $this->serversInfo,
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'serverID' =>$this->serverId,
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
        $data = Yii::$app->params['xkx2wx_usermoneylog'];
    
        foreach ($params as $key => $attributes) {
            foreach($attributes as $name => $value){
                if(!empty($value)){
                    if(in_array($name,$data)){  
                            $query .=  " and " . $name." = '$value' ";
                        
                    }
                }
               
            }
        }
        return $query;
    }
}
