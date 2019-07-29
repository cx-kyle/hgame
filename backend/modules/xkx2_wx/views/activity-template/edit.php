<?php

use common\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\hgame\xkx2wxdb\ActivityTemplate */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Activity Template';
$this->params['breadcrumbs'][] = ['label' => 'Activity Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>基础信息</h5>
                </div>
                <div class="ibox-content">
                    <?php $form = ActiveForm::begin([
                        'options' => [
                            'enctype' => 'multipart/form-data'
                        ],
                        'fieldConfig' => [
                            'template' => "<div class='col-sm-2 text-right'>{label}</div><div class='col-sm-10'>{input}\n{hint}\n{error}</div>",
                        ],
                    ]); ?>
                    <div class="col-sm-12">
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'type')->dropDownList(['1'=>'首冲','2'=>'等级礼包','3'=>'全民福利'], ['prompt'=>'请选择','style'=>'width:200px']) ?>
    <?= $form->field($model, 'isDefault')->dropDownList(['0'=>'否','1'=>'是'], ['prompt'=>'请选择','style'=>'width:200px']) ?>
    <?= $form->field($model, 'week')->dropDownList(['0'=>'无','1'=>'周一','2'=>'周二','3'=>'周三','4'=>'周四','5'=>'周五','6'=>'周六','7'=>'周日'], ['prompt'=>'请选择','style'=>'width:200px']) ?>
    <?= $form->field($model, 'startTime')->widget('kartik\datetime\DateTimePicker',[
                    'language'  => 'zh-CN',
                    // 'layout'=>'{picker}{input}',
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd hh:ii:ss',
                        'todayHighlight' => true,// 今日高亮
                        'autoclose' => true,// 选择后自动关闭
                    ],
                    'options'=>[
                        'class' => 'form-control no_bor',
                    ]
                ]);?>
    <?= $form->field($model, 'endTime')->widget('kartik\datetime\DateTimePicker',[
                    'language'  => 'zh-CN',
                    // 'layout'=>'{picker}{input}',
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd hh:ii:ss',
                        'todayHighlight' => true,// 今日高亮
                        'autoclose' => true,// 选择后自动关闭
                    ],
                    'options'=>[
                        'class' => 'form-control no_bor',
                    ]
                ]);?>
    <?= $form->field($model, 'cycle')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'releaseTime')->textInput() ?>
    <?= $form->field($model, 'items')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'exValues')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'exValues2')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'isOpen')->textInput() ?>
    <?= $form->field($model, 'sort')->textInput() ?>
    <?= $form->field($model, 'exData')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'isCirculation')->textInput() ?>
    <?= $form->field($model, 'timingStartTime')->textInput() ?>
    <?= $form->field($model, 'limitLvl')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'scoreLimit')->textInput() ?>
    <?= $form->field($model, 'exValues3')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'differentType')->textInput() ?>
    <?= $form->field($model, 'exValues4')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'exValues5')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'exValues6')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'exValues7')->textarea(['rows' => 6]) ?>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 text-center">
                            <button class="btn btn-primary" type="submit">保存</button>
                            <span class="btn btn-white" onclick="history.go(-1)">返回</span>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
