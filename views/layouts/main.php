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

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
   	<style>
   		*{margin:0;padding:0;}
		body{font-family: helvetica neue,tahoma,arial,hiragino sans gb,microsoft yahei,sans-serif; font-size: 1.4rem; color:#333;background: #f7f7f7;}
		body, button, input, optgroup, select, textarea, h1, h2, h3, h4, h5, h6, p, figure, form, blockquote, ul, ol, li, dl, dd{margin:0;padding:0}
		html,body{position:relative; min-height:100%; min-width: 320px;max-width: 760px;margin: 0 auto;}
		article, aside, details, figcaption, figure, footer, header, hgroup, main, nav, section, summary{display: block;}
		input[type="button"], input[type="submit"], input[type="reset"]{-webkit-appearance:none;}
		img{vertical-align:middle; max-width:100%; border:0;}
		ul,ol{list-style:none;}
		input,button,textarea,select{outline:none; font-size:100%;}
		:-moz-placeholder {color: #999; opacity:1; }
		::-moz-placeholder { color: #999;opacity:1; }
		input:-ms-input-placeholder{ color: #999;opacity:1; }
		input::-webkit-input-placeholder{ color: #999;opacity:1; }
		a{color:#333; text-decoration: none; -webkit-tap-highlight-color: rgba(0,0,0,0);}
		.table{border-collapse:collapse; border-spacing:0;}
		.clear{clear:both; height:0; overflow:hidden;}
		.clearfix:after{content:"";display:block;height:0;clear:both;visibility:hidden;}

		.container{
			border:1px solid blue;
			border-radius:15px;
			height:350px;
			overflow:hidden;
		}
	</style>

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="header">
    <div class="container">
			1234abcd1234abcd1234abcd1234abcd1234abcd1234abcd1234abcd1234abcd1234abcd
    </div>
</div>



<?php $this->endBody() ?>
</body>
</html>

<?php
	$this->endPage();
	if(Yii::$app->session->hasFlash('message')){
		echo "<script>alert('" . Yii::$app->session->getFlash('message') . "')</script>";
	}
?>
