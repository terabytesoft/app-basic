<?php

use yii\helpers\Yii;

$resetLink = Yii::getApp()->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);

?>

Hello <?= $user->username ?>,

Follow the link below to reset your password:

<?= $resetLink ?>
