<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = '小姐姐喊您卖号啦！';

?>
<style>
	.pink{
		float:left;
		width:43%;
		margin:1.5%;
		padding:5px;
		border:1px solid #ddd;
		color:#f7564e;
		text-align:center;
	}
	.box{
		float:left;
		width:100%;
	}
	.box1{
		float:left;
		display:none;
		margin:0;
		background:#f86d65;
		width:90%;
		padding:0 5%;
		border-radius:10px;
		margin-bottom:10px;
	}
	table{
		width:100%;
		margin-top:10px;
	}
	table,tr,td{
		border:1px solid #ddd;
	}
	td{
		padding:3px;
	}
	.check{
		padding:0 5px;
		margin:0;
	}
	.circle-div{
		float:left;
		position:relative;
	}
	.circle{
		float:left;
		width:40px;
		height:40px;
		border-radius:20px;
		border:1px solid #05d2e0;
		background:#05d2e0;
		text-align:center;
		font-size:25px;
		font-weight:bold;
		color:white;
	}
	.down{
		position:absolute;
		display:none;
		top:50px;
		left:11px;
		border:10px solid transparent;
		border-top:10px solid #05d2e0;
	}
	.number{
		float:left;
		font-size:24px;
		font-weight:bold;
		width:20px;
		margin:25px 5px 0 20px;
	}
	.guess{
		float:left;
		font-size:16px;
		margin:35px 10px;
	}
	.right{
		width:20px;
		float:right;
		margin:30px;
	}
	.title-div{
		float:left;
		width:100%;
		margin-top:20px;
	}
</style>

<div>
	<img style="width:100%;" src="images/3.jpg" />

	<div class="title-div">
		<span class="gradientblue1">我要卖号</span>
	</div>
	<div class="box">
		<p id="kefu-p" class="pink">客服上架</p>
		<a href="<?= Url::toRoute(['site/article', 'id'=> 14]) ?>"><p class="pink">卖家须知</p></a>
	</div>
	<div class="box" style="text-align:center;">
		<img class="check" src="images/sell/005.png" />无差价
		<img class="check" src="images/sell/005.png" />价格高
		<img class="check" src="images/sell/005.png" />成交快
	</div>
	<div class="title-div">
		<span class="gradientblue1">收费标准</span>
	</div>
	<div class="box">
		<style>
			.table tr td{
				border:1px solid #ddd;
			}
			.table td{
				font-size:12px;
				padding:3px 7px;
			}
		</style>
		<table class="table" style="width:100%;">
			<tr>
				<td><b>账号类型</b></td>
				<td><b>收费标准</b></td>
				<td><b>收费对象</b></td>
			</tr>
			<tr>
				<td>无绑定账号</td>
				<td>交易金额*6%（最低150R 2K封顶）</td>
				<td>卖家</td>
			</tr>
			<tr>
				<td>手机账号</td>
				<td>交易金额*6%（最低150R 2K封顶）</td>
				<td>卖家</td>
			</tr>
			<tr>
				<td>有绑定账号</td>
				<td>交易金额*6%（最低150R 2K封顶）</td>
				<td>卖家</td>
			</tr>
			<tr>
				<td>签合同账号</td>
				<td>交易金额*8%（最低200R 3K封顶）</td>
				<td>卖家</td>
			</tr>
		</table>
		<div style="height:15px;float:left:width:100%;">&nbsp;</div>
	</div>
	<div class="title-div">
		<span class="gradientblue1">挂号流程</span>
	</div>
	<div class="box" data-roc="1">
		<p class="number">1</p>
		<div class="circle-div">
			<p class="circle">诚</p>
			<p class="down" data-roc="1"></p>
		</div>
		<p class="guess">估价制图</p>
		<img class="right" src="images/up.png" />
	</div>
	<div class="box1" data-roc="1">
		<p style="color:white;padding:0 10px;">平台客服上号截图制图 并且根据装备和宝宝服务器进行快速估价</p>
	</div>
	<div class="box" data-roc="2">
		<p class="number">2</p>
		<div class="circle-div">
			<p class="circle">信</p>
			<p class="down" data-roc="2"></p>
		</div>
		<p class="guess">估价制图</p>
		<img class="right" src="images/up.png" />
	</div>
	<div class="box1" data-roc="2">
		<p style="color:white;padding:0 10px;">确定好标价后 客服把商品上架到网站</p>
	</div>
	<div class="box" data-roc="3">
		<p class="number">3</p>
		<div class="circle-div">
			<p class="circle">交</p>
			<p class="down" data-roc="3"></p>
		</div>
		<p class="guess">估价制图</p>
		<img class="right" src="images/up.png" />
	</div>
	<div class="box1" data-roc="3">
		<p style="color:white;padding:0 10px;">买家询价 客服协助买卖双方谈价 谈好价格后买家打款 客服协助 买卖双方换绑资料</p>
	</div>
	<div class="box" data-roc="4">
		<p class="number">4</p>
		<div class="circle-div">
			<p class="circle">易</p>
			<p class="down" data-roc="4"></p>
		</div>
		<p class="guess">估价制图</p>
		<img class="right" src="images/up.png" />
	</div>
	<div class="box1" data-roc="4">
		<p style="color:white;padding:0 10px;">24小时后买家确认换绑定成功 平台打款给买卖家 交易完成</p>
	</div>
	<div class="title-div">
		<span class="gradientblue1">不拿卖家差价</span>
	</div>
	<div class="box">
		<p style="width:90%;margin:10px 5%;">如卖家发现有差价平台承诺100倍赔<span style="color:#05d2e0;">（差价是指例如实际成交价格是1.3万,但是平台告诉卖家成交价格是1万,3000元就是差价）</span></p>
		<img style="float:left;width:40px;margin-left:43px;" src="images/sell/4.png" />
		<img style="width:70%;float:left;" src="images/sell/6.png" />
		<div style="height:15px;float:left;width:100%;">&nbsp;</div>
	</div>
	<div class="title-div">
		<span class="gradientblue1">保护卖家隐私</span>
	</div>
	<div class="box">
		<p style="width:90%;margin:10px 5%;">除必要的换帮资料外 平台在没有取得卖家同意下不泄漏任何卖家信息 否则承担相</p>
		<div style="float:left;width:30%;margin-left:43px;">
			<img style="width:40px;margin:15px;float:left;clear:both;" src="images/sell/3.png" />
			<img style="width:40px;margin:15px;float:left;clear:both;" src="images/sell/2.png" />
			<img style="width:40px;margin:15px;float:left;clear:both;" src="images/sell/1.png" />
		</div>
		<img style="width:200px;" src="images/sell/5.png" />
	</div>
	<div class="title-div">
		<span class="gradientblue1">卖家常见问题</span>
	</div>
	<div class="content-div" style="float:left;margin:20px 2.5%;">
		<p class="a-title" data-in="q1">上架后多久能卖掉？<span style="float:right;">></span></p>
		<div id="q1" style="display:none;">
			<p>游戏角色装备宝宝齐全，价格合理当天即可卖掉。如果挂号后长时间无人咨询建议联系客服降价更新重新发布。</p>
		</div>
		<p class="a-title" data-in="q2">成交后多久给卖家打款？<span style="float:right;">></span></p>
		<div id="q2" style="display:none;">
			<p>游戏换绑成功后打款到卖家指定的银行账号，一般24小时即可换绑成功，新签订合同的账号需要等我们收到合同确认无误后打款给卖家。打款慢投诉微信：ccbgz18</p>
		</div>
		<p class="a-title" data-in="q3">卖号需要提供什么资料吗？？<span style="float:right;">></span></p>
		<div id="q3" style="display:none;">
			<p>卖号的只需要扫码或者给账号密码让客服上号截图做图即可，成交后才会根据账号类型的不同需要卖家提供相应的资料。</p>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	$(".box").click(function(){
		$(".box1[data-roc=" + $(this).data("roc") + "]").toggle();
		$(".down[data-roc=" + $(this).data("roc") + "]").toggle();
	});
	$(".a-title").click(function(){
		$("div[id=" + $(this).data("in") + "]").toggle();
	});
});
</script>

