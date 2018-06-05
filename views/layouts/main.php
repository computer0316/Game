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
	<link rel="stylesheet" href="css/article.css">
    <?= Html::csrfMetaTags() ?>
    <title>壹折手游交易平台</title>
	<meta http-equiv="refresh1" content="3">

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="header">
	<?php
		if($this->context->action->id <> 'index' && $this->context->action->id <> 'category'){
			echo '<a style="float:left;margin-left:10px;" href="javascript:history.back()"><img style="position:fixed;z-index:100;top:10px;width:20px;height:20px;" src="images/back.png" /></a>';
			echo '<p style="color:#999;font-size:14px;">' . $this->title . '</p>';
		}
	?>

</div>
<div class="container">
	<?= $content ?>
	<div class="copy">
		<p>首页&nbsp;|&nbsp;我要买&nbsp;|&nbsp;我要卖&nbsp;|&nbsp;联系客服</p>
		<p>壹折手游交易平台</p>
		<p>&copy;www.yizhecbg.com</p>
		<p>唐山市壹折信息技术有限公司</p>
		<p>冀ICP备00000000号</p>
	</div>
	<div id="footer-div" class="footer-div">
		<a href="?r=site/index">
		<div>
			<img id="abc" class="footerimg" src="images/shou.png" />
			<p class="footer-p">首页</p>
		</div>
		</a>
		<a href="?r=site/category">
		<div>
			<img class="footerimg" src="images/fen.png" />
			<p class="footer-p">分类</p>
		</div>
		</a>
		<div id="kefu-button">
			<img class="footerimg" src="images/ke.png" />
			<p class="footer-p">客服</p>
		</div>
		<a href="?r=site/readme">
		<div>
			<img class="footerimg" src="images/shuo.png" />
			<p class="footer-p">说明</p>
		</div>
		</a>
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
		margin-top:0;
		margin-bottom:0;
	}
	.kefu-img{
		float:none;
		margin:10px;
		width:50%;
	}
	.wx{
		width:100%;
		line-height:30px;
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
		width:auto;
		float:none;
	}
	#message{
		display:none;
		position:absolute;
		top:400px;
		width:65%;
		padding:8Px 0;
		text-align:center;
		left:0;right:0;
		margin:auto;
		background:black;
		color:white;
		opaCity:0.5;
	}
</style>
<div id="kefu-mask">&nbsp;</div>
<p id="message"></p>
<div id="kefu">
	<img class="kefu-title" src="images/kefutitle.png" />
	<img class="kefu-img" src="images/wxh.jpg" />
	<p class="wx"><img class="wx-img" src="images/wx.jpg" />订单微信：ccbgz16<span data-clipboard-text="Y767076" class="copy">复制</span></p>
	<p class="wx"><img class="wx-img" src="images/wx.jpg" />寄售微信：Y670767<span data-clipboard-text="Y670767" class="copy">复制</span></p>
	<p class="wx"><img class="wx-img" src="images/wx.jpg" />售后微信：ccbgz18<span data-clipboard-text="ccbgz18" class="copy">复制</span></p>
	<p style="margin:10px;font-size:12px;color:deepskyblue;">网站仅供看号选号 议价交易请加微信</p>
</div>
<script>
	/* 复制客服ID到剪贴板 */
	var btns = document.querySelectorAll('.copy');
    var clipboard = new ClipboardJS(btns);
	clipboard.on('success', function(e) {
		$("#message").html("复制成功").show(300).delay(2000).hide(300).css('z-index', 3000);
	});
	clipboard.on('error', function(e) {
		$("#message").html("您的浏览器不支持，请手动复制。").show(300).delay(3000).hide(300).css('z-index', 3000);
	});
	$(document).ready(function(){
		/* 弹出客服蒙版，客服DIV */
		$("#kefu-button").click(function(){
			$("#kefu-mask").css('width', 760).css('height', $(document).height()).css('display', 'block');
			var top = ($(window).height() - $("#kefu").height())/2;
        	var left = ($(window).width() - $("#kefu").width())/2;
        	var scrollTop = $(document).scrollTop();
        	var scrollLeft = $(document).scrollLeft();
        	$("#kefu").css({position: 'absolute', 'top' : top + scrollTop, left : left + scrollLeft } ).show();
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
