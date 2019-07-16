<?php
namespace common\components;

use Yii;
use yii\web\UnprocessableEntityHttpException;
use common\enums\CacheKeyEnum;

/**
 * Class Debris
 * @package common\components
 *   
 */
class Debris
{
    /**
     * 返回配置名称
     *
     * @param string $name 字段名称
     * @param bool $noCache true 不从缓存读取 false 从缓存读取
     * @return bool|string
     */
    public function config($name, $noCache = false)
    {
        // 获取缓存信息
        $info = $this->getConfigInfo($noCache);
        return isset($info[$name]) ? trim($info[$name]) : null;
    }

    /**
     * 返回配置名称
     *
     * @param bool $noCache true 不从缓存读取 false 从缓存读取
     * @return array|bool|mixed
     */
    public function configAll($noCache = false)
    {
        $info = $this->getConfigInfo($noCache);
        return $info ? $info : [];
    }

    /**
     * 获取全部配置信息
     *
     * @param bool $noCache true 不从缓存读取 false 从缓存读取
     * @return array|mixed
     */
    protected function getConfigInfo($noCache)
    {
        // 获取缓存信息
        $cacheKey = CacheKeyEnum::SYS_CONFIG . ':' . Yii::$app->services->merchant->getId();
        if (!($info = Yii::$app->cache->get($cacheKey)) || $noCache == true) {
            $config = Yii::$app->services->config->getListWithValue();
            $info = [];
            foreach ($config as $row) {
                $info[$row['name']] = $row['value']['data'] ?? $row['default_value'];
            }

            // 设置缓存
            Yii::$app->cache->set($cacheKey, $info, 60 * 60);
        }

        return $info;
    }

    /**
     * 打印
     *
     * @param $array
     */
    public function p($array)
    {
        echo "<pre>";
        print_r($array);
    }


    /**
     * 解析错误
     *
     * @param $fistErrors
     * @return string
     */
    public function analyErr($firstErrors)
    {
        if (!is_array($firstErrors) || empty($firstErrors)) {
            return false;
        }

        $errors = array_values($firstErrors)[0];
        return $errors ?? '未捕获到错误信息';
    }
}