<?php
namespace addons\RfArticle\backend\controllers;

use Yii;
use common\components\Curd;
use addons\RfArticle\common\models\Adv;

/**
 * 幻灯片
 *
 * Class AdvController
 * @package addons\RfArticle\backend\controllers
 *   
 */
class AdvController extends BaseController
{
    use Curd;

    /**
     * @var Adv
     */
    public $modelClass = Adv::class;

    /**
     * 编辑/创建
     *
     * @return mixed
     */
    public function actionEdit()
    {
        $request = Yii::$app->request;
        $id = $request->get('id', null);
        $model = $this->findModel($id);
        if ($model->load($request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render($this->action->id, [
            'model' => $model,
            'locals' => Adv::$localExplain,
        ]);
    }
}