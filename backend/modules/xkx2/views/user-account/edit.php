<?php

use common\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\hgame\xkx2wxdb\Account */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Account';
$this->params['breadcrumbs'][] = ['label' => 'Accounts', 'url' => ['index']];
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
    <?= $form->field($model, 'openId')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'channelId')->textInput() ?>
    <?= $form->field($model, 'loginCount')->textInput() ?>
    <?= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model, 'freeze')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'bendExpireAt')->textInput() ?>
    <?= $form->field($model, 'bendType')->textInput() ?>
    <?= $form->field($model, 'lastLoginServerId')->textInput() ?>
    <?= $form->field($model, 'lastLoginTime')->textInput() ?>
    <?= $form->field($model, 'createIP')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'createTime')->textInput() ?>
    <?= $form->field($model, 'InviterOpenId')->textInput(['maxlength' => true]) ?>
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
