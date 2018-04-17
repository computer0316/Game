<?php

namespace app\controllers;

use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\Response;
use app\models\Equipment;
use app\models\User;
use app\models\Picture;
use yii\helpers\Url;
use app\models\UploadForm;

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

/***************************************************
***************************************************
***************************************************/

	public function actionList(){
//    	$userid = Yii::$app->session->get('userid');
//    	if(!isset($userid) && $userid <1){
//    		//Yii::$app->session->setFlash('message',"请先登录");
//    		return $this->redirect(Url::toRoute("user/login"));
//    	}


		$query	= Exchange::find();
		$count	= $query->count();
		$pagination = new Pagination(['totalCount' => $count]);
		$pagination->pageSize = 18;
		$exchanges	= $query->offset($pagination->offset)
					->limit($pagination->limit)
					->all();
		return $this->render('list', [
					'exchanges'		=> $exchanges,
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
