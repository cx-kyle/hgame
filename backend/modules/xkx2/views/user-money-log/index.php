<?php

use common\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\ButtonDropdown;

use common\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '货币消耗';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php 
$item =[];
foreach ($area as $k =>$v){
    $res = ['label' => $v, 'url' => Url::toRoute(['user-money-log/index', 'e' => $k])];
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


<form action="index" method="get" >
    <div class="form-group">
            <div class="col-sm-2">
                <input class="form-control" id="query[UserId]" name="query[UserId]" type="text" placeholder="UserId"/>
            </div>
            <div class="col-sm-2">
                <input class="form-control" id="query[Reason]" name="query[Reason]" type="text" placeholder="货币流动一级原因"/>
            </div>

            <div class="col-sm-2">
                <?= Html::dropDownList('query[iMoneyType]','query[iMoneyType]', [''=>'全部货币类型','16' => '金币', '17' => '钻石', '22' => '元宝'], 
                ['class' => 'form-control']); ?>
             </div>

             
             <div class="col-sm-2">
                <?= Html::dropDownList('query[AddOrReduce]','query[AddOrReduce]', [''=>'增减类型','0' => '增加', '1' => '减少'],
                ['class' => 'form-control']); ?>
             </div>

            <!-- <div class="col-sm-2">
                <input class="form-control" id="query[Reason]" name="query[Reason]" type="text" placeholder="货币流动一级原因"/>
            </div> -->
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
    'tableOptions' => ['class' => 'table table-hover'],
    'columns' => [
        [
            'class' => 'yii\grid\DataColumn',
            'visible' => false,
        ],

        ['label' => 'UserId',
            'attribute' => 'UserId',
        ],
        ['label' => '货币类型',
            'attribute' => 'iMoneyType',
            'value' => function ($model) {
                return  Html::iMoneyType($model['iMoneyType']); 
            },
            'format' => 'raw',
            'headerOptions'=> ['width'=> '100'],
        ],
        ['label' => '动作涉及的金钱数',
            'attribute' => 'iMoney',
            'headerOptions'=> ['width'=> '100'],
        ],
        ['label' => '动作后的金钱数',
            'attribute' => 'AfterMoney',
            'headerOptions'=> ['width'=> '100'],
        ],
        ['label' => '货币流动一级原因',
            'attribute' => 'Reason',
        ],
        
        ['label' => '增减类型',
            'attribute' => 'AddOrReduce',
            'value' => function ($model) {
                return  Html::AddOrReduce($model['AddOrReduce']); 
            },
            'format' => 'raw',
        ],
        ['label' => '创建时间',
            'attribute' => 'dtEventTime',
        ],
        
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => '操作',
            'template' => '{edit}',
            'buttons' => [
                'edit' => function ($url, $model, $key) {
                    return Html::edit(['edit', 'id' => $model->id]);
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
