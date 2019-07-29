<?php
namespace backend\controllers;

use Yii;
use backend\forms\ClearCache;

/**
 * 主控制器
 *
 * Class MainController
 * @package backend\controllers
 *   
 */
class MainController extends BaseController
{
    /**
     * 系统首页
     *
     * @return string
     */
    public function actionIndex()
    {

        // $auth_cookie = $this->getCookie( "_identity-backend" );
        // print_r($auth_cookie);
        // exit;
        return $this->renderPartial($this->action->id, [
        ]);
    }

    /**
     * 子框架默认主页
     *
     * @return string
     */
    public function actionSystem()
    {
        $modules =  Yii::$app->controller->module->modules['xkx2_wx'];
        return $this->render($this->action->id, [
            'module' => $modules
        ]);
    }

    /**
     * 清理缓存
     *
     * @return string
     */
    public function actionClearCache()
    {
        $model = new ClearCache();
        if ($model->load(Yii::$app->request->post())) {
            return $model->save()
                ? $this->message('清理成功', $this->refresh())
                : $this->message($this->getError($model), $this->refresh(), 'error');
        }

        return $this->render($this->action->id, [
            'model' => $model
        ]);
    }
}