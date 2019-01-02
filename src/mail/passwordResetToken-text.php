<?php

use yii\helpers\Url;
use yii\helpers\Yii;

$resetLink = Url::to(['site/reset-password', 'token' => $user->password_reset_token], true);

?>

Hello <?= $user->username ?>,

Follow the link below to reset your password:

<?= $resetLink ?>
