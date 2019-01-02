<?php

namespace app\basic\forms;

use yii\base\Model;
use yii\helpers\Yii;

/**
 * ContactForm is the model behind the contact form Web Application Basic.
 **/
class ContactForm extends Model
{
	public $name;
	public $email;
	public $subject;
	public $body;
	public $verifyCode;

	/**
     * rules
     *
	 * @return array the validation rules.
	 **/
	public function rules()
	{
		return [
			// name, email, subject and body are required
			[['name', 'email', 'subject', 'body'], 'required'],
			// email has to be a valid email address
			['email', 'email'],
			// verifyCode needs to be entered correctly
			//['verifyCode', \yii\captcha\CaptchaValidator::class],
		];
	}

	/**
     * attributeLabels
	 * Translate Atribute Labels.
     *
	 * @return array customized attribute labels.
	 **/
	public function attributeLabels()
	{
		return [
			'body' => Yii::t('basic', 'Body'),
			'email' => Yii::t('basic', 'Email'),
			'name' => Yii::t('basic', 'Name'),
			'password' => Yii::t('basic', 'Password'),
			'subject' => Yii::t('basic', 'Subject'),
			'verifyCode' => Yii::t('basic', 'VerifyCode'),
		];
	}
}
