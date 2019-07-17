<?php

use common\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\hgame\xkx2_wx\MailTask */
/* @var $form yii\widgets\ActiveForm */

$this->title = '用户邮件管理';
$this->params['breadcrumbs'][] = ['label' => 'Mail Tasks', 'url' => ['index']];
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
    <?= $form->field($model, 'etype')->textInput() ?>
    <?= $form->field($model, 'sendTime')->widget('kartik\datetime\DateTimePicker',[
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
                ]); ?>
    <?= $form->field($model, 'expireAt')->widget('kartik\datetime\DateTimePicker',[
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
                    ]); ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'userId')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'extCondition')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'excelItems')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'items')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model, 'mailCount')->textInput() ?>
    <?= $form->field($model, 'createdtime')->textInput() ?>
    <?= $form->field($model, 'sender')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'type')->textInput() ?>
    <?= $form->field($model, 'serverId')->textarea(['rows' => 6]) ?>
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
