<?php

/**
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 *
 *        @link: https://github.com/terabytesoft/app-basic
 *      @author: Wilmer Arámbula <terabytesoftw@gmail.com>
 *   @copyright: (c) TERABYTE SOFTWARE SA
 *       @forms: models[ContactForm]
 *       @since: 0.0.1
 *         @yii: 3.0
 **/

namespace app\basic\forms;

use yii\base\Model;
use yii\helpers\Yii;
use yii\mail\MailerInterface;

/**
 * ContactForm is the model behind the contact form.
 **/
class ContactForm extends Model
{
	public $name;
	public $email;
	public $subject;
	public $body;
	public $verifyCode;

	/**
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
	 * @return array customized attribute labels
	 **/
	public function attributeLabels()
	{
		return [
			'body' => Yii::getApp()->t('basic', 'Body'),
			'email' => Yii::getApp()->t('basic', 'Email'),
			'name' => Yii::getApp()->t('basic', 'Name'),
			'password' => Yii::getApp()->t('basic', 'Password'),
			'subject' => Yii::getApp()->t('basic', 'Subject'),
			'verifyCode' => Yii::getApp()->t('basic', 'VerifyCode'),
		];
	}

	/**
	 * Sends an email to the specified email address using the information collected by this model.
	 * @param string $email the target email address
	 * @return bool whether the model passes validation
	 **/
	public function contact(string $email, MailerInterface $mailer)
	{
		if ($this->validate()) {
			$mailer->compose()
				->setTo($email)
				->setFrom([$this->email => $this->name])
				->setSubject($this->subject)
				->setTextBody($this->body)
				->send();
			return true;
		}
		return false;
	}
}
