<?php

/* @var $this yii\web\View */

	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use yii\helpers\Url;
	use yii\widgets\LinkPager;
	use app\models\User;
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

$this->title = '列表';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="coitainer">
	<div id="search">
		<?php $form = ActiveForm::begin(['action' => Url::toRoute('site/search'), 'method' => 'post']); ?>
			<?= $form->field($search, 'text', ['options' => ['class' => 'search-form']])->textInput(['class' => 'search-input'])->label(false) ?>
			<input type="image" id="searchimg" src="images/search.png" />
		<?php ActiveForm::end(); ?>
	</div>
</div>
<div class="container">
	<div id="left">
		<ul id="list">
			<li>推荐</li>
			<li>角色</li>
			<li>召唤兽</li>
			<li>武器</li>
			<li>防具</li>
		</ul>
	</div>
	<div id="right">
		<div class="block">
			<img src="sysimg/role/gxx.gif" />
			<p>普陀山</p>
		</div>
		<div class="block">
			<img src="sysimg/role/gxx.gif" />
			<p>普陀山</p>
		</div>
		<div class="block">
			<img src="sysimg/role/gxx.gif" />
			<p>普陀山</p>
		</div>
		<div class="block">
			<img src="sysimg/role/gxx.gif" />
			<p>普陀山</p>
		</div>
		<div class="block">
			<img src="sysimg/role/gxx.gif" />
			<p>普陀山</p>
		</div>
		<div class="block">
			<img src="sysimg/role/gxx.gif" />
			<p>普陀山</p>
		</div>
		<div class="block">
			<img src="sysimg/role/gxx.gif" />
			<p>普陀山</p>
		</div>
		<div class="block">
			<img src="sysimg/role/gxx.gif" />
			<p>普陀山</p>
		</div>
		<div class="block">
			<img src="sysimg/role/gxx.gif" />
			<p>普陀山</p>
		</div>
		<div class="block">
			<img src="sysimg/role/gxx.gif" />
			<p>普陀山</p>
		</div>
		<div class="block">
			<img src="sysimg/role/gxx.gif" />
			<p>普陀山</p>
		</div>
		<div class="block">
			<img src="sysimg/role/gxx.gif" />
			<p>普陀山</p>
		</div>
	</div>
</div>
<style>
	#left{
		height:500px;
		width:20%;
		float:left;
		border-top:1px solid blue;
	}
	#list{margin:0;padding:0;}
	#list li{
		width:100%;
		height:64px;
		font-size:24px;
		color:#666;
		text-align:center;
		line-height:64px;
	}
	#right{
		float:left;
		width:79%;
		height:500px;
		border-top:1px solid blue;
		border-left:1px solid blue;
	}
	.block{
		float:left;
		margin-left:3%;
		margin-top:20px;
		width:30%;
		text-align:center;
	}
	.block img{
		width:90%;
	}
</style>