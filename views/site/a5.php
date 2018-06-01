<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = '包赔详情';

?>
<style>
	table{
		 width:100%;
	}
	table,tr,td{
		 border:1px solid #ddd;
	}
	td{
		padding:2px 0px;
		text-align:center;
	}
	td,p{
		font-size:0.1em;
	}
</style>

<div>
	<img style="width:100%;" src="images/2.jpg" />

	<div class="title-div">
		<span class="gradientred">邮箱账号</span>
	</div>
	<div class="content-div">

<table>
    <tbody>
        <tr>
            <td colspan="2">
            <p>账号类型</p>
            </td>
            <td colspan="2">
            <p>是否包赔</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <p>无绑定邮箱账号</p>
            </td>
            <td>
            <p>2000元以上包赔</p>
            </td>
            <td colspan="2">
            <p>包赔证明&gt;</p>
            </td>
        </tr>
        <tr>
            <td style="width:50px;" rowspan="3">
            <p>有绑定邮箱账号</p>
            </td>
            <td>
            <p>有绑定可签合同邮箱账号</p>
            </td>
            <td>
            <p>0元以上包赔</p>
            </td>
            <td colspan="2" rowspan="2">
            <p>包赔证明&gt;</p>
            </td>
        </tr>
        <tr>
            <td>
            <p>有绑已签合同邮箱账号</p>
            </td>
            <td>
            <p>0元以上包赔</p>
            </td>
        </tr>
        <tr>
            <td>
            <p>有绑不可签合同邮箱账号</p>
            </td>
            <td>
            <p>不包赔</p>
            </td>
            <td colspan="2">
            <p>&nbsp;</p>
            </td>
        </tr>
    </tbody>
</table>
</p>
	</div>
	<div class="title-div">
		<span class="gradientred">手机账号</span>
	</div>
	<div class="content-div">
		<table>
			<tr>
				<td>账号类型</td>
				<td>是否包赔</td>
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
	</div>
	<div class="title-div">
		<span class="gradientred">温馨提示</span>
	</div>
	<div class="content-div">
		<table class="table">
			<tr>
				<td>找回包赔需买家承担交易总额10%的费用 平台提供盖章交易证明</td>
			</tr>
			<tr>
				<td>找回包赔是平台提供买家的福利不影响成交价格 卖家决定多少钱卖 买家决定是否购买</td>
			</tr>
			<tr>
				<td>提供包赔的目的是 买号有风险 本平台也不例外 平台通过提供包赔服务来降低买家的损失</td>
			</tr>
			<tr>
				<td>找回包赔会让平台对账号来源和安全性有更严格的要求 从而降低平台的找回率</td>
			</tr>
		</table>
	</div>
	<div class="title-div">
		<span class="gradientred">包赔详情</span>
	</div>
	<div class="content-div">
		<table class="table">
			<tr>
				<td><span style="float:left;margin-left:10px;">三无邮箱账号包赔详情</span><span style="float:right;margin-right:10px;">></span></td>
			</tr>
			<tr>
				<td><span style="float:left;margin-left:10px;">手机账号包赔详情</span><span style="float:right;margin-right:10px;">></span></td>
			</tr>
			<tr>
				<td><span style="float:left;margin-left:10px;">合同账号包赔详情</span><span style="float:right;margin-right:10px;">></span></td>
			</tr>
		</table>
	</div>	<div class="title-div">
		<span class="gradientred">常见问题</span>
	</div>
	<div class="content-div">
		<table class="table">
			<tr>
				<td><span style="float:left;margin-left:10px;">为什么三无账号和手机账号只赔70%</span><span style="float:right;margin-right:10px;">></span></td>
			</tr>
			<tr>
				<td><span style="float:left;margin-left:10px;">包赔的期限是多久</span><span style="float:right;margin-right:10px;">></span></td>
			</tr>
			<tr>
				<td><span style="float:left;margin-left:10px;">为什么2000元以下的账号不包赔</span><span style="float:right;margin-right:10px;">></span></td>
			</tr>
			<tr>
				<td><span style="float:left;margin-left:10px;">为什么有绑定不签订合同账号不包赔</span><span style="float:right;margin-right:10px;">></span></td>
			</tr>
		</table>
	</div>
	<div class="title-div">
		<span class="gradientred">证件资质</span>
	</div>
	<div class="content-div">
		<img style="width:100%;" src="images/zz.jpg" />
	</div>
</div>

