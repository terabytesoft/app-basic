<?php

namespace app\basic\forms;

use app\basic\models\UserModels;
use yii\base\Application;
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
    
    protected $app;

    /**
     * __construct
     *
     * @param Application $app
     **/
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

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
	 * atributeLabels
	 * Translate Atribute Labels.
     *
	 * @return array customized attribute labels.
	 **/
	public function attributeLabels()
	{
		return [
			'email' => $this->app->t('basic', 'Email'),
			'username' => $this->app->t('basic', 'Username'),
			'password' => $this->app->t('basic', 'Password'),
			'verifyCode' => $this->app->t('basic', 'VerifyCode'),
		];
	}

	/**
     * signup
	 * Signs user up.
	 *
	 * @return User|null the saved model or null if saving fails.
	 **/
	public function signup()
	{
		if (!$this->validate()) {
			return null;
		}

		$user = new UserModels();

		$user->username = $this->username;
		$user->email = $this->email;
		$user->setPassword($this->password);
		$user->generateAuthKey();

		return $user->save() ? $user : null;
	}
}
