<?php

/**
 * resetpassword is the view Web Application Basic.
 **/

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;

?>

<?= Html::beginTag('div', ['class' => 'site-reset-password']) ?>

	<?= Html::tag('h1', '<b>' . Html::encode($this->title) . '</b>', ['class' => 'text-center c-grey-900 mb-40']) ?>

	<?= Html::beginTag('p', ['class' => 'text-center mb-4']) ?>
		<?= $this->app->t('basic', 'Please choose your <strong>new password:</strong>') ?>
	<?= Html::endTag('p') ?>

	<?php $form = ActiveForm::begin([
		'id' => 'reset-password-form',
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
		'options' => ['class' => 'form-reset-password'],
		'validateOnType' => false,
		'validateOnChange' => false, ]) ?>

		<?= $form->field($model, 'password')->passwordInput([
			'autofocus' => true,
			'oninput' => 'this.setCustomValidity("")',
			'oninvalid' => 'this.setCustomValidity("' . $this->app->t('basic', 'Enter Password Here') . '")',
			'placeholder' => $this->app->t('basic', 'Password'),
			'required' => true,
			'tabindex' => '1',
			])->label('<b>' . $this->app->t('basic', 'Password') . '</b>') ?>

		<?= Html::beginTag('div', ['class' => 'form-group']) ?>
			<?= Html::submitButton($this->app->t('basic', 'Save'), [
					'class' => 'btn btn-lg btn-primary btn-block', 'name' => 'contact-button', 'tabindex' => '2',
				]) ?>		
		<?= Html::endTag('div') ?>

	<?php ActiveForm::end() ?>

<?php echo Html::endTag('div');
