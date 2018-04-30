<?php

namespace app\models;

use Yii;
use yii\helpers\Url;
use yii\base\Exception;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $name
 * @property string $mobile
 * @property string $password
 * @property integer $firsttime
 * @property integer $updatetime
 * @property string $ip
 */
class User extends \yii\db\ActiveRecord
{
	public $password1 = '';
	public $password2 = '';

	// 取得用户 ID
	public static function getId(){
		$userid = Yii::$app->session->get('userid');
		if(isset($userid)){
			return $userid;
		}
		else{
			return false;
		}
	}

	// 检查用户是否登录，如果登录返回用户对象，如果没登录返回false
	public static function checkLogin(){
		$userid = Yii::$app->session->get('userid');
		if(isset($userid)){
			$user = self::findOne($userid);
			if($user){
				return $user;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}

	public static function logout(){
		Yii::$app->session->remove('userid');
	}

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'user';
	}


	// 关联UserRole表
	public function getUserRole(){
		return $this->hasMany(UserRole::className(), ['userid' => 'id']);
	}


    /*
    */
	public static function login($loginForm){
		$user = self::find()->where(['mobile'	=> $loginForm->mobile])->one();
		if($user){
			Yii::$app->session->set('userid', $user->id);
			$user->updatetime	= date("Y-m-d H:i:s");
			$user->ip			= Yii::$app->request->userIP;
			$user->save();
			return $user;
		}
		else{
			$user = new User();
			$user->name			= $loginForm->mobile;
			$user->password		= "1";
			$user->mobile 		= $loginForm->mobile;
			$user->firsttime 	= date("Y-m-d H:i:s");
			$user->updatetime	= date("Y-m-d H:i:s");
			$user->ip			= Yii::$app->request->userIP;
			$user->save();
			Yii::$app->session->set('userid', $user->id);
			return $user;
		}
	}

	public function changePassword($userLoad){
		if($this->password != md5($userLoad->password)){
			throw new Exception('原始密码不对');
		}
		if($userLoad->password1 == $userLoad->password2){
			$this->password = md5($userLoad->password1);
			if($this->save()){
				return true;
			}
			else{
				throw new Exception('新密码保存失败');
			}
		}
		else{
			throw new Exception('两次输入不一致');
		}
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			//[['name', 'mobile', 'password', 'firsttime', 'updatetime', 'ip'], 'required'],
			[['name', 'mobile', 'password', 'firsttime', 'updatetime', 'ip'], 'required'],
			[['password', 'password1', 'password2'], 'required', 'on' => 'changepassword'],
			[['firsttime', 'updatetime'], 'safe'],
			[['name', 'mobile'], 'string', 'max' => 16],
			[['password'], 'string', 'max' => 64],
			[['ip'], 'string', 'max' => 32]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => '姓名',
			'mobile' => '手机号',
			'password' => '密码',
			'firsttime' => '首次登陆',
			'updatetime' => '最后登陆',
			'ip' => 'IP地址',
			'password1'	=> '新密码',
			'password2'	=> '确认新密码',
		];
	}
}
