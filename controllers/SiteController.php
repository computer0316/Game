<?php

namespace app\controllers;

use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\Roc\Tools;
use app\models\Equipment;
use app\models\News;
use app\models\User;
use app\models\Picture;
use app\models\District;
use app\models\UploadForm;
use app\models\Download;
use app\models\Search;
use app\models\Pets;
use app\models\Arm;
use app\models\Defence;

class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

	public function actionTemp(){
		$items = Arm::find()->where('level > -1')->orderBy('level')->all();
		echo '<meta charset="utf-8">';
		foreach($items as $item){
			
			if($item){
				echo $item->level . ' ' . $item->img . ' '. $item->name . '<br />';
			}
			else{
				var_dump($item->errors);
				die();
			}
		}
	}

    public function actionArticle($id = 0){
    	return $this->render('know', [
    		'id' => $id,
    	]);
    }

    public function actionCreate($add){
    	$this->layout = 'admin';
    	$model = new Equipment();
    	$upload = new UploadForm();

    	if($model->load(yii::$app->request->post()) && $model->save()){
        	$upload->imageFiles = UploadedFile::getInstances($upload, 'imageFiles');
            $filepaths = $upload->upload(1312);

            foreach($filepaths as $filepath){
				$pic = new Picture();
				$pic->create($model->id, $filepath);
            }
            return $this->redirect(Url::toRoute(['site/show', 'id' => $model->id]));
    		//yii::$app->session->setFlash('message', 'success');
    	}
        return $this->render('create', [
            'model' => $model,
            'upload'=> $upload,
            'add'	=> $add,
        ]);
    }

	public function actionSearch(){
		$model = new Search();
		if($model->load(yii::$app->request->post())){
			
			$this->search(Arm::className(), $model->text)
			if($item){
				$equips = Equipment::find()->where(['arm' => $item->id])->all();
			}
		}
		else{
			return $this->redirect(Url::toRoute('site/list'));
		}
	}
		
		private function search($class, $find){
			$item = $class::find()->where('name like %' . $find . '%')->all();
			it($item){
				return Equipment::find()->where([$class => $item->id])->all();
			}
		}

	public function actionList($add= '', $category = '', $os= '', $district ='', $level = '', $bind= '', $school = ''){
		$model = new Equipment(['scenario' => 'seek']);
		$condition = "";
		if($model->load(Yii::$app->request->post())){
			$category	= $this->setVal($model->category);
			$district	= $this->setVal($model->district);
			$level		= $this->setLevel($model->level);
			$bind		= $this->setVal($model->bind);
			$school		= $this->setVal($model->school);

			$condition = $this->joinCondition($condition, $this->createCondition($model->sex, 'sex'));
			$condition = $this->joinCondition($condition, $this->createCondition($model->discuss, 'discuss'));
			$condition = $this->joinCondition($condition, $this->monster($model->monster1, $model->monster2));
		}

		$condition = $this->joinCondition($condition, $this->createCondition($level, 	'level'));
		$condition = $this->joinCondition($condition, $this->createCondition($category, 'category'));
		$condition = $this->joinCondition($condition, $this->createCondition($os, 		'os'));
		$condition = $this->joinCondition($condition, $this->createCondition($district, 'district'));
		$condition = $this->joinCondition($condition, $this->createCondition($bind, 	'bind'));
		$condition = $this->joinCondition($condition, $this->createCondition($school, 	'school'));

		$query	= Equipment::find()->where($condition);
		$count	= $query->count();
		$pagination = new Pagination(['totalCount' => $count]);
		$pagination->pageSize = 15;
		$equipments	= $query->offset($pagination->offset)
					->limit($pagination->limit)
					->orderBy('id desc')
					->all();
		$this->layout = 'list';
		return $this->render('list', [
					'add'			=> $add,
					'equipments'	=> $equipments,
					'condition'		=> $condition,
					'pagination'	=> $pagination,
					'model'			=> $model,
					'search'		=> new Search(),
					]);
	}

		private function setVal($value){
			if(isset($value) && $value <> ''){
				return $value;
			}
		}

		private function setLevel($value){
			if(isset($value) && $value <> ''){
				return $value;
			}
			else{
				return -1;
			}
		}


		private function price($price1, $price2){
			if($price1 <> '' && $price2 <> ''){
				return 'price > ' . $price1 . ' and price < ' . $price2;
			}
		}
		private function monster($monster1, $monster2){
			if($monster1 <> '' && $monster2 <> ''){
				return 'monster > '. $monster1 .' and ' . 'monster < ' . $monster2;
			}
		}
		private function createCondition($item, $name){
			if(isset($item) && $item <> ''){
				return $name . ' = ' . $item;
			}
		}
		
		private function joinCondition($old, $new){
			if($old <> '' && $new <> ''){
				return $old . ' and ' . $new;
			}
			if($old <> ''){
				return $old;
			}
			if($new <> ''){
				return $new;
			}
		}

	public function actionShow($id = 0){
		if($id>0){
			$e = Equipment::findOne($id);
			if($e){
				$this->layout = 'list';
				return $this->render('show', ['e' => $e]);
			}
		}
	}

	public function actionIndex(){
		$equi = Equipment::find()->orderBy('id desc')->limit(10)->all();
		$bests = Equipment::find()->where(['bestone' => 1])->orderBy('id desc')->all();
		return $this->render('index', [
			'equi' => $equi,
			'bests' => $bests,
			]);
	}

	public function actionCategory(){
		$this->layout = 'list';
		return $this->render('category',[
			'search' => new Search(),
		]);
	}

	// 用于添加500个虚拟数据
	public function actionAddtemp(){
		//die('用于填充虚拟数据');
		echo '<meta charset="utf-8">';
		ob_start();
		$note =["恢复（上限3%+200）的气血，对单人使用",
"恢复（上限6%+400）的气血，对单人使用",
"恢复（上限9%+600）的气血，对单人使用",
"恢复自身一定的MP，效果受自己的魔法上限影响",
"恢复自身大量的MP，效果受自己的魔法上限影响",
"恢复自身1/4的气血（最高不超过人物等级×12）",
"恢复自身1/2的气血（最高不超过人物等级×20）",
"恢复全体队友1/4的气血（最高不超过被恢复人的等级×12），对有低级鬼魂术的召唤兽无效",
"复活并恢复HP150点，只能对倒地状态的人物使用",
"复活并恢复1/2的气血（最高不超过人物等级×20），只能对倒地状态的人物使用",
"解除各种异常状态，如被封物理、魔法、中毒、混乱等",
"解除各种异常状态，并恢复1/4的气血（最高不超过人物等级×12）",
"解除全体队友的各种异常状态",
"解除全体队友的各种异常状态，并恢复每人15%的气血",
"减少敌方单人当前20%的HP",
"减少敌方单人当前20%的MP",
"减少敌方单人70点愤怒值",
"一定几率令对手在5回合内使用法术和特技的消耗增加。",
"提升队友的伤害力，效果持续到战斗结束",
"全体队友伤害力上升，效果持续到战斗结束",
"提升队友的防御力，效果持续到战斗结束",
"全体队友物理防御力上升，效果持续到战斗结束",
"提升队友的速度，效果持续到战斗结束",
"全体队友速度上升，效果持续到战斗结束",
"受到的法术伤害减半，效果为3回合",
"全体队友受到的法术伤害减半，效果为3回合",
"受到伤害时，将伤害的一半反作用给对方（作用于多人的法术除外），效果为5回合（每次反弹不超过人物等级×8）",
"5回合内敌人对自己使用的法术有一定几率失效",
"降低敌人的物理伤害力，效果持续到战斗结束",
"降低敌方全体的伤害力，效果持续到战斗结束",
"降低敌人的物理防御力，效果持续到战斗结束",
"降低敌方全体的物理防御力，效果持续到战斗结束",
"降低敌人的速度，效果持续到战斗结束",
"降低敌方全体的速度，效果持续到战斗结束",
"狂性大发，可以连续攻击两次",
"以临时提高伤害力攻击对手,适于对付防御高者",
"吸取对方当前20%的HP，不能对怪物BOSS使用",
"吸取对方当前30%的MP，不能对怪物BOSS使用",
"减少对方HP，最小伤害为50",
"可以攻击对方多人，最小伤害为50",
"物理攻击敌人，并减少对方和HP损失相同的MP",
"减少对方一定量的HP及MP，效果受对方魔法属性影响",
"减少对方全体一定量的HP及MP，效果受对方魔法属性影响",
"减少对方一定量的HP及MP，效果受自己力量属性影响",
"减少对方全体一定量的HP及MP，效果受对方力量属性影响",
"令敌全体队员各有一定几率处于某种异常状态",
"将自己受到的法术反作用给施法者（针对某些特殊情况下无效），效果持续两回合",
"抵御一切异常类、辅助类附加效果，效果持续四回合",
"复活所有队友并恢复全部气血，使用后自己的气血及气血上限将变为最大气血的10%，魔法变为0，不能复活鬼魂类的召唤兽",
"和对方交换状态，HP、MP、异常状态、辅助状态等，只能对玩家使用，使用时有一定几率失败。使用后需要休息1回合，如果自身气血低于20%，或对方气血在80%上时不能使用",
"给己方指定目标回复20%上限的MP。最高不超过目标等级*8。",
"给己方全体单位回复20%上限的MP。最高不超过目标等级*8。",
"给目标在接下来的回合中提升20%的速度，持续3回合。",
"减少敌单体同等于自己“魔力”属性的HP及MP。",
"减少敌全体同等于自己“魔力”属性/3的HP及MP。",
"给己方指定目标笼罩一个可抵御目标等级×6伤害的护甲，持续2个回合。（即笼罩该状态的目标在回合内所受的伤害会先被抵挡，回合到或抵挡伤害上限到则状态消失。）",
"给己方所有目标增加一个临时屏障，可抵御目标等级×5伤害，持续2个回合。（即笼罩该状态的目标在回合内所受的伤害会先被抵挡，回合到或抵挡伤害上限到则状态消失。）"];
		$defences	= Defence::find()->where('level>-1')->orderBy('level')->all();
		$pets		= Pets::find()->where('level>-1')->orderBy('level')->all();
		$arms		= Arm::find()->where('level>-1')->orderBy('level')->all();
		echo count($defences) . '--';
		echo count($pets) . '--';
		echo count($arms) . '--';

		for($i=0;$i<500;$i++){
			$e = new Equipment();
			$e->price	= rand(2500, 48000);
			$e->category	= rand(1,5);
			switch($e->category){
				case 1:
					$e->role = rand(1,18);
					break;
				case 2:
					$e->coin = rand(20000,200000);
					break;
				case 3:
					$def = $defences[rand(0, count($defences)-1)];
					$e->defence = $def->id ;
					$e->level	= $def->level;
					break;
				case 4:
					$pet = $pets[rand(0, count($pets)-1)];
					$e->pets	= $pet->id ;
					$e->level	= $pet->level;
					break;
				case 5:
					$arm = $arms[rand(0, count($arms)-1)];
					$e->arm		= $arm->id ;
					$e->level	= $arm->level;
					break;
			}
			$e->os		= rand(1,3);
			$e->district= rand(1,162);
			$e->bind	= rand(1,4);
			$e->sex		= rand(0,1);
			$e->school	= rand(1,9);
			$e->monster	= rand(1,100);
			$e->discuss	= rand(0,1);
			$e->note	= $note[rand(0,56)];
			$e->updatetime= date("Y-m-d H:i:s", time());
			if($e->save()){
				echo District::findOne($e->district)->name . '<br />';
				ob_flush();
				flush();
			}
			else{
				var_dump($e);
				die();
			}

		}
	}
}
