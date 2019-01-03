<?php

namespace app\basic\forms;

use app\basic\models\UserModels;
use yii\base\Model;

/**
 * SignupForm is the model behind the signup form Web Application Basic.
 **/
class SignupForm extends Model
{
	public $username;
	public $email;
	public $password;
    public $verifyCode;
    
    private $_User;

    /**
     * rules
     *
	 * @return array the validation rules.
	 **/
	public function rules()
	{
		return [
			['username', 'trim'],
			['username', 'required'],
			['username', 'unique', 'targetClass' => 'app\basic\models\UserModels', 'message' => 'This username has already been taken.'],
			['username', 'string', 'min' => 2, 'max' => 255],
			['email', 'trim'],
			['email', 'required'],
			['email', 'email'],
			['email', 'string', 'max' => 255],
			['email', 'unique', 'targetClass' => 'app\basic\models\UserModels', 'message' => 'This email address has already been taken.'],
			['password', 'required'],
			['password', 'string', 'min' => 6],
			// verifyCode needs to be entered correctly
			//['verifyCode', \yii\captcha\CaptchaValidator::class],
		];
	}

	/**
     * signup
	 * Signs user up.
	 *
	 * @return UserModels|null the saved model or null if saving fails.
	 **/
	public function signup()
	{
		if (!$this->validate()) {
			return null;
		}

		$this->_User = new UserModels();
		$this->_User->username = $this->username;
		$this->_User->email = $this->email;
		$this->_User->setPassword($this->password);
		$this->_User->generateAuthKey();

		return $this->_User->save() ? $this->_User : null;
	}
}
