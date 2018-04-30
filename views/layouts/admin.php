<?php

/* @var $this \yii\web\View */
/* @var $content string */
/* 莱恩网络 */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;

//AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="jquery-3.3.1.min.js"></script>
    <link href="./css/admin.css" rel="stylesheet">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header>
	<p id="title">壹折手游平台管理系统</p>
	<div class="login">
<?php
	$user = User::checkLogin();
	if($user){
		echo '<p>欢迎：' . $user->name . '</p>';
		echo '<p><a href="' . Url::toRoute('user/logout') . '">退出</a></p>';
	}
?>

	</div>
</header>

<section>
	<div id="left">
		<p class="menu-title">账号管理</p>
		<a href="<?=Url::toRoute(['site/create', 'add' => 'coin'])?>"><p class="menu-item">添加金币</p></a>
		<a href="<?=Url::toRoute(['site/create', 'add' => 'role'])?>"><p class="menu-item">添加角色</p></a>
		<a href="<?=Url::toRoute(['site/create', 'add' => 'pets'])?>"><p class="menu-item">添加宠物</p></a>
		<a href="<?=Url::toRoute(['site/create', 'add' => 'arm'])?>"><p class="menu-item">添加装备</p></a>
		<a href="<?=Url::toRoute('site/index')?>"><p class="menu-item">列表</p></a>

		<p class="menu-title">权限管理</p>
		<a href="<?=Url::toRoute('user/index')?>"><p class="menu-item">用户管理</p></a>
		<a href="<?=Url::toRoute('test/index')?>"><p class="menu-item">测试</p></a>

	</div>
	<div id="right">
		<?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
		<?= $content ?>
	</div>
</section>

<footer>
	<p>关于我们 联系我们 客户服务</p>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
	if(Yii::$app->session->hasFlash('message')){
		echo "<script>alert('" . Yii::$app->session->getFlash('message') . "')</script>";
	}
?>
