<?php

/* @var $this yii\web\View */

	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\widgets\LinkPager;
	use app\models\User;
	use app\models\Community;
	use app\models\District;
	use app\models\School;

$this->title = '列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
	
		.list{
			font-size:0.9rem;			
		}
		.list, .list tr, .list td{
			border:0px;
		}
		td{
			padding:5px 10px;
		}
		.last-tr td{
			border-bottom:1px solid orangered;
			padding-bottom:15px;
		}
		.orange{
			color:orangered;
		}
</style>

<div class="site-about">
    <div>
	<?php
		if(!$equipments){
			echo '还没有任何信息';
		}
		else{
			echo "<table class='list'>\n";
			foreach($equipments as $e){
				echo '<tr>';
					echo '<td>';
					echo '<a href="' . Url::toRoute(['site/show', 'id' => $e->id]) . '">';
					echo '(' . $e->id . ')';
					echo ($e->discuss=="0" ? '不议价' : '可议价') . ' ';
					echo $e->os . ' ';
					echo District::findOne($e->district)->big . ' ';
					echo District::findOne($e->district)->name . ' ';
					echo $e->bind . ' ';
					echo $e->level . '级 ';
					echo ($e->sex ==0 ? '女': '男') . ' ';
					echo School::findOne($e->school)->name . ' ';
					echo $e->monster . '神兽 ';
					echo $e->note . $e->note;
					echo '</a>';
					echo '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td class="orange">';
						echo $e->os . ' | ';
						echo District::findOne($e->district)->big . ' | ';
						echo District::findOne($e->district)->name . ' | ';
						echo School::findOne($e->school)->name . ' | ';
						echo $e->bind;
					echo '</td>';
				echo '</tr>';
				echo '<tr class="last-tr">';
					echo '<td>';
					echo '<span class="orange">￥'. $e->price . '.00</span>';
					echo "</td>";
				echo "</tr>\n";
			}
			echo '</table>';
			echo LinkPager::widget(['pagination' => $pagination,]);
		}
		?>
	</div>
</div>
