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

class AdminController extends Controller
{
	public function actionIndex(){
		$user = User::checkLogin();
    	if(!$user){
    		return $this->redirect(Url::toRoute('user/login'));
    	}
		$this->layout = 'admin';
		return $this->render('index');
	}

	public function actionMine(){
		$user = User::checkLogin();
    	if(!$user){
    		return $this->redirect(Url::toRoute('user/login'));
    	}
		$this->layout = 'admin';
		return $this->render('mine');
	}

	public function actionChpass(){
		$user = User::checkLogin();
    	if(!$user){
    		return $this->redirect(Url::toRoute('user/login'));
    	}
		$this->layout = 'admin';
		return $this->render('chpass', [
			'user' => $user,
		]);
	}

	public function actionDelete($id){
		$user = User::checkLogin();
    	if(!$user){
    		return $this->redirect(Url::toRoute('user/login'));
    	}
    	if($user->admin == 1 ){
    		$e = Equipment::findOne($id);
    		$e->delete($id);
    		return $this->redirect(Url::toRoute("admin/list"));
		}
	}

	public function actionList($big='不限', $priceOrder = '', $bind= '-1', $category = '', $discuss='', $level = '', $school = '', $price1='', $price='', $sex='', $os= '', $district=''){
		$user = User::checkLogin();
    	if(!$user){
    		return $this->redirect(Url::toRoute('user/login'));
    	}
    	if($user->admin == 1 ){
			$this->layout = 'admin';
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

				$condition = Condition::join($condition, Condition::createServer($big));
				$servers = District::find()->where("big = '" . $big . "'")->all();

				$condition = Condition::join($condition, Condition::create($bind, 	'bind'));
				$condition = Condition::join($condition, Condition::create($category, 'category'));
				$condition = Condition::join($condition, Condition::create($discuss, 'discuss'));
				$condition = Condition::join($condition, Condition::createLevel($level));
				$condition = Condition::join($condition, Condition::createSchool($school));
				$condition = Condition::join($condition, Condition::createPrice($price, $price1));
				$condition = Condition::join($condition, Condition::create($model->sex, 'sex'));
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
						'servers'		=> $servers,
						'condition'		=> $condition,
						'Order'			=> $priceOrder,
						'equipments'	=> $equipments,
						'condition'		=> $condition,
						'pagination'	=> $pagination,
						'model'			=> $model,
						'search'		=> new Search(),
						]);
		}
	}

	public function actionUser(){
		$user = User::checkLogin();
    	if(!$user){
    		return $this->redirect(Url::toRoute('user/login'));
    	}
    	if($user->admin == 1 ){
			$this->layout = 'admin';
			return $this->render('user');
		}
	}

    public function actionCreate($add){
    	$user = User::checkLogin();
    	if(!$user){
    		return $this->redirect(Url::toRoute('user/login'));
    	}
    	if($user->admin == 1 ){
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
	            return $this->redirect(Url::toRoute([
	            	'admin/create',
	            	'id' 	=> $model->id,
	            	'add'	=> $add,
	            ]));
	    		//yii::$app->session->setFlash('message', 'success');
	    	}
	        return $this->render('create', [
	            'model' => $model,
	            'upload'=> $upload,
	            'add'	=> $add,
	        ]);
	    }
    }

    public function actionSms(){
    	$user = User::checkLogin();
    	if(!$user){
    		return $this->redirect(Url::toRoute('user/login'));
    	}
    	if($user->admin == 1 ){
    		return $this->render('sms');
		}
    }
}