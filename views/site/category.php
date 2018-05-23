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

$this->title = '列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
	#left{
		height:500px;
		width:20%;
		float:left;
		border-top:1px solid #ccc;
	}
	#list{margin:0;padding:0;}
	#list li{
		width:100%;
		height:64px;
		font-size:14px;
		color:#666;
		text-align:center;
		line-height:64px;
	}
	#right{
		float:left;
		width:79%;
		border-top:1px solid #ccc;
		border-left:1px solid #ccc;
	}
	.block{
		float:left;
		display:block;
		width:30%;
		margin-left:3%;
		margin-top:20px;
		text-align:center;
	}
	.block img{
		width:60%;
	}
	.category{
		display:none;
	}
	.school-title{
		float:left;
		width:100%;
		padding-left:10px;
		font-size:18px;
		color:deepskyblue;
		border-bottom:1px solid deepskyblue;
	}
</style>

<div class="coitainer">
	<div id="search">
		<?php $form = ActiveForm::begin(['action' => Url::toRoute('site/search'), 'method' => 'post']); ?>
			<?= $form->field($search, 'text', ['options' => ['class' => 'search-form']])->textInput(['class' => 'search-input'])->label(false) ?>
			<input type="image" id="searchimg" src="images/search.png" />
		<?php ActiveForm::end(); ?>
	</div>
</div>
<div class="container">
	<div id="left">
		<ul id="list">
			<li data-type="recomment">推荐</li>
			<li data-type="role">门派</li>
			<li data-type="pets">召唤兽</li>
			<li data-type="arm">武器</li>
			<li data-type="defence">防具</li>
		</ul>
	</div>
	<div id="right">
		<div class="category" data-type="role" id="role">
			<p class="school-title">物理输出</p>
				<a class="block" href="<?= Url::toRoute(['site/list', 'school' => 1]) ?>">
						<img src="sysimg/school/dt.png" /><p>大唐官府</p>
				</a>
				<a class="block" href="<?= Url::toRoute(['site/list', 'school' => 9]) ?>">
						<img src="sysimg/school/yg.png" /><p>月宫</p>
				</a>
				<a class="block" href="<?= Url::toRoute(['site/list', 'school' => 3]) ?>">
						<img src="sysimg/school/st.png" /><p>狮驼岭</p>
				</a>
			<p class="school-title">法系输出</p>
				<a class="block" href="<?= Url::toRoute(['site/list', 'school' => 5]) ?>">
						<img src="sysimg/school/lg.png" /><p>龙宫</p>
				</a>
				<a class="block" href="<?= Url::toRoute(['site/list', 'school' => 7]) ?>">
						<img src="sysimg/school/mw.png" /><p>魔王寨</p>
				</a>
			<p class="school-title">辅助门派</p>
				<a class="block" href="<?= Url::toRoute(['site/list', 'school' => 6]) ?>">
						<img src="sysimg/school/yc.png" /><p>阴曹地府</p>
				</a>
				<a class="block" href="<?= Url::toRoute(['site/list', 'school' => 8]) ?>">
						<img src="sysimg/school/hs.png" /><p>化生寺</p>
				</a>
				<a class="block" href="<?= Url::toRoute(['site/list', 'school' => 4]) ?>">
						<img src="sysimg/school/pt.png" /><p>普陀山</p>
				</a>
				<a class="block" href="<?= Url::toRoute(['site/list', 'school' => 2]) ?>">
						<img src="sysimg/school/fc.png" /><p>方寸山</p>
				</a>
		</div>
		<div class="category" data-type="pets" id="pets">
			<a class="block" href="<?= Url::toRoute(['site/list', 'category' => 4, 'level' => 0]) ?>">
				<img src="sysimg/pets/2.png">
				<p>0级</p>
			</a>
			<a class="block" href="<?= Url::toRoute(['site/list', 'category' => 4, 'level' => 65]) ?>">
				<img src="sysimg/pets/30.png">
				<p>65级</p>
			</a>
			<a class="block" href="<?= Url::toRoute(['site/list', 'category' => 4, 'level' => 80]) ?>">
				<img src="sysimg/pets/13.png">
				<p>80级</p>
			</a>
			<a class="block" href="<?= Url::toRoute(['site/list', 'category' => 4, 'level' => 85]) ?>">
				<img src="sysimg/pets/26.png">
				<p>85级</p>
			</a>
			<a class="block" href="<?= Url::toRoute(['site/list', 'category' => 4, 'level' => 95]) ?>">
				<img src="sysimg/pets/21.png">
				<p>95级</p>
			</a>
			<a class="block" href="<?= Url::toRoute(['site/list', 'category' => 4, 'level' => 105]) ?>">
				<img src="sysimg/pets/1.png">
				<p>105级</p>
			</a>
		</div>
		<div class="category" data-type="arm" id="arm">
			<a class="block" href="<?= Url::toRoute(['site/list', 'category' => 5, 'level' => 70]) ?>">
				<img src="sysimg/arm/8.png">
				<p>70级</p>
			</a>
			<a class="block" href="<?= Url::toRoute(['site/list', 'category' => 5, 'level' => 90]) ?>">
				<img src="sysimg/arm/21.png">
				<p>90级</p>
			</a>
			<a class="block" href="<?= Url::toRoute(['site/list', 'category' => 5, 'level' => 100]) ?>">
				<img src="sysimg/arm/66.png">
				<p>100级</p>
			</a>
		</div>
		<div class="category" data-type="defence" id="defence">
			<a class="block" href="<?= Url::toRoute(['site/list', 'category' => 3, 'level' => 70]) ?>">
				<img src="sysimg/def/8.png">
				<p>70级</p>
			</a>
			<a class="block" href="<?= Url::toRoute(['site/list', 'category' => 3, 'level' => 90]) ?>">
				<img src="sysimg/def/65.png">
				<p>90级</p>
			</a>
			<a class="block" href="<?= Url::toRoute(['site/list', 'category' => 3, 'level' => 100]) ?>">
				<img src="sysimg/def/33.png">
				<p>100级</p>
			</a>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$(".category[data-type=role]").show();
		$("#list li").click(function(){
			var category = $(this).data("type");
			$(".category").hide();
			$(".category[data-type=" + category + "]").show();
		});
	});
</script>