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

	<link rel="stylesheet" href="css/site.css">
    <?= Html::csrfMetaTags() ?>
    <title>壹折手游交易平台</title>
	<meta http-equiv="refresh1" content="3">

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!--
<div class="header">
	壹折手游交易平台
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
		<div>
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
		margin:auto;
		position:absolute;
		width:65%;
		left:0;right:0;
		top:100px;
		background:#ddd;
		z-index:100;
		text-align:center;
	}
	#kefu-title{
		width:100%;
		height:60px;
		font-size:32px;
		line-height:60px;
		color:white;
		background:red;
		text-align:center;
	}
	#kefu p{
		width:100%;
	}
	.kefu-img{
		float:none;
		margin:20px;
		width:50%;
	}
</style>
<div id="kefu-mask">&nbsp;</div>
<div id="kefu">
	<p id="kefu-title">人工客服</p>
	<img class="kefu-img" src="images/kf1.png" />
	<p>微信：abcd</p>
</div>
<?php $this->endBody() ?>
</body>
</html>
<script>
	$(document).ready(function(){
		$("#kefu-mask").css('width', 760).css('height', $(document).height()).css('display', 'block');
	});
</script>
<?php
	$this->endPage();
	if(Yii::$app->session->hasFlash('message')){
		echo "<script>alert('" . Yii::$app->session->getFlash('message') . "')</script>";
	}
?>
