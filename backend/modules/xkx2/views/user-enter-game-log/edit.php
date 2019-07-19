<?php

use common\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\hgame\xkx2wxdb\UserEntergameLogs */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'User Entergame Logs';
$this->params['breadcrumbs'][] = ['label' => 'User Entergame Logs', 'url' => ['index']];
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
    <?= $form->field($model, 'game_id')->textInput() ?>
    <?= $form->field($model, 'app_id')->textInput() ?>
    <?= $form->field($model, 'open_id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'created')->textInput() ?>
    <?= $form->field($model, 'area')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'group')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'role_id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'level')->textInput() ?>
    <?= $form->field($model, 'vip_level')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'score')->textInput() ?>
    <?= $form->field($model, 'platform')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'timing')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'is_new')->textInput() ?>
    <?= $form->field($model, 'ad')->textInput() ?>
    <?= $form->field($model, 'ip')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'longitude')->textInput() ?>
    <?= $form->field($model, 'latitude')->textInput() ?>
    <?= $form->field($model, 'user_agent')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'is_valid')->textInput() ?>
    <?= $form->field($model, 'gamecoin')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'cash')->textInput() ?>
    <?= $form->field($model, 'share_uid')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'imei')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'idfa')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'register_time')->textInput() ?>
    <?= $form->field($model, 'sub_channel')->textInput(['maxlength' => true]) ?>
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
