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
<div class="container">
	<?php
		echo '<div class="brief-div">';
			echo '<p style="float:left;padding-left:10px;">（' . $e->id . '）';
			echo '售价：' . $e->price . ' ';
			echo $e->note . '</p>';
		echo '</div>';
		echo '<div class="brief-div">';
			echo '<p style="float:left;padding-left:10px;;color:red;">售价：' . $e->price . ' </p>';
			echo '<p style="float:right;padding-right:10px;color:chocolate;">' . $e->updatetime . '</p>';
		echo '</div>';

		echo '<div class="item-div">';
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
		echo '</div>';
	?>
	<div class="title-div" style="width:99%;">
		详情介绍
	</div>
</div>
