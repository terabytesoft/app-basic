<?php

/**
 * requestpasswordresettoken is the view Web Application Basic.
 **/

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

$this->title = $this->app->t('basic', 'Request password reset');
$this->params['breadcrumbs'][] = $this->title;

?>

<?= Html::beginTag('div', ['class' => 'site-request-password-reset']) ?>

	<?= Html::tag('h1', '<b>' . Html::encode($this->title) . '</b>', ['class' => 'text-center c-grey-900 mb-40']) ?>

	<?= Html::beginTag('p', ['class' => 'text-center mb-4']) ?>
		<?= $this->app->t('basic', 'Please fill out your email. A link to <b>reset password</b> will be sent there.') ?>
	<?= Html::endTag('p') ?>

	<?php $form = ActiveForm::begin([
		'id' => 'request-password-reset-form',
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
		'options' => ['class' => 'form-request-password'],
		'validateOnType' => false,
		'validateOnChange' => false, ]) ?>

        <?= $form->field($model, 'email')->textInput([
            	'autofocus' => true,
			    'oninput' => 'this.setCustomValidity("")',
			    'oninvalid' => 'this.setCustomValidity("' . $this->app->t('basic', 'Enter Email Here') . '")',
			    'placeholder' => $this->app->t('basic', 'Email'),
			    'required' => true,
			    'tabindex' => '1',
			])->label('<b>' . $this->app->t('basic', 'Email') . '</b>') ?>  

		<?= Html::beginTag('div', ['class' => 'form-group']) ?>
			<?= Html::submitButton($this->app->t('basic', 'Send'), [
					'class' => 'btn btn-lg btn-primary btn-block', 'name' => 'contact-button', 'tabindex' => '2',
				]) ?>
		<?= Html::endTag('div') ?>

	<?php ActiveForm::end() ?>
		
<?php echo Html::endTag('div');
