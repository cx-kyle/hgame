<?php

use common\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\hgame\xkx2wxdb\UserSearch */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'User Search';
$this->params['breadcrumbs'][] = ['label' => 'User Searches', 'url' => ['index']];
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
    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'app_user_id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'real_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'birthday')->textInput() ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'cell')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'platform')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'platform_user_id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'udid')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'partner_id')->textInput() ?>
    <?= $form->field($model, 'app_id')->textInput() ?>
    <?= $form->field($model, 'equipment_id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'register_time')->textInput() ?>
    <?= $form->field($model, 'bind_time')->textInput() ?>
    <?= $form->field($model, 'update_time')->textInput() ?>
    <?= $form->field($model, 'last_login_time')->textInput() ?>
    <?= $form->field($model, 'register_ip')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'is_guest')->textInput() ?>
    <?= $form->field($model, 'open_id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'avatar')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'channel_id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'share_uid')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'point')->textInput() ?>
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
