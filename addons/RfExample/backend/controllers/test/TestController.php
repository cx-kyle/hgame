<?php
namespace addons\RfExample\backend\controllers\test;

use addons\RfExample\backend\controllers\BaseController;

/**
 * Class TestController
 * @package addons\RfExample\backend\controllers\test
 *   
 */
class TestController extends BaseController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [

        ]);
    }

    /**
     * @return string
     */
    public function actionUpdate()
    {
        return $this->render('update', [

        ]);
    }
}