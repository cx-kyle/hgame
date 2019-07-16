<?php

use common\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\hgame\xkx2wxdb\User */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
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
    <?= $form->field($model, 'userId')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'openId')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'serverIndex')->textInput() ?>
    <?= $form->field($model, 'serverId')->textInput() ?>
    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'level')->textInput() ?>
    <?= $form->field($model, 'avatar')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'sex')->textInput() ?>
    <?= $form->field($model, 'vip')->textInput() ?>
    <?= $form->field($model, 'medal')->textInput() ?>
    <?= $form->field($model, 'combat')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'colorId')->textInput() ?>
    <?= $form->field($model, 'logoId')->textInput() ?>
    <?= $form->field($model, 'beforeGuildName')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'weaponId')->textInput() ?>
    <?= $form->field($model, 'clothId')->textInput() ?>
    <?= $form->field($model, 'wingId')->textInput() ?>
    <?= $form->field($model, 'jobId')->textInput() ?>
    <?= $form->field($model, 'guildName')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'updateTime')->textInput() ?>
    <?= $form->field($model, 'prop1')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'friendRecharge')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'wearMedalLvl')->textInput() ?>
    <?= $form->field($model, 'dayRechargeMax')->textInput() ?>
    <?= $form->field($model, 'rechargeAll')->textInput() ?>
    <?= $form->field($model, 'createTime')->textInput() ?>
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
