<?php

namespace app\basic\forms;

use app\basic\models\UserModels;
use yii\base\Model;
use yii\helpers\Yii;

class ResetPasswordForm extends Model
{
	public $password;

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
    	$user = new UserModels;
		$user->setPassword($this->password);
		$user->removePasswordResetToken();

		return $user->save(false);
	}
}
