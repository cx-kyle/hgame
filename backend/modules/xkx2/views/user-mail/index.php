<?php

use common\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\ButtonDropdown;

use common\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户邮件管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php 
$item =[];
foreach ($area as $k =>$v){
    $res = ['label' => $v, 'url' => Url::toRoute(['user-mail/index', 'e' => $k])];
    array_push($item,$res);
}

?>
<?= ButtonDropdown::widget([
  'label' => $area[$serverID],
  'options' =>['style' => 'width:100px;'],
  'dropdown' => [
      'items' => $item,

  ],
  
]);
?>


<form action="index" method="get">
    <div class="form-group">
            <div class="col-sm-2">
                <input class="form-control" id="query[userId]" name="query[userId]" type="text" placeholder="用户ID"/>
            </div>
            <div class="col-sm-2">
                <input class="form-control" id="query[title]" name="query[title]" type="text" placeholder="标题"/>
            </div>
    </div>
    <div class="form-group">
        <input  type="submit" class="btn btn-primary btn-sm" value="搜索">
    </div>
</form>



 


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

        ['label' => 'ID',
            'attribute' => 'id',
        ],
        ['label' => '用户ID',
            'attribute' => 'userId',
            'format' => 'raw',
        ],
        ['label' => '类型',
            'attribute' => 'type',
        ],
        ['label' => '发送者',
            'attribute' => 'sender',
        ],
        ['label' => '标题',
            'attribute' => 'title',
        ],
        ['label' => '内容',
            'attribute' => 'content',
        ],
        ['label' => '状态',
            'attribute' => 'status',
            'value' => function ($model) {
                return Html::UserMailStatus($model['status']);
            },
            'filter' => false,
            'format' => 'raw',
        ],

        ['label' => '过期时间',
            'attribute' => 'expireAt',
        ],
        ['label' => '兑换时间',
            'attribute' => 'redeemedAt',
        ],
        ['label' => '删除时间',
            'attribute' => 'deletedAt',
        ],
        ['label' => '优先级',
            'attribute' => 'priority',
        ],

        [
            'class' => 'yii\grid\ActionColumn',
            'header' => '操作',
            'template' => '{edit} {status} {delete}',
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
