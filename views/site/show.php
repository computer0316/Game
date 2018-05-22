<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
	use app\models\Community;
	use app\models\District;
	use app\models\School;
	use app\models\Role;
	use app\models\Pets;
	use app\models\Arm;
	use app\models\Os;
	use app\models\Bind;
	use app\models\Category;
	use app\models\Defence;
	use app\models\Picture;

/* @var $this yii\web\View */
/* @var $model app\models\Equipment */
/* @var $form ActiveForm */
?>
<style>
		.brief-div{
			float:left;
			width:100%;
			padding:5px 0;
			border-bottom:1px dashed #ddd;
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
				color:deepskyblue;
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
				width:16%;
				color:#aaa;
			}
			.item{
				width:20%;
			}
		.title-div{
			border:1px solid deepskyblue;
			border-radius:5px;
			text-align:center;
			margin:15px 0px;
			padding:5px 0;
			float:left;
		}
		.top-div{
			text-align:center;
			font-weight:bold;
			font-size:16px;
			margin:15px 0;
		}
		.portrait{
		}
		.portrait img{
			float:left;
			width:20%;
			margin:3%;
		}
		.name-level{
			float:left;
			margin:10px;
			width:60%;
		}
		.name{
			font-size:14px;
			font-weight:bold;
		}
		.level{
			margin-left:10px;
			color:#999;
		}
		.price{
			float:left;
			color:red;
			margin:0 10px;
			font-weight:bold;
		}
</style>
		<div class="top-div">
			商品详情
		</div>
		<div class="brief-div" style="border-top:1px dashed #ddd;">
			<?php
				echo '<p class="p1">' . District::findOne($e->district)->big . '-' . District::findOne($e->district)->name . '</p>';
			?>
		</div>
		<div class="brief-div">
			<?php
					$name = '';
						echo '<div class="portrait">';
							if($e->role <> ''){
								echo '<img class="list-img" src="' . ($e->role <> '' ? Role::findOne($e->role)->img : 'sysimg/index/coin.jpg') . '" />';
								$name = Role::findOne($e->role)->name;
							}
							elseif($e->pets <> ''){
								echo '<img class="list-img" src="' . ($e->pets <> '' ? Pets::findOne($e->pets)->img : 'sysimg/index/coin.jpg') . '" />';
								$name = Pets::findOne($e->pets)->name;
							}
							elseif($e->arm <> ''){
								echo '<img class="list-img" src="' . ($e->arm <> '' ? Arm::findOne($e->arm)->img : 'sysimg/index/coin.jpg') . '" />';
								$name = Arm::findOne($e->arm)->name;
							}
							elseif($e->defence  <> ''){
								echo '<img class="list-img" src="' . ($e->defence <> '' ? Defence::findOne($e->defence)->img : 'sysimg/index/coin.jpg') . '" />';
								$name = Defence::findOne($e->defence)->name;
							}
							else{
								echo '<img class="list-img" src="sysimg/index/coin.png" />';
								$name = $e->coin;
							}
							echo '<p class="name-level"><span class="name">' . $name . '</span>';
							echo '<span class="level">' . $e->level . '级</span></p>';
							echo '<p class="price">￥' . $e->price . ' </p>';
						echo '</div>';
			?>
		</div>
		<div>
			<?php
				echo '<p style="float:left;font-size:12px;color:#999;margin:10px;">编号：' . $e->id . '&nbsp;&nbsp;';
				echo '操作系统：' . Os::findOne($e->os)->name  . '&nbsp;&nbsp;';
				echo '账号类型：' . Bind::findOne($e->bind)->name . '</p>';
			?>
		</div>
		<div class="item-div">
			<?php
			echo '<p class="label">门派</p><p class="item">' . School::findOne($e->school)->name . '</p>';
			echo '<p class="label">性别</p><p class="item">' . ($e->sex = 0 ? '女'  : '男') . '</p>';
			echo '<p class="label">是否议价</p><p class="item">' . ($e->discuss = 0 ? '否' : '是') . '</p>';
			echo '<p class="label">神兽数量</p><p class="item">' . $e->monster . '</p>';
			echo '<p class="label">发布时间</p><p>' . $e->updatetime . '</p>';

			?>
		</div>
		<div class="brief-div">
			<?php
			//echo '<p class="p1">（' . $e->id . '）';
			//echo '售价：' . $e->price . ' ';
			echo '<p class="p1">' . $e->note . '</p>';
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


