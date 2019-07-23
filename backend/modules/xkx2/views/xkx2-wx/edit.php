<?php

use common\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2; 

/* @var $this yii\web\View */
/* @var $model common\models\hgame\xkx2_wx\MailTask */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Mail Task';
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
                    <?php $data = [0 => '全部', -1 => '后台人工']; 
                            echo $form->field($model, 'type')->widget(Select2::classname(), [  
                                'data' => $data, 
                                'options' => ['placeholder' => '请选择'], 
                    ]); 
                    ?>

                    <?php $data = [0 => '个人邮件', 1 => '全服邮件',2=>'excel批量邮件']; 
                                                echo $form->field($model, 'etype')->widget(Select2::classname(), [  
                                                    'data' => $data, 
                                                    'options' => ['placeholder' => '请选择'], 
                                        ]); 
                    ?>

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
                    
                    <div class="box-body">
                <div class="form-group">
                <div class="col-sm-2 text-right"><label class="control-label" for="mailtask-content">EXCEL用户导入</label></div>
                    <div class="input-group m-b">
                        <input id="excel-file" type="file" name="excelFile" style="display:none">   
                        <input type="text" class="form-control" id="fileName" name="fileName" readonly>
                        <span class="input-group-btn">
                                <a class="btn btn-white" onclick="$('#excel-file').click();">选择文件</a>
                            </span>
                    </div>
                </div>
            </div>
                    
                    <?= $form->field($model, 'excelItems')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'userId')->textarea(['rows' => 2]) ?>
                    <?= $form->field($model, 'items')->textarea(['rows' => 3]) ?>
   
                    <?= $form->field($model, 'serverId')->textarea(['rows' => 3
                        ]) ?>

                    <?= $form->field($model, 'serverId')->checkboxList($item) ?>

                        
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

<script type="text/javascript">
    $('input[id=excel-file]').change(function() {
        $('#fileName').val($(this).val());
    });
</script>
