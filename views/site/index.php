<?php

use yii\helpers\Url;
use app\models\District;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';

?>
<link rel="stylesheet" href="css/responsiveslides.css">

<script type="text/javascript">
$(function () {
	// Slideshow
	$("#slider").responsiveSlides({
		auto: true,
		pager: false,
		nav: true,
		speed: 500,
		timeout:4000,
		pager: true,
		pauseControls: true,
		namespace: "callbacks"
	});
});
</script>
<style>

		a{color:black;}
		.container{
			float:left;
			width:100%;
			background-color:#ffffff;
			margin:0 auto;
			margin-top:30px;
		}
		.four-box{
			width:25%;
			float:left;
			text-align:center;
		}
		.four-box img{
			width:60px;
			border-radius:30px;
		}
		.four-box p{
			margin-top:20px;
		}
		.list{
			float:left;
			width:100%;
			border-bottom:1px dashed #ccc;
		}
		.list .p1{
			float:left;
			width:75%;
			height:48px;
			overflow:hidden;
			line-height:48px;
		}
		.list .p2{
			float:right;
			margin-right:10px;
			color:deepskyblue;
			line-height:48px;
		}
</style>
<!-- Slideshow -->
<div class="callbacks_container">
	<ul class="rslides" id="slider">
		<li><a href="#"><img src="images/11.jpg" alt=""></a></li>
		<li><a href="#"><img src="images/22.jpg" alt=""></a></li>
		<li><a href="#"><img src="images/44.jpg" alt=""></a></li>
	</ul>
</div>
<div class="container">
	<a href="<?=Url::toRoute(['site/list', 'category' => '金币号'])?>">
		<div class="four-box">
			<img src="sysimg/index/coin.jpg" />
			<p>梦幻币</p>
		</div>
	</a>
	<a href="<?=Url::toRoute(['site/list'])?>">
		<div class="four-box">
			<img src="sysimg/index/role.jpg" />
			<p>角色</p>
		</div>
	</a>
	<a href="<?=Url::toRoute(['site/list', ])?>">
		<div class="four-box">
			<img src="sysimg/index/monster.png" />
			<p>召唤兽</p>
		</div>
	</a>
	<a href="<?=Url::toRoute(['site/list', 'category' => '装备专区'])?>">
		<div class="four-box">
			<img src="sysimg/index/arm.png" />
			<p>装备</p>
		</div>
	</a>
</div>
<div class="container">
	<a href="?r=site/article&id=1">
		<div class="four-box">
			<img src="sysimg/index/ffqi.png" />
			<p>分期购号</p>
		</div>
	</a>
	<a href="?r=site/article&id=1">
		<div class="four-box">
			<img src="sysimg/index/vsjx.png" />
			<p>中介交易</p>
		</div>
	</a>
	<a href="?r=site/article&id=1">
		<div class="four-box">
			<img src="sysimg/index/ubch.png" />
			<p>我的收藏</p>
		</div>
	</a>
	<a href="?r=site/article&id=1">
		<div class="four-box">
			<img src="sysimg/index/gerf.png" />
			<p>个人中心</p>
		</div>
	</a>
</div>
<div class="box">
	<p style="color:deepskyblue;float:left;margin:5px 10px;font-weight:bold;">最新上架</p><p><a style="float:right;color:#ccc;margin:5px;" href="?r=site/list">更多></a></p>
	<?php
		foreach($equi as $e){
			echo '<div class="list">';
			echo '<a href="?r=site/show&id=' . $e->id . '">';
			echo '<p class="p1">（' . $e->id . '） ' . $e->os . '：' . District::findOne($e->district)->name . ' ' . $e->note. '</p>';
			echo '</a>';
			echo '<p class="p2">￥ ' . $e->price . "</p>\n";
			echo '</div>';
		}
	?>
</div>
<div style="margin-bottom:80px;"> </div>