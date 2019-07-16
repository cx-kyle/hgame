<?php
namespace common\components;

use Yii;
use yii\base\BootstrapInterface;
use common\models\sys\Manager;
use common\helpers\ArrayHelper;
use common\helpers\FileHelper;

/**
 * Class InitConfig
 * @package common\components
 *   
 */
class Init implements BootstrapInterface
{
    protected $id;

    /**
     * @param \yii\base\Application $application
     * @throws \yii\base\InvalidConfigException
     */
    public function bootstrap($application)
    {
        $this->id = $application->id;// 初始化变量
        
        if (Yii::$app->id == 'backend') {
            /** @var Manager $identity */
            $identity = Yii::$app->user->identity;
            $this->afreshLoad($identity->merchant_id ?? 1);
        } elseif (Yii::$app->id == 'console') {
            $this->afreshLoad(1);
        } else {
            $this->afreshLoad(Yii::$app->request->get('merchant_id', 1));
        }
    }

    /**
     * 重载配置
     *
     * @param $merchant_id
     */
    public function afreshLoad($merchant_id)
    {
        try {
            Yii::$app->services->merchant->setId($merchant_id);
            $config = Yii::$app->debris->configAll();
            $this->initParams($config);// 初始化组件
            $this->initComponents($config);

            unset($config);
        } catch (\Exception $e) {

        }
    }

    /**
     * @param $config
     * @throws \yii\base\InvalidConfigException
     */
    protected function initParams($config)
    {
        $callbackUrl = $notifyUrl = '';
        if (!empty($this->id) && $this->id != 'console') {
            $callbackUrl = Yii::$app->request->getUrl();
            $notifyUrl = Yii::$app->request->hostInfo . Yii::$app->urlManager->createUrl(['notify/index']);
        }

        unset($config);
    }

    /**
     * @param $config
     */
    protected function initComponents($config)
    {
        unset($config);
    }

    /**
     * 创建日志文件
     *
     * @param $path
     * @return bool
     */
    private function createLogPath($catalogue)
    {
        $logPath = Yii::getAlias('@runtime') . DIRECTORY_SEPARATOR . 'wechat-' . $catalogue . DIRECTORY_SEPARATOR . date('Y-m') . DIRECTORY_SEPARATOR;

        FileHelper::mkdirs($logPath);
        $logPath .= date('d') . '.log';
        return $logPath;
    }
}