<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\District;
use app\models\School;
use app\models\Role;
use app\models\Pets;
use app\models\Arm;
use app\models\Os;
use app\models\Bind;
use app\models\Defence;
use app\models\Category;

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

.create{
	margin:20px;
}
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
			width:100%;
			clear:both;
			padding-left:150px;
		}

		select,input{
			border:1px solid #D3D2D1;
			height:35px;
			padding-left:5px;
		}

		.in-line{
			float:left;
			height:65px;
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
        <?php
           	switch($add){
        		case 'coin':
        			 echo $form->field($model, 'coin');
        			break;
        		case 'role':
        			 echo $form->field($model, 'role')->dropDownlist(['空' => '选择角色'] + Role::find()->select(['name', 'id'])->indexBy('id')->column());
        			break;
        		case 'pets':
        			 echo $form->field($model, 'pets')->dropDownlist(['空' => '选择宠物'] + Pets::find()->select(['name', 'id'])->indexBy('id')->column());
        			break;
        		case 'arm':
        			 echo $form->field($model, 'arm')->dropDownlist(['空' => '选择武器'] + Arm::find()->select(['name', 'id'])->indexBy('id')->column());
        			break;
        		case 'defence':
        			 echo $form->field($model, 'defence')->dropDownlist(['空' => '选择防具'] + Defence::find()->select(['name', 'id'])->indexBy('id')->column());
        			break;
			}
        ?>
        <?= $form->field($model, 'category', ['options' => ['class' => 'in-line']])->dropDownList(['空' => '账号类型'] +  Category::find()->select(['name', 'id'])->indexBy('id')->column(),['disabled' => 'disabled']) ?>
        <?= $form->field($model, 'bind')->dropDownList(['空' => '绑定类型'] + Bind::find()->select(['name', 'id'])->indexBy('id')->column()) ?>
        <?= $form->field($model, 'os', ['options' => ['class' => 'in-line']])->dropDownList(['空' => '选择平台'] + Os::find()->select(['name', 'id'])->indexBy('id')->column()) ?>
        <?= $form->field($model, 'district', ['options' => ['class' => 'in-line']])->dropDownList(['空' => '服务器'] + District::find()->select(["concat(big, ' ', name) as district", 'id'])->indexBy('id')->column()) ?>
        <?php
        	if($add == 'role'){
        		echo $form->field($model, 'school', ['options' => ['class' => 'in-line']])->dropDownList(['0' => '门派'] + School::find()->select(['name', 'id'])->indexBy('id')->column());
        	}
        ?>


        <?= $form->field($model, 'sex')->dropDownList(['1'=>'男','0'=>'女'], ['style'=>'width:120px']) ?>
        <?= $form->field($model, 'discuss', ['options' => ['class' => 'in-line']])->dropDownList(['1'=>'可','0'=>'否'], ['style'=>'width:120px']) ?>
        <?= $form->field($model, 'level') ?>
        <?php
        	if($add == 'role'){
        		echo $form->field($model, 'monster', ['options' => ['class' => 'in-line']]);
        	}
        ?>
        <?= $form->field($model, 'note') ?>
        <?= $form->field($upload, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])->label('上传图片') ?>
        <div class="button-group">
            <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
        </div>
        <?= $form->field($model, 'updatetime')->hiddenInput(['value' => date("Y-m-d H:i:s", time())])->label(false) ?>
    <?php ActiveForm::end(); ?>

</div><!-- create -->
