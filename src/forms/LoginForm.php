<?php

namespace app\basic\forms;

use app\basic\models\UserModels;
use yii\base\Model;
use yii\helpers\Yii;

/**
 * LoginForm is the model behind the login form Web Application Basic.
 *
 * @property User|null $user This property is read-only.
 **/
class LoginForm extends Model
{
	public $username;
	public $password;
	public $rememberMe = false;
	public $verifyCode;
 
    private $_User = null;

	/**
     * rules
     *
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
	 * validatePassword
	 * This method serves as the inline validation for password.
	 *
	 * @param string $attribute the attribute currently being validated.
	 **/
	public function validatePassword(string $attribute)
	{
		if (!$this->hasErrors()) {
			$this->_User = $this->getUser();
			if (!$this->_User || !$this->_User->validatePassword($this->password)) {
				$this->addError($attribute, Yii::t('basic', 'Incorrect username or password.'));
			}
		}
	}

	/**
     * getUser
     * Finds user by [[username]].
     *
	 * @return UserModels|null|true
	 **/
	public function getUser()
	{
 		if ($this->_User === null) {
            $this->_User = new UserModels();
			$this->_User = $this->_User->findByUsername($this->username);
		}

		return $this->_User;
	}
}
