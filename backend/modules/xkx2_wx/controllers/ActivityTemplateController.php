<?php

namespace backend\modules\xkx2_wx\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use common\models\common\SearchModel;
use common\models\hgame\xkx2wxdb\ActivityTemplate;
use common\components\Curd;
use common\components\gm\GameManagerHelper;
use backend\controllers\BaseController;
use common\helpers\Url;

/**
 * ActivityTemplateController implements the CRUD actions for ActivityTemplate model.
 */
class ActivityTemplateController extends BaseController
{
    use Curd;

    /**
    * @var
    */
    public $modelClass = 'common\models\hgame\xkx2wxdb\ActivityTemplate';

    /**
    * Lists all ActivityTemplate models.
    *活动模板
    * @return mixed
    */
    public function actionIndex()
    {
        Yii::$app->User->setReturnUrl(Url::current());
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

    // 全服活动
    public function actionAll()
    {
        ini_set("memory_limit","2048M");
        set_time_limit(0);
        Yii::$app->User->setReturnUrl(Url::current());
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
        $uwActivity = new ActivityTemplate();
        list($list, $pages) = $uwActivity::getListAllSr();
       // var_dump($list);die;
        return $this->render('all', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'list'        =>$list
        ]);

    }
    //全服同步活动
    public function actionAllservice()
    {
      
       $template = Yii::$app->request->queryParams;
       $uwActivity = new ActivityTemplate();
     
       if($uwActivity->updateAllServers($template['id'])){
        Yii::$app->getSession()->setFlash('success', '全服同步成功');
        return $this->goBack();
       }else{
         Yii::$app->getSession()->setFlash('error', '全服同步失败');
         return $this->goBack();
       }
    }
}
