<?php
namespace common\components;

use Yii;
use yii\base\Model;

/**
 * trait BaseAction
 * @package common\components
 *   
 */
trait BaseAction
{
    private $merchant_id;

    /**
     * 默认分页
     *
     * @var int
     */
    protected $pageSize = 10;

    /**
     * 商户id
     *
     * @return int
     */
    public function getMerchantId($constraint = false)
    {
        if (false === $constraint && false === Yii::$app->params['merchantOpen']) {
            return '';
        }

        if (!$this->merchant_id) {
            $this->merchant_id = Yii::$app->services->merchant->getId();
        }

        return $this->merchant_id;
    }

    /**
     * @param Model $model
     * @return string
     */
    public function getError(Model $model)
    {
        return $this->analyErr($model->getFirstErrors());
    }


    /**
     * 解析错误
     *
     * @param $fistErrors
     * @return string
     */
    protected function analyErr($firstErrors)
    {
        return Yii::$app->debris->analyErr($firstErrors);
    }

    /**
     * @param $model \yii\db\ActiveRecord|Model
     * @throws \yii\base\ExitException
     */
    protected function activeFormValidate($model)
    {
        if (Yii::$app->request->isAjax && !Yii::$app->request->isPjax) {
            if ($model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                Yii::$app->response->data = \yii\widgets\ActiveForm::validate($model);
                Yii::$app->end();
            }
        }
    }

    /**
     * 错误提示信息
     *
     * @param string $msgText 错误内容
     * @param string $skipUrl 跳转链接
     * @param string $msgType 提示类型 [success/error/info/warning]
     * @return mixed
     */
    protected function message($msgText, $skipUrl, $msgType = null)
    {
        if (!$msgType || !in_array($msgType, ['success', 'error', 'info', 'warning'])) {
            $msgType = 'success';
        }

        Yii::$app->getSession()->setFlash($msgType, $msgText);
        return $skipUrl;
    }
}