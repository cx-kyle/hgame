<?php

use common\helpers\Html;
use common\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '玩家信息';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2><?= Html::encode($this->title) ?></h2>
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

            ['attribute' => 'userId',
            'headerOptions'=> ['width'=> '100'], 
            ],
            ['attribute' => 'openId',
            'headerOptions'=> ['width'=> '200'], 
            ],
            ['attribute' => 'nickname',
            'headerOptions'=> ['width'=> '200'], 
            ],
            ['attribute' => 'vip',
            'filter' => false,   
            ],
            ['attribute' => 'serverId',
            'filter' => false,   
            ],
            ['attribute' => 'updateTime',
            'filter' => false,   
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{edit} {delete}',
                'buttons' => [
                'edit' => function($url, $model, $key){
                        return Html::edit(['edit', 'userId' => $model->userId]);
                },
                'delete' => function($url, $model, $key){
                        return Html::delete(['delete', 'userId' => $model->userId]);
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
