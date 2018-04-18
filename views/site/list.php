<?php

/* @var $this yii\web\View */

	use yii\helpers\Html;
	use yii\widgets\LinkPager;
	use app\models\User;
	use app\models\Community;
	use app\models\District;
	use app\models\School;

$this->title = '列表';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-about">
    <div>
	<?php
		if(!$equipments){
			echo '还没有任何信息';
		}
		else{
			echo "<table class='list'>\n";
			foreach($equipments as $e){
				echo '<tr><td>';
				echo '(' . $e->id . ')';
				echo ($e->discuss=="0" ? '不议价' : '可议价') . ' ';
				echo $e->os . ' ';
				echo District::findOne($e->district)->big . ' ';
				echo District::findOne($e->district)->name . ' ';
				echo $e->type . ' ';
				echo $e->level . '级 ';
				echo ($e->sex ==0 ? '女': '男') . ' ';
				echo School::findOne($e->school)->name . ' ';
				echo $e->monster . '神兽 ';
				echo '</td></tr><tr class="last-tr"><td>';
				echo '价格：￥'. $e->price;
				echo "</td></tr>\n";
			}
			echo '</table>';
			echo LinkPager::widget(['pagination' => $pagination,]);
		}
		?>
	</div>
</div>
