<?php

/* @var $this yii\web\View */

	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use yii\helpers\Url;
	use yii\widgets\LinkPager;
	use app\models\User;
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

    $this->title = '用户管理';
	$this->params['breadcrumbs'][] = ['label' => '管理首页', 'url' => ['']];
	$this->params['breadcrumbs'][] = $this->title;

?>

<style>
	#list{
		margin:10px;
		list-style-type:none;
	}
	#list li{
		float:left;
		width:100%;
		padding:10px 5px;
	}
	#list li:nth-child(even){
		background:#ddd;
	}
	#list li span{
		margin-left:10px;
		display:block;
		float:left;
	}
	.pagination {
  display: inline-block;
  padding-left: 0;
  margin:10px;
  border-radius: 4px;
}
.pagination > li {
  display: inline;
}
.pagination > li > a,
.pagination > li > span {
  position: relative;
  float: left;
  padding: 6px 12px;
  margin-left: -1px;
  line-height: 1.42857143;
  color: #337ab7;
  text-decoration: none;
  background-color: #fff;
  border: 1px solid #ddd;
}
.pagination > li:first-child > a,
.pagination > li:first-child > span {
  margin-left: 0;
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
.pagination > li:last-child > a,
.pagination > li:last-child > span {
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px;
}
.pagination > li > a:hover,
.pagination > li > span:hover,
.pagination > li > a:focus,
.pagination > li > span:focus {
  z-index: 2;
  color: #23527c;
  background-color: #eee;
  border-color: #ddd;
}
.pagination > .active > a,
.pagination > .active > span,
.pagination > .active > a:hover,
.pagination > .active > span:hover,
.pagination > .active > a:focus,
.pagination > .active > span:focus {
  z-index: 3;
  color: #fff;
  cursor: default;
  background-color: #337ab7;
  border-color: #337ab7;
}
.pagination > .disabled > span,
.pagination > .disabled > span:hover,
.pagination > .disabled > span:focus,
.pagination > .disabled > a,
.pagination > .disabled > a:hover,
.pagination > .disabled > a:focus {
  color: #777;
  cursor: not-allowed;
  background-color: #fff;
  border-color: #ddd;
}
.pagination-lg > li > a,
.pagination-lg > li > span {
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333;
}
.pagination-lg > li:first-child > a,
.pagination-lg > li:first-child > span {
  border-top-left-radius: 6px;
  border-bottom-left-radius: 6px;
}
.pagination-lg > li:last-child > a,
.pagination-lg > li:last-child > span {
  border-top-right-radius: 6px;
  border-bottom-right-radius: 6px;
}
.pagination-sm > li > a,
.pagination-sm > li > span {
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
}
.pagination-sm > li:first-child > a,
.pagination-sm > li:first-child > span {
  border-top-left-radius: 3px;
  border-bottom-left-radius: 3px;
}
.pagination-sm > li:last-child > a,
.pagination-sm > li:last-child > span {
  border-top-right-radius: 3px;
  border-bottom-right-radius: 3px;
}
.pager {
  padding-left: 0;
  margin: 20px 0;
  text-align: center;
  list-style: none;
}
.pager li {
  display: inline;
}
.pager li > a,
.pager li > span {
  display: inline-block;
  padding: 5px 14px;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 15px;
}
.pager li > a:hover,
.pager li > a:focus {
  text-decoration: none;
  background-color: #eee;
}
.pager .next > a,
.pager .next > span {
  float: right;
}
.pager .previous > a,
.pager .previous > span {
  float: left;
}
.pager .disabled > a,
.pager .disabled > a:hover,
.pager .disabled > a:focus,
.pager .disabled > span {
  color: #777;
  cursor: not-allowed;
  background-color: #fff;
}
</style>
<style>
	.menu-ul{
		float:left;
		width:100%;
		margin:5px 10px;
		list-style-type:none;
	}
	.title-li{
		float:left;
		width:100px;
		color:#999;
		margin-left:10px;
		margin-top:5px;
		padding:3px 10px;
	}
	.item-li{
		float:left;
		border:1px solid #ddd;
		color:#999;
		margin-left:10px;
		margin-top:5px;
		padding:3px 10px;

	}
	.form-group{
		float:left;
		clear:none;
	}
	.form-group1{
		 width:100%;
		 float:left;
		 margin-left:150px;
		 margin-top:10px;
	}
	.button-group{
		float:left;
		width:100%;
	}
</style>
<div class="site-about">
	<!--
	<div id="search">
		<?php $form = ActiveForm::begin(['action' => Url::toRoute('site/search'), 'method' => 'post']); ?>
			<?= $form->field($search, 'text', ['options' => ['class' => 'search-form']])->textInput(['class' => 'search-input'])->label(false) ?>
			<input type="image" id="searchimg" src="images/search.png" />
		<?php ActiveForm::end(); ?>
	</div>
	<div id="menu">

		<p id="p1" onclick="showMask1()">平台<img src="images/down.png" /></p>
		<p id="p2" onclick="showMask2()">服务器<img src="images/down.png" /></p>
		<p id="p3" onclick="showMask3()">筛选<img src="images/down.png" /></p>

		<?php
			if($Order =='up'){
				echo '<a href="' . Url::current(['priceOrder' => 'down']) . '"><p id="p4">价格<img src="images/au.png" /></p></a>';
			}
			if($Order =='down'){
				echo '<a href="' . Url::current(['priceOrder' => 'up']) . '"><p id="p4">价格<img src="images/ad.png" /></p></a>';
			}
			if($Order == ''){
				echo '<a href="' . Url::current(['priceOrder' => 'up']) . '"><p id="p4">价格</p></a>';
			}
		?>
	</div>
	-->
	<ul id="os" class="menu-ul">
		<li class="title-li">操作系统</li>
		<?php
		if(isset($os)){
			switch($os){
				case 1:
					echo '<a href="' . Url::current(['os' => null]) . '"><li class="item-li">不限</li></a>';
					echo '<a href="' . Url::current(['os' => '1']) . '"><li class="item-li-active">苹果专区</li></a>';
					echo '<a href="' . Url::current(['os' => '2']) . '"><li class="item-li">安卓官服</li></a>';
					echo '<a href="' . Url::current(['os' => '3']) . '"><li class="item-li">双平台</li></a>';
					break;
				case 2:
					echo '<a href="' . Url::current(['os' => null]) . '"><li class="item-li">不限</li></a>';
					echo '<a href="' . Url::current(['os' => '1']) . '"><li class="item-li-active">苹果专区</li></a>';
					echo '<a href="' . Url::current(['os' => '2']) . '"><li class="item-li-active">安卓官服</li></a>';
					echo '<a href="' . Url::current(['os' => '3']) . '"><li class="item-li">双平台</li></a>';
					break;
				case 3:
					echo '<a href="' . Url::current(['os' => null]) . '"><li class="item-li">不限</li></a>';
					echo '<a href="' . Url::current(['os' => '1']) . '"><li class="item-li-active">苹果专区</li></a>';
					echo '<a href="' . Url::current(['os' => '2']) . '"><li class="item-li">安卓官服</li></a>';
					echo '<a href="' . Url::current(['os' => '3']) . '"><li class="item-li-active">双平台</li></a>';
					break;
				default:
					echo '<a href="' . Url::current(['os' => null]) . '"><li class="item-li-active">不限</li></a>';
					echo '<a href="' . Url::current(['os' => '1']) . '"><li class="item-li-active">苹果专区</li></a>';
					echo '<a href="' . Url::current(['os' => '2']) . '"><li class="item-li">安卓官服</li></a>';
					echo '<a href="' . Url::current(['os' => '3']) . '"><li class="item-li">双平台</li></a>';
					break;
			}
		}
		?>
	</ul>
	<div id="filter-div2" class="filter-div">
		<!-- 大区列表 -->
		<ul class="menu-ul">
			<li class="title-li">服务器大区</li>
	    	<a href="<?=Url::current(['district' => null, 'big' => '不限'])?>"><li class="item-li">不限</li></a>
			<a href="<?=Url::current(['district' => null, 'big' => '一区'])?>"><li class="item-li">一区</li></a>
			<a href="<?=Url::current(['district' => null, 'big' => '二区'])?>"><li class="item-li">二区</li></a>
			<a href="<?=Url::current(['district' => null, 'big' => '三区'])?>"><li class="item-li">三区</li></a>
			<a href="<?=Url::current(['district' => null, 'big' => '四区'])?>"><li class="item-li">四区</li></a>
			<a href="<?=Url::current(['district' => null, 'big' => '五区'])?>"><li class="item-li">五区</li></a>
			<a href="<?=Url::current(['district' => null, 'big' => '六区'])?>"><li class="item-li">六区</li></a>
			<a href="<?=Url::current(['district' => null, 'big' => '七区'])?>"><li class="item-li">七区</li></a>
			<a href="<?=Url::current(['district' => null, 'big' => '八区'])?>"><li class="item-li">八区</li></a>
			<a href="<?=Url::current(['district' => null, 'big' => '九区'])?>"><li class="item-li">九区</li></a>
			<a href="<?=Url::current(['district' => null, 'big' => '十区'])?>"><li class="item-li">十区</li></a>
			<a href="<?=Url::current(['district' => null, 'big' => '十一区'])?>"><li class="item-li">十一区</li></a>
			<a href="<?=Url::current(['district' => null, 'big' => '十二区'])?>"><li class="item-li">十二区</li></a>
			<a href="<?=Url::current(['district' => null, 'big' => '十三区'])?>"><li class="item-li">十三区</li></a>
			<a href="<?=Url::current(['district' => null, 'big' => '十四区'])?>"><li class="item-li">十四区</li></a>
			<a href="<?=Url::current(['district' => null, 'big' => '双平台'])?>"><li class="item-li">双平台</li></a>
			<a href="<?=Url::current(['district' => null, 'big' => '安卓混服'])?>"><li class="item-li">安卓混服</li></a>
	    </ul>
	    <!-- 服务器列表 -->
	    <?php if($servers){ ?>
		    <div style="width:100%;float:left;">
			    <p class="title-li" style="margin-left:20px;">服务器</p>
			    <div style="float:left;clear:right;width:1400px;">
					<ul class="menu-ul" style="margin-left:0;">
						<?php
							foreach($servers as $s){
								echo '<a href="' . Url::current(['district' => $s->id]) . '"><li class="item-li">' . $s->name . '</li></a>';
							}
						?>
					</ul>
				</div>
			</div>
		<?php } ?>
	</div>

	<div class="cb"></div>
	<?php
		//echo $condition;
	?>
	<div id="filter-div3" class="filter-div">

		<?php $form = ActiveForm::begin(); ?>
<div class="form-group1">
		<?= $form->field($model, 'bind')->label(false)->dropDownList(['-1' => '绑定类型'] + Bind::find()->select(['name', 'id'])->indexBy('id')->column()) ?>

		<?= $form->field($model, 'category')->label(false)->dropDownList(['-1' => '账号类型'] +  Category::find()->select(['name', 'id'])->indexBy('id')->column()) ?>

        <?= $form->field($model, 'discuss')->label(false)->dropDownList(['-1' => '能否议价', '1'=>'能','0'=>'否']) ?>

        <?= $form->field($model, 'level')->label(false)->dropDownList(['-1' => '人物级别', '1'=>'0~69级','2'=>'70~89级', '3' => '90~109级']) ?>

		<?= $form->field($model, 'school')->label(false)->dropDownList(['-1' => '人物门派', '1' => '物理输出', '2' => '法系输出', '3' => '辅助门派']) ?>
</div>
<p class="title-li" style="margin-left:20px;margin-right:10px;">价格范围</p>
		<?= $form->field($model, 'price')->label(false) ?>
		<?= $form->field($model, 'price1', ['options' => ['class' => 'price1']])->label('—') ?>

<!--
		<?= $form->field($model, 'sex')->label(false)->radioList(['1'=>'男','0'=>'女']) ?>
-->
        <div class="button-group">
        	<?= Html::resetButton('重置', ['class' => 'btn btn-primary']) ?>
            <?= Html::submitButton('确认', ['class' => 'btn btn-primary']) ?>
        </div>
	    <?php ActiveForm::end(); ?>
	</div>
	<div id="mask" class="mask" onclick="hideMask()"></div>

<?php
		if(!$equipments){
			echo '<p style="width:100%;text-align:center;padding:200px 0;">还没有任何信息</p>';
		}
		else{
			echo '<ul id="list">';
			foreach($equipments as $e){
				echo "<li>\n";
					echo '<a onclick="return confirm(\'确认要删除吗？\')" href="' . Url::toRoute(['admin/delete', 'id' => $e->id]) . '"><span>删除</span></a>';
					if($e->bestone == 0){
						echo '<a href="' . Url::toRoute(['admin/bestone', 'id' => $e->id]) . '"><span>加精</span></a>';
					}
					else{
						echo '<a href="' . Url::toRoute(['admin/bestone', 'id' => $e->id]) . '"><span>取消</span></a>';
					}
						echo '<span>';
								if($e->role <> ''){
									echo '角色';
								}
								elseif($e->pets <> ''){
									echo '宠物';
								}
								elseif($e->arm <> ''){
									echo '武器';
								}
								elseif($e->defence  <> ''){
									echo '防具';
								}
								else{
									echo '金币';
								}

						echo '</span>';
						echo '<span style="color:red;width:100px;">￥'. $e->price . '.00</span>';
						echo '<span style="width:100px;">' . Os::findOne($e->os)->name . '</span>';
						echo '<span style="width:80px;">' . School::findOne($e->school)->name . '</span>';
						echo '<span style="width:120px;">' . District::findOne($e->district)->big . '-' . District::findOne($e->district)->name . '</span>';
						echo '<span style="width:60px;">' . $e->level . '级</span>';
						echo '<span style="width:80px;">' . Category::findOne($e->category)->name . '</span>';
						echo '<span style="width:80px;">' . Bind::findOne($e->bind)->name . '</span>';
						echo '<span style="width:20px;">' . ($e->sex ==0 ? '女': '男') . '</span>';
						echo '<span style="width:180px;">' . $e->updatetime . '</span>';
					echo '</li>';
			}
			echo '</ul>';

			echo '<div style="width:100%;float:left;margin:5px 0 0 0;">';
			echo LinkPager::widget(['pagination' => $pagination,]);
			echo '</div>';
		}
		?>
	</div>
</div>
<script type="text/javascript">
	// 根据左侧选择的大区，调出右边大区对应的服务器
	$(document).ready(function(){
		$(".ul1 li").click(function(){
			var num = $(this).attr("data-type");
			$(".ul2 li").css("display", "none");
			$(".ul2 li[data-type=" + num + "]").css("display", "block");
		});
	});
</script>

<script type="text/javascript">//显示灰色 jQuery 遮罩层

	/* 筛选菜单遮罩 */
	function showMask1() {
        $("#filter-div1").toggle();
        $("#filter-div2").css('display', 'none');
        $("#filter-div3").css('display', 'none');
        show();
	}
	function showMask2() {
	    $("#filter-div1").css('display', 'none');
	    $("#filter-div2").toggle();
	    $("#filter-div3").css('display', 'none');
        show();
	}
	function showMask3() {
	    $("#filter-div1").css('display', 'none');
	    $("#filter-div2").css('display', 'none');
	    $("#filter-div3").toggle();
        show();
	}
	function show(){
		$("#mask").css("height",$(document.body).height());
        $("#mask").css("width",$(document.body).width());
        $("#mask").css("top",120);
        $("#mask").show();
	}
    function hideMask(){
        $("#mask").hide();
        $("#filter-div1").css('display', 'none');
        $("#filter-div2").css('display', 'none');
        $("#filter-div3").css('display', 'none');
    }
</script>