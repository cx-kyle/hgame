<?php

use common\helpers\Html;
use common\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '游戏用户信息';
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

            'id',
            [
                'attribute' => 'user_id',
                'headerOptions'=> ['width'=> '120'],
            ],
            [
                'attribute' => 'game_id',
                'filter' => false,
                'headerOptions'=> ['width'=> '100'],
            ],
            [
                'attribute' => 'app_id',
                'filter' => false,
                'headerOptions'=> ['width'=> '100'],
            ],
            [
                'attribute' => 'group',
                'filter' => false,
                'headerOptions'=> ['width'=> '100'],
            ],
            [
                'attribute' => 'area',
                'filter' => false,
                'headerOptions'=> ['width'=> '100'],
            ],
            [
                'attribute' => 'nickname',
                'headerOptions'=> ['width'=> '150'],
            ],
            
            [
                'attribute' => 'level',
                'filter' => false,
                'headerOptions'=> ['width'=> '80'],
            ],
            [
                'attribute' => 'vip_level',
                'filter' => false,
                'headerOptions'=> ['width'=> '80'],
            ],
            [
                'attribute' => 'platform',
                'filter' => false,
                'headerOptions'=> ['width'=> '100'],
            ],
            
            [
                'attribute' => 'location',
                'filter' => false,
            ],
            
            //'created',
            //'area',
            //'group',
            //'role_id',
            //'nickname',
            //'level',
            //'vip_level',
            //'score',
            //'platform',
            //'timing',
            //'is_new',
            //'ad',
            //'ip',
            //'location',
            //'province',
            //'city',
            //'longitude',
            //'latitude',
            //'user_agent',
            //'is_valid',
            //'gamecoin',
            //'cash',
            //'share_uid',
            //'imei',
            //'idfa',
            //'register_time',
            //'sub_channel',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{edit}',
                'buttons' => [
                'edit' => function($url, $model, $key){
                        return Html::edit(['edit', 'id' => $model->id]);
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
