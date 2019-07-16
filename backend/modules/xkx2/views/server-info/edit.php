<?php

use common\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\hgame\xkx2wxdb\ServerInfo */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Server Info';
$this->params['breadcrumbs'][] = ['label' => 'Server Infos', 'url' => ['index']];
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
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'area')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'serverIndex')->textInput() ?>
    <?= $form->field($model, 'serverId')->textInput() ?>
    <?= $form->field($model, 'appId')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'crossGroup')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'crossCD')->textInput() ?>
    <?= $form->field($model, 'crossRank')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'crossChat')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'crossFlyUp')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'crossFlyUpDate')->textInput() ?>
    <?= $form->field($model, 'crossFlyUpAutoMatchId')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'crossFlyUpAutoMatchDate')->textInput() ?>
    <?= $form->field($model, 'crossChivalryDate')->textInput() ?>
    <?= $form->field($model, 'isCrossGroupModify')->textInput() ?>
    <?= $form->field($model, 'gates')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'redisAddr')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'gsHostIn')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'gsHostWww')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'gsPort')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'centerPort')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'isNew')->textInput() ?>
    <?= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model, 'openTime')->textInput() ?>
    <?= $form->field($model, 'isClose')->textInput() ?>
    <?= $form->field($model, 'closeExplain')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'ipFilter')->textInput() ?>
    <?= $form->field($model, 'prefix')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'version')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'clientVersion')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'isTrialVersion')->textInput() ?>
    <?= $form->field($model, 'dblink')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'dblinkLog')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'svridx')->textInput() ?>
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
