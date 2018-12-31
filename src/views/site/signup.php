<?php

/**
 * signup is the view Web Application Basic.
 **/

use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

$this->title = $this->app->t('basic', 'Signup');
$this->params['breadcrumbs'][] = $this->title;

?>

<?= Html::beginTag('div', ['class' => 'site-signup']) ?>

	<?= Html::tag('h1', '<b>' . Html::encode($this->title) . '</b>', ['class' => 'text-center c-grey-900 mb-40']) ?>

	<?= Html::beginTag('p', ['class' => 'text-center mb-4']) ?>
		<?= $this->app->t('basic', 'Please fill out the following fields to signup.') ?>
	<?= Html::endTag('p') ?>

	<?php $form = ActiveForm::begin([
		'id' => 'form-signup',
		'layout' => 'horizontal',
		'fieldConfig' => [
			'template' => '{input}{label}{hint}{error}',
				'horizontalCssClasses' => [
					'label' => '',
					'offset' => '',
					'wrapper' => '',
					'error' => 'text-center',
					'hint' => '',
				],
			'options' => ['class' => 'form-label-group'],
		],
		'options' => ['class' => 'form-signup'],
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
		  
		<?= $form->field($model, 'email')->textInput([
				'oninput' => 'this.setCustomValidity("")',
				'oninvalid' => 'this.setCustomValidity("' . $this->app->t('basic', 'Enter Email Here') . '")',
				'placeholder' => $this->app->t('basic', 'Email'),
				'required' => true,
				'tabindex' => '2',
			])->label('<b>' . $this->app->t('basic', 'Email') . '</b>') ?>

		<?= $form->field($model, 'password')->passwordInput([
				'oninput' => 'this.setCustomValidity("")',
				'oninvalid' => 'this.setCustomValidity("' . $this->app->t('basic', 'Enter Password Here') . '")',
				'placeholder' => $this->app->t('basic', 'Password'),
				'required' => true,
				'tabindex' => '3',
			])->label('<b>' . $this->app->t('basic', 'Password') . '</b>') ?>

		<?= $form->field($model, 'verifyCode', [
				'labelOptions' => ['id' => 'verifyCode'],
			])->widget(Captcha::class, [
				'template' => '{input}<div class="text-center">' . '<b>' .
					$this->app->t('basic', 'Captcha Code') . ':' . '</b>' . '{image}</div>',
				'options' => [
					'class' => 'form-control',
					'for' => 'captcha',
					'oninput' => 'this.setCustomValidity("")',
					'oninvalid' => 'this.setCustomValidity("' . $this->app->t('basic', 'Enter Captcha Code Here') . '")',
					'placeholder' => $this->app->t('basic', 'Captcha Code'),
					'required' => true,
					'style' => 'margin-bottom:10px',
					'tabindex' => '4',
				],
			])->label('<b>' . $this->app->t('basic', 'Captcha Code') . '</b>') ?>
	
		<?= Html::beginTag('div', ['class' => 'form-group']) ?>
			<?= Html::submitButton($this->app->t('basic', 'Signup'), [
				'class' => 'btn btn-lg btn-primary btn-block', 'name' => 'login-button', 'tabindex' => '5',
			]) ?>
		<?= Html::endTag('div') ?>

	<?php ActiveForm::end() ?>

<?php echo Html::endTag('div');
