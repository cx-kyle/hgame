<?php
namespace backend\components;

use Yii;
use yii\base\Component;

/**
 * 重写分页数据加载，解决数据占用内存大的问题
 */

class ArrayDataProvider extends \yii\data\ArrayDataProvider
{
    /*
     *  @inheritdoc
     */
    protected function prepareModels()
    {
        if (($models = $this->allModels) === null) {
            return [];
        }

        if (($sort = $this->getSort()) !== false) {
            $models = $this->sortModels($models, $sort);
        }

        if (($pagination = $this->getPagination()) !== false) {
            $pagination->totalCount = $this->getTotalCount();
        }

        return $models;
    }

    /*
     *       @inheritdoc
     */
    protected function prepareTotalCount()
    {
        return $this->getTotalCount();
    }
}