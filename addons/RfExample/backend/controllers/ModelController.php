<?php
namespace addons\RfExample\backend\controllers;

use addons\RfExample\common\models\Curd;

/**
 * Class ModelController
 * @package addons\RfExample\backend\controllers
 *   
 */
class ModelController extends BaseController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @return string
     */
    public function actionView($type)
    {
        return $this->renderAjax($type, [
            'model' => new Curd()
        ]);
    }
}