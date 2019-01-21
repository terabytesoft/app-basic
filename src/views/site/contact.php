<?php

/**
 * contact
 *
 * View web application basic
 **/

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;

$this->title = $this->title = $this->app->t('basic', 'Contact');
$this->params['breadcrumbs'][] = $this->title;

?>

<?= Html::beginTag('div', ['class' => 'site-contact']) ?>

	<?= Html::tag('h1', '<b>' . Html::encode($this->title) . '</b>', ['class' => 'text-center c-grey-900 mb-40']) ?>

	<?php if ($this->app->session->hasFlash('contactFormSubmitted')) : ?>
    	<?= Html::beginTag('div', ['class' => 'alert alert-success']) ?>
			<?= Html::tag('p', $this->app->t('basic', 'Thank you for contacting us. We will respond to you as soon ' .
				'as possible.'))
			?>
		<?= Html::endTag('div') ?>

		<?= Html::beginTag('p') ?>
			<?= $this->app->t('basic', 'Note that if you turn on the Yii debugger, you should be able ' .
				'to view the mail message on the mail panel of the debugger.') . '</br></br>'
			?>
			<?php if ($this->app->get('mailer')->useFileTransport) : ?>
				<?= $this->app->t('basic', 'Because the application is in development mode, the email is not sent but ' .
					'saved as a file under:') . '</br>' ?>
            	<?=	'<code>' . $this->app->getAlias($this->app->get('mailer')->fileTransportPath) . '</code>' . '</br></br>' ?>
				<?= $this->app->t('basic', 'Please configure the <code>useFileTransport</code> property of the <code>mail</code> ' .
					'application component to be false to enable email sending.') ?>
			<?php endif ?>
		<?= Html::endTag('p') ?>
	<?php else : ?>
		<?= Html::beginTag('p', ['class' => 'text-center mb-4']) ?>
			<?= $this->app->t('basic', 'If you have business inquiries or other questions,<br/> please fill out the ' .
				'following form to contact us.<br/> <b>Thank you</b>.')
			?>
		<?= Html::endTag('p') ?>

		<?php $form = ActiveForm::begin([
			'id' => 'contact-form',
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
			'options' => ['class' => 'form-contact'],
			'validateOnType' => false,
			'validateOnChange' => false,
		]) ?>

			<?= $form->field($model, 'name')
				->textInput([
			        'autofocus' => true,
			        'oninput' => 'this.setCustomValidity("")',
			        'oninvalid' => 'this.setCustomValidity("' . $this->app->t('basic', 'Enter Username Here') . '")',
			        'placeholder' => $this->app->t('basic', 'Username'),
			        'required' => (YII_ENV === 'test') ? false : true,
			        'tabindex' => '1',
				])
				->label($this->app->t('basic', 'Username'))
			?>

			<?= $form->field($model, 'email')
				->textInput([
				    'oninput' => 'this.setCustomValidity("")',
				    'oninvalid' => 'this.setCustomValidity("' . $this->app->t('basic', 'Enter Email Here') . '")',
				    'placeholder' => $this->app->t('basic', 'Email'),
				    'required' => (YII_ENV === 'test') ? false : true,
				    'tabindex' => '2',
				])
				->label($this->app->t('basic', 'Email'))
			?>

			<?= $form->field($model, 'subject')
				->textInput([
					'oninput' => 'this.setCustomValidity("")',
					'oninvalid' => 'this.setCustomValidity("' . $this->app->t('basic', 'Enter Subject Here') . '")',
					'placeholder' => $this->app->t('basic', 'Subject'),
					'required' => (YII_ENV === 'test') ? false : true,
					'tabindex' => '3',
				])
				->label($this->app->t('basic', 'Subject'))
			?>

			<?= $form->field($model, 'body')
				->textarea([
					'oninput' => 'this.setCustomValidity("")',
					'oninvalid' => 'this.setCustomValidity("' . $this->app->t('basic', 'Enter Body Here') . '")',
					'placeholder' => $this->app->t('basic', 'Body'),
					'required' => (YII_ENV === 'test') ? false : true,
					'rows' => 6,
					'tabindex' => '4',
				])
				->label($this->app->t('basic', 'Body'))
			?>

			<?= $form->field($model, 'verifyCode', [
				    'labelOptions' => ['id' => 'verifyCode'],
				])->widget(
					Captcha::class,
					[
						'template' => '{input}<div class="text-center">' . '<b>' .
							$this->app->t('basic', 'Captcha Code') . ':' . '</b>' . '{image}</div>',
						'options' => [
							'class' => 'form-control',
							'oninput' => 'this.setCustomValidity("")',
							'oninvalid' => 'this.setCustomValidity("' . $this->app->t('basic', 'Enter Captcha Code Here') . '")',
							'placeholder' => $this->app->t('basic', 'Captcha Code'),
							'required' => (YII_ENV === 'test') ? false : true,
							'style' => 'margin-bottom:10px',
							'tabindex' => '5',
						],
					]
				)
				->label($this->app->t('basic', 'Captcha Code'))
			?>

			<?= Html::beginTag('div', ['class' => 'form-group']) ?>
				<?= Html::submitButton($this->app->t('basic', 'Contact us'), [
						'class' => 'btn btn-lg btn-primary btn-block', 'name' => 'contact-button', 'tabindex' => '6',
                    ]) ?>
			<?= Html::endTag('div') ?>

		<?php ActiveForm::end() ?>

	<?php endif ?>

<?php echo Html::endTag('div');
