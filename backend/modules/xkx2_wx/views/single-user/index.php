<?php

use common\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\ButtonDropdown;

use common\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '玩家单服数据';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php 
$item =[];
foreach ($area as $k =>$v){
    $res = ['label' => $v, 'url' => Url::toRoute(['single-user/index', 'e' => $k])];
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
                <input class="form-control" id="query[openId]" name="query[openId]" type="text" placeholder="OpenID"/>
            </div>
            <div class="col-sm-2">
                <input class="form-control" id="query[nickName]" name="query[nickName]" type="text" placeholder="玩家昵称"/>
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
    'tableOptions' => ['class' => 'table table-hover'],
    'columns' => [
        [
            'class' => 'yii\grid\DataColumn',
            'visible' => false,
        ],

        ['label' => 'ID',
            'attribute' => 'id',
        ],
        ['label' => '玩家昵称',
            'attribute' => 'nickName',
            'format' => 'raw',
        ],
        ['label' => 'openID',
            'attribute' => 'openId',
            'headerOptions'=> ['width'=> '200'],
        ],
        ['label' => '当前元宝',
            'attribute' => 'mi',
            'headerOptions'=> ['width'=> '100'],
        ],
        ['label' => '充值总额',
            'attribute' => 'rechargeAll',
            'headerOptions'=> ['width'=> '100'],
        ],
        ['label' => 'vip等级',
            'attribute' => 'vip',
        ],
        
        ['label' => 'vip经验',
            'attribute' => 'vipScore',
        ],
        ['label' => '等级',
            'attribute' => 'lvl',
        ],
        ['label' => '战力',
            'attribute' => 'combat',
            'headerOptions'=> ['width'=> '100'],
        ],
        ['label' => '钻石',
            'attribute' => 'diamond',
        ],
        ['label' => '最后下线时间',
            'attribute' => 'offlineTime',
        ],
    
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => '操作',
            'template' => '{edit}',
            'buttons' => [
                'edit' => function ($url, $model, $key) {
                    return Html::edit(['edit', 'id' => $model['id']]);
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
