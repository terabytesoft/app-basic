<?php

namespace app\basic\forms;

use app\basic\models\UserModels;
use yii\base\Model;
use yii\helpers\Yii;

class ResetPasswordForm extends Model
{
	public $password;

	/**
	 * @var app\basic\models\UserModels
	 **/
    private $_user;

	/**
	 * Creates a form model given a token.
	 *
	 * @param string $token
	 * @param array $config name-value pairs that will be used to initialize the object properties
	 * @throws \yii\base\InvalidValueException if token is empty or not valid
	 **/
    public function __construct($token, $config = [])
	{
		$user = new UserModels();
		
		$user = $user->findByPasswordResetToken($token);

		parent::__construct($config);
	}

	/**
	 * {@inheritdoc}
	 **/
	public function rules()
	{
		return [
			['password', 'required'],
			['password', 'string', 'min' => 6],
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
			'password' => Yii::getApp()->t('basic', 'Password'),
		];
	}

	/**
	 * Resets password.
	 *
	 * @return bool if password was reset.
	 **/
	public function resetPassword()
	{
		$user = $this->_user;
		$user->setPassword($this->password);
		$user->removePasswordResetToken();

		return $user->save(false);
	}
}
