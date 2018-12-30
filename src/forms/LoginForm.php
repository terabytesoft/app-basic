<?php

namespace app\basic\forms;

use app\basic\models\UserModels;
use yii\base\Application;
use yii\base\Model;

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

    private $_user;

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
	 * atributeLabels
	 * Translate Atribute Labels.
     *
	 * @return array customized attribute labels.
	 **/
	public function attributeLabels()
	{
		return [
			'username' => $this->app->t('basic', 'Username'),
			'password' => $this->app->t('basic', 'Password'),
			'rememberMe' => $this->app->t('basic', 'RememberMe'),
			'verifyCode' => $this->app->t('basic', 'VerifyCode'),
		];
	}

	/**
	 * validatePassword
	 * This method serves as the inline validation for password.
	 *
	 * @param string $attribute the attribute currently being validated.
	 * @param array $params the additional name-value pairs given in the rule.
	 **/
	public function validatePassword($attribute, $params)
	{
		if (!$this->hasErrors()) {
			$this->_user = $this->getUser();
			if (!$this->_user || !$this->_user->validatePassword($this->password)) {
				$this->addError($attribute, $this->app->t('basic', 'Incorrect username or password.'));
			}
		}
	}

	/**
     * login
	 * Logs in a user using the provided username and password.
     *
	 * @return bool whether the user is logged in successfully.
	 **/
	public function login()
	{
		if ($this->validate()) {
			return $this->app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
		}

		return false;
	}

	/**
     * getUser
     * Finds user by [[username]].
     *
	 * @return User|null|true
	 **/
	public function getUser()
	{
 		if ($this->_user === null) {
			$this->_user = UserModels::findByUsername($this->username);
		}

		return $this->_user;
	}
}
