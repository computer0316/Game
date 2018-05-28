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
		<a href="<?=Url::current(['os' => '1'])?>"><li class="item-li">苹果专区</li></a>
		<a href="<?=Url::current(['os' => '1'])?>"><li class="item-li">安卓官服</li></a>
		<a href="<?=Url::current(['os' => '1'])?>"><li class="item-li">双平台</li></a>
		<a href="<?=Url::current(['os' => null])?>"><li class="item-li">专区</li></a>
	</ul>
	<div id="filter-div2" class="filter-div">
		<!-- 大区列表 -->
		<ul class="menu-ul">
			<li class="title-li">服务器大区</li>
	    	<a href="<?=Url::current(['big' => '不限'])?>"><li class="item-li">不限</li></a>
			<a href="<?=Url::current(['big' => '一区'])?>"><li class="item-li">一区</li></a>
			<a href="<?=Url::current(['big' => '二区'])?>"><li class="item-li">二区</li></a>
			<a href="<?=Url::current(['big' => '三区'])?>"><li class="item-li">三区</li></a>
			<a href="<?=Url::current(['big' => '四区'])?>"><li class="item-li">四区</li></a>
			<a href="<?=Url::current(['big' => '五区'])?>"><li class="item-li">五区</li></a>
			<a href="<?=Url::current(['big' => '六区'])?>"><li class="item-li">六区</li></a>
			<a href="<?=Url::current(['big' => '七区'])?>"><li class="item-li">七区</li></a>
			<a href="<?=Url::current(['big' => '八区'])?>"><li class="item-li">八区</li></a>
			<a href="<?=Url::current(['big' => '九区'])?>"><li class="item-li">九区</li></a>
			<a href="<?=Url::current(['big' => '十区'])?>"><li class="item-li">十区</li></a>
			<a href="<?=Url::current(['big' => '十一区'])?>"><li class="item-li">十一区</li></a>
			<a href="<?=Url::current(['big' => '十二区'])?>"><li class="item-li">十二区</li></a>
			<a href="<?=Url::current(['big' => '十三区'])?>"><li class="item-li">十三区</li></a>
			<a href="<?=Url::current(['big' => '十四区'])?>"><li class="item-li">十四区</li></a>
			<a href="<?=Url::current(['big' => '双平台'])?>"><li class="item-li">双平台</li></a>
			<a href="<?=Url::current(['big' => '安卓混服'])?>"><li class="item-li">安卓混服</li></a>
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
	<div id="filter-div3" class="filter-div">

		<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'bind')->label(false)->dropDownList(['-1' => '绑定类型'] + Bind::find()->select(['name', 'id'])->indexBy('id')->column()) ?>

		<?= $form->field($model, 'category')->label(false)->dropDownList(['-1' => '账号类型'] +  Category::find()->select(['name', 'id'])->indexBy('id')->column()) ?>

        <?= $form->field($model, 'discuss')->label(false)->dropDownList(['-1' => '能否议价', '1'=>'能','0'=>'否']) ?>

        <?= $form->field($model, 'level')->label(false)->dropDownList(['-1' => '人物级别', '1'=>'0~69级','2'=>'70~89级', '3' => '90~109级']) ?>

		<?= $form->field($model, 'school')->label(false)->dropDownList(['-1' => '人物门派', '1' => '物理输出', '2' => '法系输出', '3' => '辅助门派']) ?>

		<?= $form->field($model, 'price', ['options' => ['class' => 'price']])->label('价格范围') ?>
		<?= $form->field($model, 'price1', ['options' => ['class' => 'price1']])->label('—') ?>

		<?= $form->field($model, 'sex')->label(false)->radioList(['1'=>'男','0'=>'女']) ?>

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

			foreach($equipments as $e){
				echo '<a href="' . Url::toRoute(['site/show', 'id' => $e->id]) . '">';
					echo "<div class='list'>\n";
						echo '<div class="list-img-div">';
								if($e->role <> ''){
									echo '<img class="list-img" src="' . ($e->role <> '' ? Role::findOne($e->role)->img : 'sysimg/index/coin.jpg') . '" />';
								}
								elseif($e->pets <> ''){
									echo '<img class="list-img" src="' . ($e->pets <> '' ? Pets::findOne($e->pets)->img : 'sysimg/index/coin.jpg') . '" />';
								}
								elseif($e->arm <> ''){
									echo '<img class="list-img" src="' . ($e->arm <> '' ? Arm::findOne($e->arm)->img : 'sysimg/index/coin.jpg') . '" />';
								}
								elseif($e->defence  <> ''){
									echo '<img class="list-img" src="' . ($e->defence <> '' ? Defence::findOne($e->defence)->img : 'sysimg/index/coin.jpg') . '" />';
								}
								else{
									echo '<img class="list-img" src="sysimg/index/coin.png" />';
								}

						echo '</div>';
						echo '<div class="list-line">';
							echo ($e->discuss=="0" ? '' : '<img class="list-icon" src="sysimg/index/discuss.png" />') . ' ';
							echo '<p class="list-title">' . School::findOne($e->school)->name . '</p>';
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
							echo '<a href="' . Url::toRoute(['site/show', 'id' => $e->id]) . '">';
							echo '<span style="color:red">￥'. $e->price . '.00</span>';
							echo '<span style="float:right;color:#ccc;">' . $e->updatetime . '</span>';
							echo '</a>';
							echo "</td>";
						echo "</div>";
					echo "</div>\n";
				echo '</a>';
			}
			echo '</div>';

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