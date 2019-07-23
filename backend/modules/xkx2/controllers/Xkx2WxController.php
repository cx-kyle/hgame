<?php

namespace backend\modules\xkx2\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use common\models\hgame\xkx2_wx\MailTask;
use common\components\Curd;
use backend\controllers\BaseController;
use common\helpers\ExcelHelper;
use Codeception\Lib\Generator\Helper;
use yii\helpers\ArrayHelper;
use common\components\gm\GameManagerHelper;

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

    /**
     * 编辑/创建
     *
     * @return mixed
     */
    public function actionEdit()
    {
        $id = Yii::$app->request->get('id', null);
        $model = $this->findModel($id);

        $serversInfoAll = GameManagerHelper::loadServers('',-1);

        $serverInfoArr = array_slice($serversInfoAll, 0);

        $item = ArrayHelper::map($serverInfoArr, 'code', 'name');
       
        if ($model->load(Yii::$app->request->post()) ) {

            try {
                $file = $_FILES['excelFile'];
                $data = ExcelHelper::getMailUsers($file['tmp_name'], 2);
                // \common\helpers\RfImportHelper::auth($data);
            } catch (\Exception $e) {
                return $this->message($e->getMessage(), $this->redirect(['index']), 'error');
            }
            if(count($data) > 0){
                $model['excelItems'] = json_encode($data);
            }


            if(count($model['serverId']) > 0) {
                $model['serverId'] = vsprintf("[%s]", $model['serverId']);
               
            }
            
            
            if ($model->save()) {
                return $this->redirect(['index']);
            }
           
        }

        return $this->render($this->action->id, [
            'item' => $item,
            'model' => $model,
        ]);
    }
}
