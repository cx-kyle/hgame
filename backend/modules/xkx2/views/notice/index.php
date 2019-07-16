<?php

use common\helpers\Html;
use common\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '侠客行ol微信';
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
        'tableOptions' => ['class' => 'table table-hover'],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'visible' => false,
            ],

            'id',
            [
                'attribute' => 'info',
                'headerOptions'=> ['width'=> '200'],
             ],
             [
                'attribute' => 'market',
                'headerOptions'=> ['width'=> '50'],
             ],
            [
                'attribute' => 'serverIds',
                'headerOptions'=> ['width'=> '100'],
                'contentOptions' => ['style' => 'display:block;height:100px;overflow:auto'],
             ],
             [
                'attribute' => 'status',
                'value' => function ($model) {
                    return  Html::noticetype($model['status']); 
                },
                'filter' => false,
                'headerOptions'=> ['width'=> '100'],
                'format' => 'raw',
            ],
             
            [
                'attribute' => 'result',
                'headerOptions'=> ['width'=> '100'],
                'contentOptions' => ['style' => 'display:block;height:100px;overflow:auto'],
             ],
             [
                'attribute' => 'createTime',
                'headerOptions'=> ['width'=> '180'],
             ],
             

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{edit} {status} {delete}',
                'buttons' => [
                'edit' => function($url, $model, $key){
                        return Html::edit(['edit', 'id' => $model->id]);
                },
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
