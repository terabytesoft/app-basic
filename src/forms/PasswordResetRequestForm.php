<?php

namespace app\basic\forms;

use app\basic\models\UserModels;
use yii\base\Model;
use yii\helpers\Yii;

/**
 * PasswordResetRequestForm is the model behind the password reset request form Web Application Basic.
 **/
class PasswordResetRequestForm extends Model
{
    public $email;
  
	/**
     * rules
     *
	 * @return array the validation rules.
	 **/
	public function rules()
	{
		return [
			['email', 'trim'],
			['email', 'required'],
			['email', 'email'],
			['email', 'exist',
				'targetClass' => UserModels::class,
				'filter' => ['status' => UserModels::STATUS_ACTIVE],
				'message' => Yii::t('basic', 'There is no user with this email address.'),
			],
		];
	}
}
