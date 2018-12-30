<?php

namespace app\basic\forms;

use app\basic\models\UserModels;
use yii\base\Application;
use yii\base\Model;

/**
 * ResetPasswordForm is the model behind the reset password form Web Application Basic.
 **/
class ResetPasswordForm extends Model
{
	public $password;

    private $_user;

    protected $app;

    /**
     * __construct
     *
     * @param Application $app, string $token
     **/
    public function __construct(Application $app, string $token)
    {
        $this->_user = UserModels::findByPasswordResetToken($token);
    }

	/**
     * rules
     *
	 * @return array the validation rules.
	 **/
	public function rules()
	{
		return [
			['password', 'required'],
			['password', 'string', 'min' => 6],
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
			'password' => $this->app->t('basic', 'Password'),
		];
	}

	/**
     * resetPassword
	 * Resets password.
	 *
	 * @return bool if password was reset.
	 **/
	public function resetPassword()
	{
		$this->_user->setPassword($this->password);
		$this->_user->removePasswordResetToken();

		return $this->_user->save(false);
	}
}
