<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use yii\helpers\Url;
	use yii\widgets\LinkPager;
	use yii\captcha\Captcha;
	use yii\helpers\ArrayHelper;
	use app\models\Community;
	use yii\helpers\VarDumper;

	// 客户信息窗体

?>
	<div class="form1">
		<div class="form">
			<span id="logintitle">房屋交换系统用户注册</span>

			<?php
				$form = ActiveForm::begin(['id' => 'clientform']);
			?>
				<?= $form->field($user, 'mobile')->textInput(['autofocus' => true]) ?>

				<?= $form->field($user, 'name')->textInput() ?>

				<?= $form->field($user, 'identification')->textInput() ?>

				<?php
					$arr = ArrayHelper::map(Community::find()->all(), 'id', 'name');
					$arr = array_merge(['请选择小区'], $arr);
					echo $form->field($user, 'communityid')->dropDownList($arr);
				?>

				<?= $form->field($user, 'verifyCode')->widget(Captcha::className(),[
																			'captchaAction'	=> 'user/captcha',
                                        									'imageOptions'	=> ['class' => 'captcha'],
                                        									]);
                                        									?>

				<div class="form-group button-group">

					<?= Html::submitButton('注&nbsp;册', ['class' => 'submit']) ?>
					<span>已经注册？点<a href="?r=user/login">这里</a>登录</span>

				</div>

				<?php
					ActiveForm::end();
				?>
		</div>
	</div>
