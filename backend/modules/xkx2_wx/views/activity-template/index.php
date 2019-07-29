<?php

use common\helpers\Html;
use common\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '活动模板';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3><?= Html::encode($this->title) ?></h3>
                    <div class="ibox-tools">
                        <?= Html::create(['edit']) ?>
                    </div>
                </div>
                <div class="ibox-content">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-hover'],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'visible' => false,
            ],

            'id',
            'title',
            'type',
            'isDefault',
            'week',
            // 'startTime',
            // 'endTime',
            'cycle',
            'releaseTime:datetime',
            // 'items:ntext',
            // 'exValues:ntext',
            // 'exValues2:ntext',
            // 'content:ntext',
            'isOpen',
            'sort',
            // 'exData:ntext',
            'isCirculation',
            // 'timingStartTime',
            // 'limitLvl:ntext',
            // 'scoreLimit',
            // 'exValues3:ntext',
            // 'differentType',
            // 'exValues4:ntext',
            // 'exValues5:ntext',
            // 'exValues6:ntext',
            // 'exValues7:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作', 
                'template' => '{edit} {delete} {allService}',
                'buttons' => [
                'edit' => function($url, $model, $key){
                        return Html::edit(['edit', 'id' => $model->id]);
                },
                'delete' => function($url, $model, $key){
                        return Html::delete(['delete', 'id' => $model->id]);
                },
                'allService' => function($url, $model, $key){
                    return Html::allservice(['allservice', 'id' => $model->id]);
            },
                ]
            ]
    ]
    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
