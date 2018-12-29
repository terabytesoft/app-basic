<?php

namespace app\basic\forms;

use app\basic\models\UserModels;
use yii\base\Model;
use yii\helpers\Yii;

/**
 * @property User|null $user This property is read-only.
 **/
class LoginForm extends Model
{
	public $username;
	public $password;
	public $rememberMe = false;
	public $verifyCode;

    private $_user = false;

	/**
	 * @return array the validation rules.
	 **/
	public function rules()
	{
		return [
			// username and password are both required
			[['username', 'password'], 'required'],
			// rememberMe must be a boolean value
			['rememberMe', 'boolean'],
			// password is validated by validatePassword()
			['password', 'validatePassword'],
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
			'username' => Yii::getApp()->t('basic', 'Username'),
			'password' => Yii::getApp()->t('basic', 'Password'),
			'rememberMe' => Yii::getApp()->t('basic', 'RememberMe'),
			'verifyCode' => Yii::getApp()->t('basic', 'VerifyCode'),
		];
	}

	/**
	 * Validates the password.
	 * This method serves as the inline validation for password.
	 *
	 * @param string $attribute the attribute currently being validated
	 * @param array $params the additional name-value pairs given in the rule
	 **/
	public function validatePassword($attribute, $params)
	{
		if (!$this->hasErrors()) {
			$user = $this->getUser();
			if (!$user || !$user->validatePassword($this->password)) {
				$this->addError($attribute, Yii::getApp()->t('basic', 'Incorrect username or password.'));
			}
		}
	}

	/**
	 * Logs in a user using the provided username and password.
	 * @return bool whether the user is logged in successfully
	 **/
	public function login()
	{
		if ($this->validate()) {
			return Yii::getApp()->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
		}

		return false;
	}

	/**
	 * Finds user by [[username]].
	 *
	 * @return User|null|true
	 **/
	public function getUser()
	{
		$user = new UserModels();

		if ($this->_user === false) {
			$this->_user = $user->findByUsername($this->username);
		}

		return $this->_user;
	}
}
