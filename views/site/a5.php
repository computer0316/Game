<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = '包赔详情';

?>
<style>
	table{
		 width:95%;
		 margin:10px auto;
	}
	table,tr,td{
		 border:1px solid #ddd;
	}
	td{
		padding:5px 0px;
		text-align:center;
	}
	td,p{
		font-size:12px;
	}
	.pop{
		display:none;
		float:left;
		clear:both;
	}
</style>

<div>
	<img style="width:100%;" src="images/2.jpg" />

	<div class="title-div">
		<span class="gradientred">邮箱账号</span>
	</div>
	<table>
	        <tr>
	            <td colspan="2"><b>账号类型</b></td>
	            <td colspan="2"><b>是否包赔</b></td>
	        </tr>
	        <tr>
	            <td colspan="2">无绑定邮箱账号</td>
	            <td>2000元以上包赔</td>
	            <td colspan="2"><a style="color:red; "target="_blank" href="images/bp.jpg">包赔证明&gt;</a></td>
	        </tr>
	        <tr>
	            <td style="width:50px;" rowspan="3">有绑定邮箱账号</td>
	            <td>有绑定可签合同邮箱账号</td>
	            <td>0元以上包赔</td>
	            <td colspan="2" rowspan="2" style="color:red;"><a style="color:red; "target="_blank" href="images/bp.jpg">包赔证明&gt;</a></td>
	        </tr>
	        <tr>
	            <td>有绑已签合同邮箱账号</td>
	            <td>0元以上包赔</td>
	        </tr>
	        <tr>
	            <td>有绑不可签合同邮箱账号</td>
	            <td>不包赔</td>
	            <td colspan="2">&nbsp;</td>
	        </tr>
	</table>
	<div class="title-div">
		<span class="gradientred">手机账号</span>
	</div>
		<table>
			<tr>
				<td><b>账号类型</b></td>
				<td><b>是否包赔</b></td>
			</tr>
			<tr>
				<td>有绑定手机账号</td>
				<td>2000元以上包赔</td>
			</tr>
			<tr>
				<td>无绑定手机账号</td>
				<td>2000元以上包赔</td>
			</tr>
		</table>
	<div class="title-div">
		<span class="gradientred">温馨提示</span>
	</div>
		<table class="table">
			<tr>
				<td style="text-align:left;">1、找回包赔需买家承担交易总额10%的费用 平台提供盖章交易证明</td>
			</tr>
			<tr>
				<td style="text-align:left;">2、找回包赔是平台提供买家的福利不影响成交价格 卖家决定多少钱卖 买家决定是否购买</td>
			</tr>
			<tr>
				<td style="text-align:left;">3、提供包赔的目的是 买号有风险 本平台也不例外 平台通过提供包赔服务来降低买家的损失</td>
			</tr>
			<tr>
				<td style="text-align:left;">4、找回包赔会让平台对账号来源和安全性有更严格的要求 从而降低平台的找回率</td>
			</tr>
		</table>
	<div class="title-div">
		<span class="gradientred">包赔详情</span>
	</div>
		<table class="table">
			<tr>
				<td><a href="<?= Url::toRoute(['site/article', 'id' => 6]) ?>"<span style="float:left;margin-left:10px;">三无邮箱账号包赔详情</span></a><a href="<?= Url::toRoute(['site/article', 'id' => 6]) ?>"<span style="float:right;margin-right:10px;">></span></a></td>
			</tr>
			<tr>
				<td><a href="<?= Url::toRoute(['site/article', 'id' => 7]) ?>"<span style="float:left;margin-left:10px;">手机账号包赔详情</span></a><a href="<?= Url::toRoute(['site/article', 'id' => 7]) ?>"<span style="float:right;margin-right:10px;">></span></a></td>
			</tr>
			<tr>
				<td><a href="<?= Url::toRoute(['site/article', 'id' => 8]) ?>"<span style="float:left;margin-left:10px;">合同账号包赔详情</span></a><a href="<?= Url::toRoute(['site/article', 'id' => 8]) ?>"<span style="float:right;margin-right:10px;">></span></a></td>
			</tr>
		</table>
	<div class="title-div">
		<span class="gradientred">常见问题</span>
	</div>
		<table class="table">
			<tr>
				<td data-roc="1">
					<span style="float:left;margin-left:10px;">1、为什么三无账号和手机账号只赔70%</span>
					<span style="float:right;margin-right:10px;">></span>
					<p class="pop" data-roc="1">买号有风险，哪里都一样，我们平台提供包赔的目的是假如找回的事情发生在您这里，我们通过赔偿的方式尽量减少客户的损失。如果被找回并且确认无法找回账号，我们会赔偿然后报警处理。</p>
				</td>
			</tr>
			<tr>
				<td data-roc="2">
					<span style="float:left;margin-left:10px;">2、包赔的期限是多久</span>
					<span style="float:right;margin-right:10px;">></span>
					<p class="pop" data-roc="2">期限是游戏停止运营。</p>
				</td>
			</tr>
			<tr>
				<td data-roc="3">
					<span style="float:left;margin-left:10px;">3、为什么2000元以下的账号不包赔</span>
					<span style="float:right;margin-right:10px;">></span>
					<p class="pop" data-roc="3">2000元以下的账号去报案不受理，维权困难。</p>
				</td>
			</tr>
			<tr>
				<td data-roc="4">
						<span style="float:left;margin-left:10px;">4、为什么有绑定不签订合同账号不包赔</span>
						<span style="float:right;margin-right:10px;">></span>
					<p class="pop" data-roc="4">有绑定不可签订合同的账号就是死绑定账号，绑定的不是卖家本人的证件，有多少人有账号的资料和证件无法考证，如果被找回根本无法查是谁找回的，所以我们平台对这类账号不包赔。</p>
				</td>
			</tr>
		</table>
	<div class="title-div">
		<span class="gradientred">证件资质</span>
	</div>
	<img style="width:100%;" src="images/zz.jpg" />
</div>
<script>
	$(document).ready(function(){
		$("td").click(function(){
			$(".pop[data-roc=" + $(this).data("roc") + "]").toggle();
		});

	});
</script>

