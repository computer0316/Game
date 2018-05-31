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
use app\models\School;
use app\models\Pets;
use app\models\Arm;
use app\models\Role;
use app\models\Defence;
use app\models\Condition;

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

    public function actionReadme(){
    	return $this->render('readme');
    }

    public function actionArticle($id = 0){
    	return $this->render('a' . $id);
    }

	public function actionSearch($add=''){
		$model = new Search();
		if($model->load(yii::$app->request->post())){

		$condition = $this->condition(Arm::className(), $model->text);
		$condition = Condition::join($condition, $this->condition(School::className(), $model->text));
		$condition = Condition::join($condition, $this->condition(District::className(), $model->text));
		$condition = Condition::join($condition, $this->condition(Defence::className(), $model->text));
		$condition = Condition::join($condition, $this->condition(Pets::className(), $model->text));
		$condition = Condition::join($condition, $this->condition(Role::className(), $model->text));

		$query	= Equipment::find()->where($condition);
		$count	= $query->count();
		$pagination = new Pagination(['totalCount' => $count]);
		$pagination->pageSize = 15;
		$equipments	= $query->offset($pagination->offset)
					->where($condition)
					->limit($pagination->limit)
					->orderBy('id desc')
					->all();

		//$this->layout = 'list';
		return $this->render('list', [
					'add'			=> $add,
					'equipments'	=> $equipments,
					'pagination'	=> $pagination,
					'Order'			=> '',
					'model'			=> new Equipment(['scenario' => 'seek']),
					'search'		=> new Search(),
					]);
		}
		else{
			return $this->redirect(Url::toRoute('site/list'));
		}
	}

		private function condition($class, $find){
			$items = $class::find()->where("name like '%" . $find . "%'")->column();
			$className = explode('\\', $class);
			$className = $className[2];
			$str = '(';
			if($items){
				foreach($items as $item){
					$str .= $item . ',';
				}
				$str = trim($str, ',');
				$str .= ')';
				return strtolower($className) . ' in ' . $str;
			}
			else{
				return '';
			}
		}

	public function actionList($priceOrder = '', $bind= '-1', $category = '', $discuss='', $level = '', $school = '', $price1='', $price='', $sex='', $os= '', $district=''){
		$model = new Equipment(['scenario' => 'seek']);
		$model->sex = 1;
		$condition = "";
		if($model->load(Yii::$app->request->post())){
			$bind		= Condition::setValue($model->bind);
			$category	= Condition::setValue($model->category);
			$discuss	= Condition::setValue($model->discuss);
			$level		= Condition::setValue($model->level);
			$school		= Condition::setValue($model->school);
			$price1		= Condition::setValue($model->price1);
			$price		= Condition::setValue($model->price);
			$sex		= Condition::setValue($model->sex);
			return $this->redirect(Url::current([
			//echo Url::current([
					'bind'		=> $bind,
					'category'	=> $category,
					'discuss'	=> $discuss,
					'level'		=> $level,
					'school'	=> $school,
					'price1'	=> $price1,
					'price'		=> $price,
					'sex'		=> $sex,
				]));
		}

			$condition = Condition::join($condition, Condition::create($bind, 	'bind'));
			$condition = Condition::join($condition, Condition::create($category, 'category'));
			$condition = Condition::join($condition, Condition::create($discuss, 'discuss'));
			$condition = Condition::join($condition, Condition::createLevel($level));
			$condition = Condition::join($condition, Condition::createSchool($school));
			$condition = Condition::join($condition, Condition::createPrice($price, $price1));
			$condition = Condition::join($condition, Condition::create($sex, 'sex'));
			$condition = Condition::join($condition, Condition::create($os, 		'os'));
			$condition = Condition::join($condition, Condition::create($district, 'district'));



		$order = '';
		if($priceOrder <> ''){
			if($priceOrder == 'up'){
				$order = 'price';
			}
			else{
				$order = 'price desc';
			}
		}
		else{
			$order = 'id desc';
		}
		$query	= Equipment::find()->where($condition);
		$count	= $query->count();
		$pagination = new Pagination(['totalCount' => $count]);
		$pagination->pageSize = 15;
		$equipments	= $query->offset($pagination->offset)
					->limit($pagination->limit)
					->orderBy($order)
					->all();
		//$this->layout = 'main';
		return $this->render('list', [
					'condition'		=> $condition,
					'Order'			=> $priceOrder,
					'equipments'	=> $equipments,
					'condition'		=> $condition,
					'pagination'	=> $pagination,
					'model'			=> $model,
					'search'		=> new Search(),
					]);
	}


	public function actionShow($id = 0){
		if($id>0){
			$e = Equipment::findOne($id);
			if($e){
				//$this->layout = 'list';
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
		return $this->render('category',[
			'search' => new Search(),
		]);
	}

}
