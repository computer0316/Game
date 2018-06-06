<?php

use yii\helpers\Url;

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
		}
		.four-box{
			width:25%;
			float:left;
			text-align:center;
			margin-top:10px;
		}
		.four-box img{
			width:40px;
			border-radius:30px;
		}
		.four-box p{
			margin-top:5px;
			font-size:12px;
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
			color:red;
			line-height:48px;
		}
</style>
<style>
			.list{
			float:left;
			width:100%;
			font-size:0.9rem;
			border-bottom:1px dashed #ccc;
			margin-top:10px;
			padding-bottom:10px;
		}
		.list-img-div{
			float:left;
			width:15%;
			padding:1%;
			margin:1% 2%;
			border:1px solid #ccc;
			border-radius:5px;
		}
		.list-img{
			width:100%;
		}
		.list-line{
			float:left;
			width:73%;
			margin:5px 1%;
		}
		.list-icon{
			float:left;
			width:1.5rem;
		}
		.list-line p{
			padding:0;
			margin:0;
		}
		.list-title{
			float:left;
			font-size:1rem;
		}
		.list-item{
			float:left;
			font-size:0.8rem;
			color:#999;
		}
		.right-item{
			float:right;
			font-size:0.8rem;
			color:#999;
		}
		.title-div{
			border:1px solid deepskyblue;
			border-radius:5px;
			text-align:center;
			margin:15px 0px;
			padding:5px 0;
			float:left;
		}
		.new-title{
			color:deepskyblue;
			float:left;
			margin:5px 10px;
			font-weight:bold;
		}
		.more{
			float:right;
			color:#ccc;
			margin:5px
		}
		.gonggao{
			width:100%;
			float:left;
		}
		.gonggao li{
			font-size:12px;
			color:deepskyblue;
			padding:10px;
			border-bottom:1px dashed #ddd;
		}
</style>
<!-- Slideshow -->
<div class="callbacks_container">
	<ul class="rslides" id="slider">
		<li><a href="<?= Url::toRoute(['site/article', 'id' => '11'])?>"><img src="images/1.jpg" alt=""></a></li>
		<li><a href="<?= Url::toRoute(['site/article', 'id' => '5'])?>"><img src="images/2.jpg" alt=""></a></li>
		<li><a href="<?= Url::toRoute(['site/article', 'id' => '13'])?>"><img src="images/3.jpg" alt=""></a></li>
		<li><a href="<?= Url::toRoute(['site/article', 'id' => '10'])?>"><img src="images/4.jpg" alt=""></a></li>
		<li><a href="<?= Url::toRoute(['site/article', 'id' => '2'])?>"><img src="images/5.jpg" alt=""></a></li>
		<li><a href="<?= Url::toRoute(['site/article', 'id' => '9'])?>"><img src="images/6.jpg" alt=""></a></li>
	</ul>
</div>
<div class="container"">
	<a href="<?=Url::toRoute(['site/list', 'category' => 2])?>">
		<div class="four-box">
			<img src="sysimg/index/coin.png" />
			<p>梦幻币</p>
		</div>
	</a>
	<a href="<?=Url::toRoute(['site/list', 'category' => 1])?>">
		<div class="four-box">
			<img src="sysimg/index/role.png" />
			<p>角色</p>
		</div>
	</a>
	<a href="<?=Url::toRoute(['site/list', 'category' => 4])?>">
		<div class="four-box">
			<img src="sysimg/index/monster.png" />
			<p>召唤兽</p>
		</div>
	</a>
	<a href="<?=Url::toRoute(['site/list', 'category' => 3])?>">
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
	<a href="?r=site/article&id=2">
		<div class="four-box">
			<img src="sysimg/index/vsjx.png" />
			<p>中介交易</p>
		</div>
	</a>
	<a href="?r=admin/mine">
		<div class="four-box">
			<img src="sysimg/index/ubch.png" />
			<p>我的收藏</p>
		</div>
	</a>
	<a href="?r=admin/mine">
		<div class="four-box">
			<img src="sysimg/index/gerf.png" />
			<p>个人中心</p>
		</div>
	</a>
</div>
<div class="container">
	<div class="title-div" style="width:99%;">
		每日精品
	</div>
	<?php
		if(!$bests){
			echo '<p style="width:100%;text-align:center;padding:200px 0;">还没有任何信息</p>';
		}
		else{

			foreach($bests as $e){
				echo '<a href="' . Url::toRoute(['site/show', 'id' => $e->id]) . '">';
					echo "<div class='list'>\n";
						echo '<div class="list-img-div">';
						$name = '';
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
									$name = '梦幻币';
								}

						echo '</div>';
						echo '<div class="list-line">';
							echo ($e->discuss=="0" ? '' : '<img class="list-icon" src="sysimg/index/discuss.png" />') . ' ';
							echo '<p class="list-title">' . $name . '</p>';
							echo '<p class="list-item">&nbsp;|&nbsp;' . $e->level . '级</p>';
							echo '<p class="right-item">' . District::findOne($e->district)->big . '-' . District::findOne($e->district)->name . '</p>';
						echo '</div>';
						echo '<div class="list-line">';
							echo '(' . $e->id . ')';
							echo Os::findOne($e->os)->name . ' ';

							echo Category::findOne($e->category)->name . ' ';
							echo Bind::findOne($e->bind)->name . ' ';

							echo ($e->sex ==0 ? '女': '男') . ' ';
							echo $e->monster . '神兽 ';

						echo '</div>';
						echo '<div class="list-line">';
							echo '<span style="color:red">￥'. $e->price . '.00</span>';
							echo '<span style="float:right;color:#ccc;">' . $e->updatetime . '</span>';
						echo "</div>";
					echo "</div>\n";
				echo '</a>';
			}
		}
		?>
</div>
<div class="container">
	<p class="new-title">最新上架</p><p><a class="more" href="?r=site/list">更多></a></p>
	<?php
		foreach($equi as $e){
			echo '<div class="list">';
			echo '<a href="?r=site/show&id=' . $e->id . '">';
			echo '<p class="p1">（' . $e->id . '） ' . Os::findOne($e->os)->name . '：' . District::findOne($e->district)->name . ' ' . $e->note. '</p>';
			echo '</a>';
			echo '<p class="p2">￥ ' . $e->price . "</p>\n";
			echo '</div>';
		}
	?>
</div>
<div class="container">
	<p class="new-title">公告</p><a href="?r=site/article"><p class="more">更多></p></a>
	<ul class="gonggao">
		<a href="?r=site/article&id=1"><li>壹折手游交易平台收款账号</li></a>
	</ul>
</div>
