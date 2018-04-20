<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';

?>
<link rel="stylesheet" href="css/responsiveslides.css">

<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/responsiveslides.min.js"></script>
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

</head>
<body>

<!-- Slideshow -->
<div class="callbacks_container">
	<ul class="rslides" id="slider">
		<li><a href="http://sc.chinaz.com/"><img src="images/11.jpg" alt=""></a></li>
		<li><a href="http://sc.chinaz.com/"><img src="images/44.jpg" alt=""></a></li>
		<li><a href="http://sc.chinaz.com/"><img src="images/11.jpg" alt=""></a></li>
	</ul>
</div>
<div class="container" style="height:5px;">&nbsp;</div>
<div class="box">
	<div class="school">
		<img src="images/fc.gif" />
		<p>方寸</p>
	</div>
	<div class="school">
		<img src="images/pt.gif" />
		<p>普陀</p>
	</div>
	<div class="school">
		<img src="images/dt.gif" />
		<p>化生</p>
	</div>
	<div class="school">
		<img src="images/yc.gif" />
		<p>地府</p>
	</div>
	<div class="school">
		<img src="images/lg.gif" />
		<p>物理</p>
	</div>
	<div class="school">
		<img src="images/st.gif" />
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
			<p>金币号</p></a>
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