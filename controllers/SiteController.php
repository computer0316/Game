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
use app\models\Equipment;
use app\models\User;
use app\models\Picture;
use app\models\District;
use app\models\UploadForm;
use app\models\Download;
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

    public function actionCreate(){
    	$model = new Equipment();
    	$upload = new UploadForm();

    	if($model->load(yii::$app->request->post()) && $model->save()){
        	$upload->imageFiles = UploadedFile::getInstances($upload, 'imageFiles');
            $filepaths = $upload->upload(1312);

            foreach($filepaths as $filepath){
				$pic = new Picture();
				$pic->create($model->id, $filepath);
            }
    		yii::$app->session->setFlash('message', 'success');
    	}
        return $this->render('create', [
            'model' => $model,
            'upload'=> $upload,
        ]);
    }

	public function actionList(){

		$query	= Equipment::find();
		$count	= $query->count();
		$pagination = new Pagination(['totalCount' => $count]);
		$pagination->pageSize = 15;
		$equipments	= $query->offset($pagination->offset)
					->limit($pagination->limit)
					->all();
		return $this->render('list', [
					'equipments'		=> $equipments,
					'pagination'	=> $pagination,
					]);
	}

	public function actionShow($id = 0){
		if($id>0){
			$article = Article::findOne($id);
			return $this->render('show', ['article' => $article]);
		}
		else{
			$error	= "文章没找到";
		}

	}

	// 用于添加500个虚拟数据
	public function actionAddtemp(){
		echo '<meta charset="utf-8">';
		die();
		$type = ['手机账号', '签合同账号', '无绑定账号', '有绑定账号'];
		$os  = ['苹果专区', '安卓官服', '苹果安卓互通区'];
		for($i=0;$i<500;$i++){
			$e = new Equipment();
			$e->price	= rand(2500, 48000);
			$e->os		= $os[rand(0,2)];
			$e->district= rand(1,162);
			$e->level	= rand(0,109);
			$e->type	= $type[rand(0,3)];
			$e->sex		= rand(0,1);
			$e->school	= rand(1,9);
			$e->monster	= rand(1,100);
			$e->discuss	= rand(0,1);
			$e->note	= "&nbsp;";
			$e->updatetime= date("Y-m-d H:i:s", time());
			if($e->save()){
				echo District::findOne($e->district)->name . '<br />';
			}
			else{
				var_dump($e);
				die();
			}

		}
	}

/***************************************************
***************************************************
***************************************************/



    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
		return $this->render('index');
    }

	public function actionAdd(){
		$Exchange	= new Exchange();
		$post		= Yii::$app->request->post();
		if($Exchange->load($post)){
			$Exchange->userid		= 1;
			$Exchange->communityid	= 1;
			$Exchange->address		= '10-2-1102';
			$Exchange->updatetime = date("Y-m-d H:i:s");
			//VarDumper::Dump($Exchange);
			if($Exchange->save()){
				Yii::$app->session->setFlash('message', '信息登记成功');
				return $this->render('add', ['Exchange' => $Exchange]);
			}
			else{
				VarDumper::Dump($Exchange->errors);
			}
		}
		else{
			return $this->render('add', ['Exchange' => $Exchange]);
		}
	}

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
