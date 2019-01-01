<?php

/**
 * login is the view Web Application Basic.
 **/

use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

$this->title = $this->app->t('basic', 'Login');
$this->params['breadcrumbs'][] = $this->title;

?>

<?= Html::beginTag('div', ['class' => 'site-login']) ?>

	<?= Html::tag('h1', '<b>' . Html::encode($this->title) . '</b>', ['class' => 'text-center c-grey-900 mb-40']) ?>

	<?= Html::beginTag('p', ['class' => 'text-center mb-4']) ?>
		<?= $this->app->t('basic', 'Please fill out the following fields to login.') ?>
	<?= Html::endTag('p') ?>

	<?php $form = ActiveForm::begin([
		'id' => 'login-form',
		'layout' => 'default',
		'fieldConfig' => [
			'template' => '{input}{label}{hint}{error}',
			'horizontalCssClasses' => [
				'label' => '',
				'offset' => '',
				'wrapper' => '',
				'error' => 'text-center',
                'hint' => '',
                'field' => 'form-label-group',
			],
			'options' => ['class' => 'form-label-group'],
		],
		'options' => ['class' => 'form-signin'],
		'validateOnType' => false,
		'validateOnChange' => false, ]) ?>

		<?= $form->field($model, 'username')->textInput([
				'autofocus' => true,
				'oninput' => 'this.setCustomValidity("")',
				'oninvalid' => 'this.setCustomValidity("' . $this->app->t('basic', 'Enter Username Here') . '")',
				'placeholder' => $this->app->t('basic', 'Username'),
				 'required' => true,
				'tabindex' => '1',
			])->label('<b>' . $this->app->t('basic', 'Username') . '</b>') ?>

		<?= $form->field($model, 'password')->passwordInput([
				'oninput' => 'this.setCustomValidity("")',
				'oninvalid' => 'this.setCustomValidity("' . $this->app->t('basic', 'Enter Password Here') . '")',
				'placeholder' => $this->app->t('basic', 'Password'),
				'required' => true,
				'tabindex' => '2',
			])->label('<b>' . $this->app->t('basic', 'Password') . '</b>') ?>

		<?= $form->field($model, 'rememberMe', [
				'options' => ['tabindex' => '3'],
			])->checkbox() ?>
	
		<?= $form->field($model, 'verifyCode', [
				'labelOptions' => ['id' => 'verifyCode'],
			])->widget(Captcha::class, [
				'template' => '{input}<div class="text-center">' . '<b>' .
					$this->app->t('basic', 'Captcha Code') . ':' . '</b>' . '{image}</div>',
				'options' => [
					'class' => 'form-control',
					'oninput' => 'this.setCustomValidity("")',
					'oninvalid' => 'this.setCustomValidity("' . $this->app->t('basic', 'Enter Captcha Code Here') . '")',
					'placeholder' => $this->app->t('basic', 'Captcha Code'),
					'required' => true,
					'style' => 'margin-bottom:10px',
					'tabindex' => '4',
				],
			])->label('<b>' . $this->app->t('basic', 'Captcha Code') . '</b>') ?>
		
		<?= Html::beginTag('div', ['class' => 'text-center mb-4', 'style' => 'color:#999;margin:1em 0']) ?>
			<?= $this->app->t('basic', 'If you forgot your password you can') . ' ' .
				Html::a(
					$this->app->t('basic', 'reset it here'),
					['site/request-password-reset']
				) ?>			
		<?= Html::endTag('div') ?>

		<?= Html::beginTag('div', ['class' => 'text-center mb-4', 'style' => 'color:#999;margin:1em 0']) ?>
			<?= $this->app->t('basic', 'You may login with <strong>admin/123456</strong> or <strong>demo/123456</strong>') ?>
		<?= Html::endTag('div') ?>

		<?= Html::submitButton($this->app->t('basic', 'Login'), [
			'class' => 'btn btn-lg btn-primary btn-block', 'name' => 'login-button', 'tabindex' => '5',
		]) ?>

	<?php ActiveForm::end(); ?>

<?php echo Html::endTag('div');
