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
    		$pic = new Picture();
    		$pic->deletePics($id);
    		$e->delete($id);
    		return $this->redirect(Url::toRoute("admin/list"));
		}
	}

	// 设置或者取消加精（首页每日精品）
	public function actionBestone($id){
		$user = User::checkLogin();
    	if(!$user){
    		return $this->redirect(Url::toRoute('user/login'));
    	}
    	if($user->admin == 1 ){
    		$e = Equipment::findOne($id);
    		if($e->bestone ==0 ){
    			$e->bestone = 1;
    		}
    		else{
    			$e->bestone = 0;
    		}
    		$e->save();
    		return $this->redirect(Url::toRoute("admin/list"));
		}
	}

	public function actionList($big='0', $priceOrder = '', $bind= '-1', $category = '', $discuss='', $level = '', $school = '', $price1='', $price='', $sex='', $os= '', $district=''){
		$user = User::checkLogin();
    	if(!$user){
    		return $this->redirect(Url::toRoute('user/login'));
    	}
    	if($user->admin == 1 ){
			$this->layout = 'admin';
			$model = new Equipment(['scenario' => 'seek']);

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
			$model->bind		= $bind;
			$model->category	= $category;
			$model->discuss		= $discuss;
			$model->level		= $level;
			$model->school		= $school;
			$model->price1		= $price1;
			$model->price		= $price;
			$model->sex			= $sex;

			if($district == ''){
				$condition = Condition::join($condition, Condition::createBig($big));
			}

			$d_names = ['1' => '一区','2' => '二区','3' => '三区','4' => '四区','5' => '五区','6' => '六区','7' => '七区','8' => '八区','9' => '九区','10' => '十区','11' => '十一区','12' => '十二区','13' => '十三区','14' => '十四区','15' => '双平台','16' => '安卓混服'];
			$servers = [];
			if($big>0){
				$servers = District::find()->where("big = '" . $d_names[$big] . "'")->all();
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
				'os'			=> $os,
				'big'			=> $big,
				'district'		=> $district,
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
	            $filepaths = $upload->upload();

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
	    	switch($add){
        		case 'role':
        			 $model->category = 1;
        			break;
        		case 'coin':
        			 $model->category = 2;
        			break;
        		case 'defence':
        			 $model->category = 3;
        			break;
        		case 'pets':
        			 $model->category = 4;
        			break;
        		case 'arm':
        			 $model->category = 5;
        			break;
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