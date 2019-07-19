<?php

use common\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\hgame\xkx2wxdb\UserOrder */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'User Order';
$this->params['breadcrumbs'][] = ['label' => 'User Orders', 'url' => ['index']];
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
    <?= $form->field($model, 'user_id')->textInput() ?>
    <?= $form->field($model, 'app_id')->textInput() ?>
    <?= $form->field($model, 'game_id')->textInput() ?>
    <?= $form->field($model, 'open_id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'orderno')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'gameorderno')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'billorderno')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'quantity')->textInput() ?>
    <?= $form->field($model, 'total_fee')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'recharge_fee')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'need_recharge_fee')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'points')->textInput() ?>
    <?= $form->field($model, 'ip')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'product_id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'payname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'current_balance')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'notify_url')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'notify_count')->textInput() ?>
    <?= $form->field($model, 'notify_time')->textInput() ?>
    <?= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model, 'finishedtime')->textInput() ?>
    <?= $form->field($model, 'verifytime')->textInput() ?>
    <?= $form->field($model, 'createdtime')->textInput() ?>
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
