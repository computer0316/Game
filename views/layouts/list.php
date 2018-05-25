<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;
use yii\helpers\VarDumper;

//AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/responsiveslides.min.js"></script>
	<script type="text/javascript" src="js/clipboard.min.js"></script>
	<link rel="stylesheet" href="css/site.css">
    <?= Html::csrfMetaTags() ?>
    <title>壹折手游交易平台</title>
	<meta http-equiv="refresh1" content="2">

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!--
<div class="header">
	<img src="sysimg/index/top.jpg" />
</div>
-->
<div class="container">
	<?= $content ?>

	<div id="footer-div" class="footer-div">
		<a href="?r=site/index">
		<div>
			<img id="abc" class="footerimg" src="images/shou.png" />
			<p>首页</p>
		</div>
		</a>
		<a href="?r=site/category">
		<div>
			<img class="footerimg" src="images/fen.png" />
			<p>分类</p>
		</div>
		</a>
		<div id="kefu-button">
			<img class="footerimg" src="images/ke.png" />
			<p>客服</p>
		</div>
		<div>
			<img class="footerimg" src="images/shuo.png" />
			<p>说明</p>
		</div>
	</div>
</div>
<style>
	#kefu-mask{
		display:none;
		position:absolute;
		left:0;top:0;
		opacity:0.5;
		z-index:10;
		background:black;
	}
	#kefu{
		display:none;
		margin:auto;
		position:absolute;
		width:65%;
		left:0;right:0;
		top:100px;
		background-color:white;
		z-index:100;
		text-align:center;
		border-radius:5px;
	}
	.kefu-title{
		width:100%;
		margin:0;
		padding:0;
	}
	.wx{
		width:100%;
		margin-top:0;
		margin-bottom:0;
	}
	.kefu-img{
		float:none;
		margin:10px;
		width:50%;
	}
	.wx-img{
		width:20px;
		margin:5px 15px;
		border-radius:10px;
	}
	.wx span{
		background:deepskyblue;
		border-radius:5px;
		color:white;
		margin-left:5px;
		padding:1px 3px;
	}
</style>
<div id="kefu-mask">&nbsp;</div>
<div id="kefu">
	<img class="kefu-title" src="images/kefutitle.png" />
	<img class="kefu-img" src="images/y677867.jpg" />
	<p class="wx"><img class="wx-img" src="images/wx.jpg" />微信：Y766707<span class="copy">复制</span></p>
	<p class="wx"><img class="wx-img" src="images/wx.jpg" />微信：Y677867<span class="copy">复制</span></p>
	<p class="wx"><img class="wx-img" src="images/wx.jpg" />微信：Y670767<span class="copy">复制</span></p>
	<p class="wx"><img class="wx-img" src="images/wx.jpg" />微信：Y766707<span class="copy">复制</span></p>
	<p class="wx"><img class="wx-img" src="images/wx.jpg" />微信：Y767076<span class="copy">复制</span></p>
	<p style="margin:10px;color:deepskyblue;">网站仅供看号选号 议价交易请加微信</p>
</div>

<script>
	$(document).ready(function(){
		$("#kefu-button").click(function(){
			$("#kefu-mask").css('width', 760).css('height', $(document).height()).css('display', 'block');
			$("#kefu").css("display","block");
		});
		$("#kefu-mask").click(function(){
			$("#kefu-mask").css('display', "none");
			$("#kefu").css("display","none");
		});
	});
</script>
<?php $this->endBody() ?>
</body>
</html>

<?php
	$this->endPage();
	if(Yii::$app->session->hasFlash('message')){
		echo "<script>alert('" . Yii::$app->session->getFlash('message') . "')</script>";
	}
?>
