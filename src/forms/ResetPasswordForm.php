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
}
