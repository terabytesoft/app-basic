<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Yii;

$resetLink = Url::to(['site/reset-password', 'token' => $user->password_reset_token], true);

?>

<?= Html::beginTag('div', ['class' => 'password-reset']) ?>

	<?= Html::endTag('p') ?>
		Hello <?= Html::encode($user->username) ?>,
	<?= Html::endTag('p') ?>

	<?= Html::endTag('p') ?>
		Follow the link below to reset your password:
	<?= Html::endTag('p') ?>

	<?= Html::endTag('p') ?>
		<?= Html::a(Html::encode($resetLink), $resetLink) ?>
	<?= Html::endTag('p') ?>

<?= Html::endTag('div') ?>
