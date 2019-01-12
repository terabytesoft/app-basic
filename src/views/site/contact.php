<?php

/**
 * contact is the view Web Application Basic.
 **/

use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

$this->title = $this->title = $this->getApp()->t('basic', 'Contact');
$this->params['breadcrumbs'][] = $this->title;

?>

<?= Html::beginTag('div', ['class' => 'site-contact']) ?>

	<?= Html::tag('h1', '<b>' . Html::encode($this->title) . '</b>', ['class' => 'text-center c-grey-900 mb-40']) ?>

	<?php if ($this->getApp()->session->hasFlash('contactFormSubmitted')): ?>
    	<?= Html::beginTag('div', ['class' => 'alert alert-success']) ?>
			<?= Html::tag('p', $this->getApp()->t('basic', 'Thank you for contacting us. We will respond to you as soon ' .
				'as possible.'))
			?>
		<?= Html::endTag('div') ?>

		<?= Html::beginTag('p') ?>
			<?= $this->getApp()->t('basic', 'Note that if you turn on the Yii debugger, you should be able ' .
				'to view the mail message on the mail panel of the debugger.') . '</br></br>'
			?>
			<?php if ($this->getApp()->get('mailer')->useFileTransport): ?>
				<?= $this->getApp()->t('basic', 'Because the application is in development mode, the email is not sent but ' .
					'saved as a file under:') . '</br>' ?> 
            	<?=	'<code>' . $this->getApp()->getAlias($this->getApp()->get('mailer')->fileTransportPath) . '</code>' . '</br></br>' ?>
				<?= $this->getApp()->t('basic', 'Please configure the <code>useFileTransport</code> property of the <code>mail</code> ' .
					'application component to be false to enable email sending.') ?>				
			<?php endif ?>
		<?= Html::endTag('p') ?>
	<?php else: ?>
		<?= Html::beginTag('p', ['class' => 'text-center mb-4']) ?>
			<?= $this->getApp()->t('basic', 'If you have business inquiries or other questions,<br/> please fill out the ' .
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
			'validateOnChange' => false, ]) ?>

			<?= $form->field($model, 'name')->textInput([
			        'autofocus' => true,
			        'oninput' => 'this.setCustomValidity("")',
			        'oninvalid' => 'this.setCustomValidity("' . $this->getApp()->t('basic', 'Enter Username Here') . '")',
			        'placeholder' => $this->getApp()->t('basic', 'Username'),
			        'required' => (YII_ENV === 'test') ? false : true,
			        'tabindex' => '1',
			    ])->label('<b>' . $this->getApp()->t('basic', 'Username') . '</b>') ?>

            <?= $form->field($model, 'email')->textInput([
				    'oninput' => 'this.setCustomValidity("")',
				    'oninvalid' => 'this.setCustomValidity("' . $this->getApp()->t('basic', 'Enter Email Here') . '")',
				    'placeholder' => $this->getApp()->t('basic', 'Email'),
				    'required' => (YII_ENV === 'test') ? false : true,
				    'tabindex' => '2',
				])->label('<b>' . $this->getApp()->t('basic', 'Email') . '</b>') ?>  

            <?= $form->field($model, 'subject')->textInput([
					'oninput' => 'this.setCustomValidity("")',
					'oninvalid' => 'this.setCustomValidity("' . $this->getApp()->t('basic', 'Enter Subject Here') . '")',
					'placeholder' => $this->getApp()->t('basic', 'Subject'),
					'required' => (YII_ENV === 'test') ? false : true,
					'tabindex' => '3',
				])->label('<b>' . $this->getApp()->t('basic', 'Subject') . '</b>') ?>        

			<?= $form->field($model, 'body')->textarea([
					'oninput' => 'this.setCustomValidity("")',
					'oninvalid' => 'this.setCustomValidity("' . $this->getApp()->t('basic', 'Enter Body Here') . '")',
					'placeholder' => $this->getApp()->t('basic', 'Body'),
					'required' => (YII_ENV === 'test') ? false : true,
					'rows' => 6,
					'tabindex' => '4',
				])->label('<b>' . $this->getApp()->t('basic', 'Body') . '</b>') ?>

			<?= $form->field($model, 'verifyCode', [
				    'labelOptions' => ['id' => 'verifyCode'],
				])->widget(Captcha::class, [
					'template' => '{input}<div class="text-center">' . '<b>' .
						$this->getApp()->t('basic', 'Captcha Code') . ':' . '</b>' . '{image}</div>',
					'options' => [
						'class' => 'form-control',
						'oninput' => 'this.setCustomValidity("")',
						'oninvalid' => 'this.setCustomValidity("' . $this->getApp()->t('basic', 'Enter Captcha Code Here') . '")',
						'placeholder' => $this->getApp()->t('basic', 'Captcha Code'),
						'required' => (YII_ENV === 'test') ? false : true,
						'style' => 'margin-bottom:10px',
						'tabindex' => '5',
					],
			    ])->label('<b>' . $this->getApp()->t('basic', 'Captcha Code') . '</b>') ?>

			<?= Html::beginTag('div', ['class' => 'form-group']) ?>
				<?= Html::submitButton($this->getApp()->t('basic', 'Contact us'), [
						'class' => 'btn btn-lg btn-primary btn-block', 'name' => 'contact-button', 'tabindex' => '6',
                    ]) ?>
			<?= Html::endTag('div') ?>

		<?php ActiveForm::end() ?>

	<?php endif ?>

<?php echo Html::endTag('div');