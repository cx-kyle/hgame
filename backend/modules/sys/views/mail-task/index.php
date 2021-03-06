<?php

use common\helpers\Html;
use common\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mail Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?= Html::encode($this->title) ?></h5>
                    <div class="ibox-tools">
                        <?= Html::create(['edit']) ?>
                    </div>
                </div>
                <div class="ibox-content">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table table-hover'],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'visible' => false,
            ],

            'id',
            [
                'attribute' => 'type',
                'value' => function ($model) {
                    return  Html::etype($model['type']); 
                },
                'filter' => false,
                'format' => 'raw',
            ],
            
            'sendTime',
            'expireAt',
            'title',
            //'content:ntext',
            //'userId:ntext',
            //'extCondition:ntext',
            //'excelItems:ntext',
            //'items:ntext',
            //'mailCount',
            //'createdtime',
            //'sender',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return  Html::status($model['status']); 
                },
                'filter' => false,
                'format' => 'raw',
            ],
            //'serverId:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{edit} {status} {delete}',
                'buttons' => [
                'edit' => function($url, $model, $key){
                        return Html::edit(['edit', 'id' => $model->id]);
                },
            //    'status' => function($url, $model, $key){
            //             return Html::status($model['status']);
            //       },
                'delete' => function($url, $model, $key){
                        return Html::delete(['delete', 'id' => $model->id]);
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
