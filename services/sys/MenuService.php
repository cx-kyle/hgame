<?php
namespace services\sys;

use Yii;
use common\helpers\ArrayHelper;
use common\components\Service;
use common\models\sys\Menu;
use common\enums\StatusEnum;

/**
 * Class MenuService
 * @package services\sys
 *   
 */
class MenuService extends Service
{
    /**
     * 获取下拉
     *
     * @param string $id
     * @return array
     */
    public function getDropDownList($id = '')
    {
        $list = Menu::find()
            ->where(['>=', 'status', StatusEnum::DISABLED])
            ->andFilterWhere(['<>', 'id', $id])
            ->select(['id', 'title', 'pid', 'level'])
            ->orderBy('cate_id asc, sort asc')
            ->asArray()
            ->all();

        $models = ArrayHelper::itemsMerge($list);
        $data = ArrayHelper::map(ArrayHelper::itemsMergeDropDown($models), 'id', 'title');
        return ArrayHelper::merge([0 => '顶级菜单'], $data);
    }

    /**
     * @return array
     */
    public function getList()
    {
        $data = Menu::find()->where(['status' => StatusEnum::ENABLED]);
        // 关闭开发模式
        if (empty(Yii::$app->debris->config('sys_dev'))) {
            $data = $data->andWhere(['dev' => StatusEnum::DISABLED]);
        }

        $models = $data->orderBy('cate_id asc, sort asc')
            ->with(['cate'])
            ->asArray()
            ->all();

        // 获取权限信息
        $auth = false;
        if (!Yii::$app->services->auth->isSuperAdmin()) {
            $role = Yii::$app->services->authRole->getRole();
            $auth = Yii::$app->services->authRole->getAuthByRole($role);
        }

        foreach ($models as $key => &$model) {
            if (!empty($model['url'])) {
                $params = unserialize($model['params']);
                empty($params) && $params = [];
                $model['fullUrl'][] = $model['url'];

                foreach ($params as $param) {
                    if (!empty($param['key'])) {
                        $model['fullUrl'][$param['key']] = $param['value'];
                    }
                }
            } else {
                $model['fullUrl'] = '#';
            }

            // 移除无权限菜单
            if (!Yii::$app->services->auth->isSuperAdmin() && false !== $auth && !in_array($model['url'], $auth)) {
                unset($models[$key]);
            }
        }
        return ArrayHelper::itemsMerge($models);
    }
}