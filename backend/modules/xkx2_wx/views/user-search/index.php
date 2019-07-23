<?php

use common\helpers\Html;
use common\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '查询用户';
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
            [
                'attribute' => 'open_id',
                'headerOptions'=> ['width'=> '200'],
            ],

            [
                'attribute' => 'user_id',
                'filter' => false,
                'headerOptions'=> ['width'=> '100'],
            ],
            
            [
                'attribute' => 'nickname',
                'filter' => false,
                'headerOptions'=> ['width'=> '100'],
            ],
            [
                'attribute' => 'app_user_id',
                'filter' => false,
                'headerOptions'=> ['width'=> '100'],
            ],
            [
                'attribute' => 'phone',
                'filter' => false,
                'headerOptions'=> ['width'=> '70'],
            ],
            [
                'attribute' => 'channel_id',
                'filter' => false,
                'headerOptions'=> ['width'=> '100'],
            ],
            
            [
                'attribute' => 'is_guest',
                'value' => function ($model) {
                    return  Html::IsGuest($model['is_guest']); 
                },
                'filter' => false,
                'headerOptions'=> ['width'=> '100'],
                'format' => 'raw',
            ],
            [
                'attribute' => 'name',
                'filter' => false,
                'headerOptions'=> ['width'=> '200'],
            ],
            [
                'attribute' => 'register_time',
                'filter' => false,
                //'headerOptions'=> ['width'=> '200'],
            ],
            //'gender',
            //'birthday',
            //'email:email',
            //'cell',
            
            //'status',
            //'platform',
            //'platform_user_id',
            //'udid',
            //'partner_id',
            //'app_id',
            //'equipment_id',
            //'bind_time',
            //'update_time',
            //'last_login_time',
            //'register_ip',
            //'is_guest',
            //'avatar',
            
            //'share_uid',
            //'point',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{edit}',
                'buttons' => [
                'edit' => function($url, $model, $key){
                        return Html::edit(['edit', 'user_id' => $model->user_id]);
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
