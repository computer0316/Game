<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\District;
use app\models\School;

/* @var $this yii\web\View */
/* @var $model app\models\Equipment */
/* @var $form ActiveForm */
?>
<div class="create">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'price') ?>
        <?= $form->field($model, 'os')->dropDownList(['1'=>'苹果专区','2'=>'安卓官服','3'=>'苹果安卓互通区'], ['style'=>'width:120px']) ?> 
        <?= $form->field($model, 'district')->dropDownList(District::find()->select(["concat(big, ' ', name) as district", 'id'])->indexBy('id')->column()) ?>
        <?= $form->field($model, 'type')->dropDownList(['1'=>'手机账号','2'=>'签合同账号','3'=>'无绑定账号','4'=>'有绑定账号'], ['style'=>'width:120px']) ?>
        <?= $form->field($model, 'school')->dropDownList(School::find()->select(['name', 'id'])->indexBy('id')->column()) ?>
        <?= $form->field($model, 'sex')->dropDownList(['1'=>'男','0'=>'女'], ['style'=>'width:120px']) ?>
        <?= $form->field($model, 'discuss')->dropDownList(['1'=>'能','0'=>'否'], ['style'=>'width:120px']) ?>
        <?= $form->field($model, 'level') ?>
        <?= $form->field($model, 'monster') ?>        
        <?= $form->field($model, 'note') ?>
        <?= $form->field($model, 'updatetime')->textInput(['value' => date("Y-m-d H:i:s", time())]) ?>
        <?= $form->field($upload, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])->label('上传图片') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- create -->
