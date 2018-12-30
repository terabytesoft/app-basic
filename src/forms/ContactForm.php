<?php

namespace app\basic\forms;

use yii\base\Application;
use yii\base\Model;
use yii\mail\MailerInterface;

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
			'body' => $this->app->t('basic', 'Body'),
			'email' => $this->app->t('basic', 'Email'),
			'name' => $this->app->t('basic', 'Name'),
			'password' => $this->app->t('basic', 'Password'),
			'subject' => $this->app->t('basic', 'Subject'),
			'verifyCode' => $this->app->t('basic', 'VerifyCode'),
		];
	}

	/**
     * contact
	 * Sends an email to the specified email address using the information collected by this model.
     *
	 * @param string $email the target email address.
	 * @return bool whether the model passes validation.
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
