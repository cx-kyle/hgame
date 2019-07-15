<?php
namespace addons\RfExample\backend\controllers;

/**
 * Class TestController
 * @package addons\RfExample\backend\controllers
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