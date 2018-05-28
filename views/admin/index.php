<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use backend\models\BaseRole;
use backend\models\BaseAuthority;
use backend\components\TableWidget;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = '用户管理';
	$this->params['breadcrumbs'][] = ['label' => '管理首页', 'url' => ['']];
	$this->params['breadcrumbs'][] = $this->title;
?>
<style>
td{
	padding:10px 15px;
}
</style>
<div class="content">
<?php

?>
</div>
