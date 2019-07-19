<?php

use common\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '服务器信息';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3><?=Html::encode($this->title)?></h3>
                    <div class="ibox-tools">
                        <?=Html::create(['edit'])?>
                    </div>
                </div>
                <div class="ibox-content">

    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'tableOptions' => ['class' => 'table table-hover'],
    'columns' => [
        [
            'class' => 'yii\grid\DataColumn',
            'visible' => false,
        ],

        'id',
        [
            'attribute' => 'name',
            'filter' => false,
        ],
        [
            'attribute' => 'area',
            'filter' => false,
        ],
        [
            'attribute' => 'appId',
            'filter' => false,
        ],

        [
            'attribute' => 'status',
            'value' => function ($model) {
                return Html::ServerInfostatus($model['status']);
            },
            'filter' => Html::activeDropDownList($searchModel, 'status',
                ['1' => '良好', '2' => '正常', '3' => '爆满', '4' => '备服'], [
                    'prompt' => '全部',
                    'class' => 'form-control',
                ]),
            'format' => 'raw',
        ],
        [
            'attribute' => 'isNew',
            'value' => function ($model) {
                return Html::IsNew($model['isNew']);
            },
            'filter' => false,
            'format' => 'raw',
        ],
        [
            'attribute' => 'isClose',
            'value' => function ($model) {
                return Html::IsClose($model['isClose']);
            },
            'filter' => false,
            'format' => 'raw',
        ],
        [
            'attribute' => 'openTime',
            'value' => function ($model) {
                return $model['openTime'];
            },
            'filterType' => GridView::FILTER_DATE_RANGE,

            'filterWidgetOptions' => [
                'model'=>$searchModel,
                'attribute'=>'openTime',
                'presetDropdown'=>TRUE,
                'convertFormat'=>true,
                'pluginOptions' => [
                    'format'=>'Y-m-d',
                    'locale' => [
                        'cancelLabel' => 'Clear',
                        'format' => 'Y-m-d',
                    ]
                ],

            ],

        ],
        [
            'attribute' => 'crossGroup',
            'filter' => false,
        ],
        [
            'attribute' => 'crossRank',
            'filter' => false,
        ],
        [
            'attribute' => 'crossChat',
            'filter' => false,
        ],
        [
            'attribute' => 'crossFlyUp',
            'filter' => false,
        ],
        [
            'attribute' => 'crossFlyUpDate',
            'filter' => false,
        ],

        [
            'class' => 'yii\grid\ActionColumn',
            'header' => '操作',
            'template' => '{edit} {delete}',
            'buttons' => [
                'edit' => function ($url, $model, $key) {
                    return Html::edit(['edit', 'id' => $model->id]);
                },
                'delete' => function ($url, $model, $key) {
                    return Html::delete(['delete', 'id' => $model->id]);
                },
            ],
        ],
    ],
]);?>
                </div>
            </div>
        </div>
    </div>
</div>
