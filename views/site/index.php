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
			margin:3px auto;

		}


		.box{
			width:96%;
			border:1px solid orangered;
			border-radius:5px;
			margin:3px auto;
			padding:5px 0;
			overflow:hidden;
		}
		.school{
			float:left;
			text-align:center;
			width:16.5%;
		}
		.four-box{
			width:20.8%;
			border:1px solid orangered;
			border-radius:5px;
			margin:5px 1.8%;
			float:left;
			text-align:center;
		}
		.four-box p{
			margin:5px auto;
			color:black;
		}
		.three-box{
			width:28%;
			text-align:center;
			border:2px solid orangered;
			border-radius:5px;
			float:left;
			margin:5px 2% 5px 2.2%;
		}
		.three-box img{
			width:100%;
			height:150px;
		}
		.two-box{
			border:1px solid orangered;
			border-radius:5px;
			width:44.5%;
			margin:2.5%;
			float:left;
			text-align:center;
			padding:5px 0;
		}
		.two-box a{
			color:black;
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
			color:orangered;
			line-height:48px;
		}
</style>
<!-- Slideshow -->
<div class="callbacks_container">
	<ul class="rslides" id="slider">
		<li><a href="#"><img src="images/11.jpg" alt=""></a></li>
		<li><a href="#"><img src="images/44.jpg" alt=""></a></li>
		<li><a href="#"><img src="images/11.jpg" alt=""></a></li>
	</ul>
</div>
<div class="container" style="height:5px;">&nbsp;</div>
<div class="box">
	<div class="school">
		<a href="<?=Url::toRoute(['site/list', 'school' => '方寸山'])?>"><img src="images/fc.gif" /></a>
		<p>方寸</p>
	</div>
	<div class="school">
		<a href="<?=Url::toRoute(['site/list', 'school' => '普陀山'])?>"><img src="images/pt.gif" /></a>
		<p>普陀</p>
	</div>
	<div class="school">
		<a href="<?=Url::toRoute(['site/list', 'school' => '化生寺'])?>"><img src="images/dt.gif" /></a>
		<p>化生</p>
	</div>
	<div class="school">
		<a href="<?=Url::toRoute(['site/list', 'school' => '阴曹地府'])?>"><img src="images/yc.gif" /></a>
		<p>地府</p>
	</div>
	<div class="school">
		<a href="<?=Url::toRoute(['site/list', 'school' => '物理'])?>"><img src="images/lg.gif" /></a>
		<p>物理</p>
	</div>
	<div class="school">
		<a href="<?=Url::toRoute(['site/list', 'school' => '法系'])?>"><img src="images/st.gif" /></a>
		<p>法系</p>
	</div>
</div>
<div class="container">
	<a href="<?=Url::toRoute(['site/list', 'category' => '成品号'])?>">
		<div class="four-box">
			<p>成品号</p>
		</div>
	</a>
	<a href="<?=Url::toRoute(['site/list', 'category' => '金币号'])?>">
		<div class="four-box">
			<p>金币号</p>
		</div>
	</a>
	<a href="<?=Url::toRoute(['site/list', 'category' => '装备专区'])?>">
		<div class="four-box">
			<p>装备专区</p>
		</div>
	</a>
	<a href="<?=Url::toRoute(['site/list', 'category' => '宠物专区'])?>">
		<div class="four-box">
			<p>宠物专区</p>
		</div>
	</a>
</div>
<div class="container">
	<div class="three-box">
		<a href="<?=Url::toRoute(['site/list', 'level' => -3])?>"><img src="images/a1.gif" /></a>
		<p>精锐专区</p>
	</div>
	<div class="three-box">
		<a href="<?=Url::toRoute(['site/list', 'level' => -2])?>"><img src="images/a2.gif" /></a>
		<p>勇武专区</p>
	</div>
	<div class="three-box">
		<a href="<?=Url::toRoute(['site/list', 'level' => -1])?>"><img src="images/a3.gif" /></a>
		<p>神威专区</p>
	</div>
</div>
<div class="container">
	<div class="two-box">
		<a href="?r=site/article&id=1">
			我要卖号
		</a>
	</div>
	<div class="two-box">
		<a href="?r=site/article&id=1">
			其他内容
		</a>
	</div>
	<div class="two-box">
		<a href="?r=site/article&id=1">
			其他说明
		</a>
	</div>
	<div class="two-box">
		<a href="?r=site/article&id=1">
			其他说明
		</a>
	</div>
</div>
<div class="box">

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