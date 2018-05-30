<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = '常见问题';

?>
<style>
	.wrap{
		width:100%;
		text-align:center;
	}
	.gonggao-div{
		float:left;
		width:100%;
	}
	.gonggao{
		list-style-type:none;
		margin:0;
		padding:0;
		float:left;
	}
	.gonggao a{
		float:left;
		width:100%;
		line-height:32px;
	}
	.gonggao li:hover{
		background:#deepskyblue;
	}
	.gonggao li{
		float:left;
		margin:0;
		padding-left:20px;
		width:100%;
		border-bottom:1px solid #ddd;
	}
	.arrow{
		width:20px;
		float:right;
		margin-right:45px;
	}
</style>
<div class="wrap">
	<img src="images/logo.png" />
</div>
<div class="gonggao-div">
	<ul class="gonggao">
		<a href="?r=site/article&id=2"><li>约定中介交易简介及常见问题<img class="arrow" src="images/up.png" /></li></a>
		<a href="?r=site/article&id=3"><li>签订合同-买家常见问题<img class="arrow" src="images/up.png" /></li></a>
		<a href="?r=site/article&id=4"><li>签订合同-卖家常见问题<img class="arrow" src="images/up.png" /></li></a>
	</ul>
</div>

