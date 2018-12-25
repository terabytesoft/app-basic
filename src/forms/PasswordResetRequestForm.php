<?php

/**
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 *
 *        @link: https://github.com/terabytesoft/app-basic
 *      @author: Wilmer Arámbula <terabytesoftw@gmail.com>
 *   @copyright: (c) TERABYTE SOFTWARE SA
 *       @forms: models[PasswordResetRequestForm]
 *       @since: 0.0.1
 *         @yii: 3.0
 **/

namespace app\basic\forms;

use app\basic\forms\User;
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
				'targetClass' => User::class,
				'filter' => ['status' => User::STATUS_ACTIVE],
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
		$user = new User();

		$user = $user->findOne([
			'status' => User::STATUS_ACTIVE,
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
