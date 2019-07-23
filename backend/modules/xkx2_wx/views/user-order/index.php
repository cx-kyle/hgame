<?php

use common\helpers\Html;
use common\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '查询订单';
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
            [
                'attribute' => 'app_id',
                'headerOptions'=> ['width'=> '80px'],
                'contentOptions' => ['width'=>'80px'],
            ],
            [
                'attribute' => 'open_id',
                'headerOptions'=> ['width'=> '80px'],
                'contentOptions' => ['display:block;width:80px;overflow:auto'],
            ],

            [
                'attribute' => 'orderno',
                'filter' => false,
                'headerOptions'=> ['width'=> '100'],
                'contentOptions' => ['style' => 'display:block;width:120px;overflow:auto'],
            ],
            [
                'attribute' => 'total_fee',
                'filter' => false,
            ],
            [
                'attribute' => 'billorderno',
                'filter' => false,
                'headerOptions'=> ['width'=> '100'],
                'contentOptions' => ['style' => 'display:block;width:120px;overflow:auto'],
            ],
            //'subject',
            //'description',
            //'quantity',
            
            [
                'attribute' => 'recharge_fee',
                'filter' => false,
            ],
            //'need_recharge_fee',
            //'points',
            //'ip',
            //'product_id',
            [
                'attribute' => 'payname',
                'headerOptions'=> ['width'=> '100'],
                'filter' => false,
            ],
            //'current_balance',
            //'notify_count',
            //'notify_time',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return  Html::OrderStatus($model['status']); 
                },
                'filter' => Html::activeDropDownList($searchModel, 'status',
                    ['0' => '未支付', '1' => '充值金额', '2' => '支付成功道具未到账','3'=>'订单完成'], [
                        'prompt' => '全部',
                        'class' => 'form-control',
                    ]),
                'headerOptions'=> ['width'=> '90'],
                'format' => 'raw',
            ],
             
            [
                'attribute' => 'finishedtime',
                'filter' => false,
            ],
            [
                'label' =>'昵称',
                'value'=>'userInfo.nickname',
                'attribute' => 'user_id',
                'filter' => false,
            ],
            [
                'label' =>'平台',
                'value'=>'userInfo.platform',
                'attribute' => 'user_id',
                'filter' => false,
            ],
            //'verifytime',
            [
                'attribute' => 'createdtime',
                'filter' => false,
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{edit}',
                'buttons' => [
                'edit' => function($url, $model, $key){
                        return Html::edit(['view', 'id' => $model->id]);
                },
                // 'delete' => function($url, $model, $key){
                //         return Html::delete(['delete', 'id' => $model->id]);
                // },
                ]
            ]
    ]
    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
