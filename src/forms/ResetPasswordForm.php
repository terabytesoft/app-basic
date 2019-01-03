<?php

namespace app\basic\forms;

use app\basic\models\UserModels;
use yii\base\Model;

/**
 * ResetPasswordForm is the model behind the reset password form Web Application Basic.
 **/
class ResetPasswordForm extends Model
{
	public $password;

    private $_User;

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
     * resetPassword
	 * Resets password.
	 *
     * @param string $token.
     * @param int $passwordResetTokenExpire password reset token.
	 * @return bool if password was reset.
	 **/
	public function resetPassword($token, int $passwordResetTokenExpire)
	{
        $this->_User = new UserModels();
        $this->_User = $this->_User->findByPasswordResetToken($token, $passwordResetTokenExpire);
		$this->_User->setPassword($this->password);
		$this->_User->removePasswordResetToken();

		return $this->_User->save(false);
	}
}
