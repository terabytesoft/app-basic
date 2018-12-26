<?php

/**
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 *
 *        @link: https://github.com/terabytesoft/app-basic
 *      @author: Wilmer Arámbula <terabytesoftw@gmail.com>
 *   @copyright: (c) TERABYTE SOFTWARE SA
 *       @forms: models[SignupForm]
 *       @since: 0.0.1
 *         @yii: 3.0
 **/

namespace app\basic\forms;

use app\basic\forms\UserForm;
use yii\base\Model;
use yii\helpers\Yii;

class SignupForm extends Model
{
	public $username;
	public $email;
	public $password;
	public $verifyCode;

	/**
	 * {@inheritdoc}
	 **/
	public function rules()
	{
		return [
			['username', 'trim'],
			['username', 'required'],
			['username', 'unique', 'targetClass' => 'app\basic\forms\User', 'message' => 'This username has already been taken.'],
			['username', 'string', 'min' => 2, 'max' => 255],
			['email', 'trim'],
			['email', 'required'],
			['email', 'email'],
			['email', 'string', 'max' => 255],
			['email', 'unique', 'targetClass' => 'app\basic\forms\User', 'message' => 'This email address has already been taken.'],
			['password', 'required'],
			['password', 'string', 'min' => 6],
			// verifyCode needs to be entered correctly
			//['verifyCode', \yii\captcha\CaptchaValidator::class],
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
			'username' => Yii::getApp()->t('basic', 'Username'),
			'password' => Yii::getApp()->t('basic', 'Password'),
			'verifyCode' => Yii::getApp()->t('basic', 'VerifyCode'),
		];
	}

	/**
	 * Signs user up.
	 *
	 * @return User|null the saved model or null if saving fails
	 **/
	public function signup()
	{
		if (!$this->validate()) {
			return null;
		}

		$user = new UserForm();

		$user->username = $this->username;
		$user->email = $this->email;
		$user->setPassword($this->password);
		$user->generateAuthKey();

		return $user->save() ? $user : null;
	}
}
