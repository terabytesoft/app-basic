<?php

namespace app\basic\forms;

use app\basic\models\UserModels;
use yii\base\Model;
use yii\helpers\Yii;
use yii\mail\MailerInterface;

class PasswordResetRequestForm extends Model
{
    public $email;
    
	/**
	 * {@inheritdoc}
	 **/
	public function rules()
	{
		return [
			['email', 'trim'],
			['email', 'required'],
			['email', 'email'],
			['email', 'exist',
				'targetClass' => UserModels::class,
				'filter' => ['status' => UserModels::STATUS_ACTIVE],
				'message' => Yii::getApp()->t('basic', 'There is no user with this email address.'),
			],
		];
	}

	/**
	 * atributeLabels.
	 *
	 * Translate Atribute Labels.
	 **/
	public function attributeLabels()
	{
		return [
			'email' => Yii::getApp()->t('basic', 'Email'),
		];
	}

	/**
	 * Sends an email with a link, for resetting the password.
	 *
	 * @return bool whether the email was send
	 **/
	public function sendEmail(MailerInterface $mailer)
	{
		$user = new UserModels();

		$user = $user->findOne([
			'status' => UserModels::STATUS_ACTIVE,
			'email' => $this->email,
		]);

		if (!$user) {
			return false;
		}

		if (!$user->isPasswordResetTokenValid($user->password_reset_token)) {
			$user->generatePasswordResetToken();
			if (!$user->save()) {
				return false;
			}
		}

        return $mailer->compose(
			['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
			['user' => $user]
		)
		->setFrom([Yii::getApp()->params['adminEmail'] => Yii::getApp()->name . ' robot'])
		->setTo($this->email)
		->setSubject('Password reset for ' . Yii::getApp()->name)
		->send();
	}
}
