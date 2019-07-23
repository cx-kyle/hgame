<?php

use common\helpers\Html;
use common\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '账号管理';
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
            'openId',
            'channelId',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return  Html::userInfoStatus($model['status']); 
                },
                'filter' => Html::activeDropDownList($searchModel, 'status',
                    ['0' => '正常', '1' => '普通封号', '2' => '平台封号'], [
                        'prompt' => '全部',
                        'class' => 'form-control',
                    ]),
                'headerOptions'=> ['width'=> '100'],
                'format' => 'raw',
            ],
            
            [
                'attribute' => 'createTime',
                'filter' => false,
            ],
            [
                'attribute' => 'lastLoginTime',
                'filter' => false,
            ],
            [
                'attribute' => 'bendExpireAt',
                'filter' => false,
            ],
            [
                'attribute' => 'lastLoginServerId',
                'filter' => false,
            ],
            [
                'attribute' => 'loginCount',
                'filter' => false,
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
