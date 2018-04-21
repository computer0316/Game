<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\District;
use app\models\School;
use app\models\Picture;

/* @var $this yii\web\View */
/* @var $model app\models\Equipment */
/* @var $form ActiveForm */
?>
<style>
		.brief-div{
			float:left;
			width:100%;
			height:30px;
		}
			.brief-div .p1{
				float:left;
				padding-left:10px;				
				margin:0;
			}
			.brief-div .p2{
				float:left;
				margin:0;
				padding-left:15px;
				color:orangered;
				}
			.brief-div .p3{
				float:right;
				margin:0;
				color:#aaa;
				padding-right:15px;
			}
		.item-div{
			float:left;
			border-top:10px solid #f7f7f7;
		}
		.item-div p{
			float:left;
			padding-left:10px;
			margin:3px 0;
		}
			.label{
				width:14%;
				color:#aaa;
			}
			.item{
				width:30%;
			}
		.title-div{
			border:1px solid orangered;
			border-radius:5px;
			text-align:center;
			margin:15px 0px;
			padding:5px 0;
			float:left;
		}
</style>

		<div class="brief-div">
			<?php
			echo '<p class="p1">（' . $e->id . '）';
			echo '售价：' . $e->price . ' ';
			echo $e->note . '</p>';
			?>
		</div>
		<div class="brief-div">
			<?php
			echo '<p class="p2">售价：' . $e->price . ' </p>';
			echo '<p class="p3">' . $e->updatetime . '</p>';
			?>
		</div>
		<div class="item-div">
			<?php
			echo '<p class="label">操作系统</p><p class="item">' . $e->os . '</p>';
			echo '<p class="label">商品编号</p><p class="item">' . $e->id . '</p>';
			echo '<p class="label">所在大区</p><p class="item">' . District::findOne($e->district)->big . '</p>';
			echo '<p class="label">服务器</p><p class="item">' . District::findOne($e->district)->name . '</p>';
			echo '<p class="label">等级</p><p class="item">' . $e->level . '</p>';
			echo '<p class="label">账号类型</p><p class="item">' . $e->bind . '</p>';
			echo '<p class="label">门派</p><p class="item">' . School::findOne($e->school)->name . '</p>';
			echo '<p class="label">性别</p><p class="item">' . ($e->sex = 0 ? '女'  : '男') . '</p>';
			echo '<p class="label">能否议价</p><p class="item">' . ($e->discuss = 0 ? '不可议价' : '可以议价') . '</p>';
			echo '<p class="label">神兽数量</p><p class="item">' . $e->monster . '</p>';
			?>
		</div>
	<div class="title-div" style="width:99%;">
		详情介绍
	</div>
	<div class="img-div">
		<?php
			$pics = Picture::find()->where(['equipmentid' => $e->id])->all();
			if($pics){
				foreach($pics as $pic){
					echo '<img src="' . $pic->path . '" />';
				}
			}
		?>
	</div>

