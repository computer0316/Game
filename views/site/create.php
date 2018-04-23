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
<style>
	/*************  form   *************/
		.l10 input{width:10px;}
		.l12 input{width:20px;}
		.l30 input{width:30px;}
		.l40 input{width:40px;}
		.l50 input{width:50px;}
		.l80 input{width:80px;}
		.l100 input{width:100px;}
		.l120 input{width:120px;}
		.l150 input{width:150px;}
		.l180 input{width:180px;}
		.l240 input{width:240px;}
		.l300 input{width:300px;}
		.l360 input{width:360px;}

		.form-group{
			float:left;
			clear:both;
			height:65px;
		}
		.form-group label{
			float:left;
			width:150px;
			text-align:right;
			font-size:14px;
			margin-right:20px;
			line-height:35px;
		}
		.form-group .help-block{
			margin-left:110px;
			font-size:12px;
			color:red;
		}
		.button-group{
			padding-left:150px;
		}

		select,input{
			border:1px solid #D3D2D1;
			height:35px;
			padding-left:5px;
		}

		.in-line{
			float:left;
		}
		.in-line label{
			font-size:14px;
			margin-left:15px;
			line-height:35px;
		}
		.in-line .help-block{
			margin-left:10px;
			font-size:12px;
			color:red;
		}
		input[type="file"]{
			border:none;
		}
</style>
<div class="create">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'price') ?>
        <?= $form->field($model, 'category')->dropDownList(['成品号' => '成品号', '金币号' => '金币号', '装备专区' => '装备专区', '宠物专区' => '宠物专区'], ['style'=>'width:120px']) ?>
        <?= $form->field($model, 'os')->dropDownList(['苹果专区' => '苹果专区', '安卓官服' => '安卓官服', '苹果安卓互通区' => '苹果安卓互通区'], ['style'=>'width:120px']) ?> 
        <?= $form->field($model, 'district')->dropDownList(District::find()->select(["concat(big, ' ', name) as district", 'id'])->indexBy('id')->column()) ?>
        <?= $form->field($model, 'bind')->dropDownList(['手机账号' => '手机账号', '签合同账号' => '签合同账号', '找回包赔账号' => '找回包赔账号', '三无账号' => '三无账号'], ['style'=>'width:120px']) ?>
        <?= $form->field($model, 'school')->dropDownList(School::find()->select(['name', 'id'])->indexBy('id')->column()) ?>
        <?= $form->field($model, 'sex')->dropDownList(['1'=>'男','0'=>'女'], ['style'=>'width:120px']) ?>
        <?= $form->field($model, 'discuss')->dropDownList(['1'=>'能','0'=>'否'], ['style'=>'width:120px']) ?>
        <?= $form->field($model, 'level') ?>
        <?= $form->field($model, 'monster') ?>        
        <?= $form->field($model, 'note') ?>
        <?= $form->field($model, 'updatetime')->textInput(['value' => date("Y-m-d H:i:s", time())]) ?>
        <?= $form->field($upload, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])->label('上传图片') ?>
    
        <div class="button-group">
            <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- create -->
