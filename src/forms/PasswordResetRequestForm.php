<?php

namespace app\basic\forms;

use app\basic\models\UserModels;
use yii\base\Application;
use yii\base\Model;
use yii\mail\MailerInterface;

/**
 * PasswordResetRequestForm is the model behind the password reset request form Web Application Basic.
 **/
class PasswordResetRequestForm extends Model
{
    public $email;

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
			['email', 'trim'],
			['email', 'required'],
			['email', 'email'],
			['email', 'exist',
				'targetClass' => UserModels::class,
				'filter' => ['status' => UserModels::STATUS_ACTIVE],
				'message' => $this->app->t('basic', 'There is no user with this email address.'),
			],
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
			'email' => $this->app->t('basic', 'Email'),
		];
	}

	/**
     * sendEmail
	 * Sends an email with a link, for resetting the password.
	 *
	 * @return bool whether the email was send.
	 **/
	public function sendEmail(MailerInterface $mailer)
	{
		$this->_user = UserModels::findOne([
			'status' => UserModels::STATUS_ACTIVE,
			'email' => $this->email,
		]);

		if (!$this->_user) {
			return false;
		}

		if (!UserModels::isPasswordResetTokenValid($this->_user->password_reset_token)) {
			$this->_user->generatePasswordResetToken();
			if (!$this->_user->save()) {
				return false;
			}
		}

        return $mailer->compose(
			['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
			['user' => $this->_user]
		)
		->setFrom([$this->app->params['adminEmail'] => $this->app->name . ' robot'])
		->setTo($this->email)
		->setSubject('Password reset for ' . $this->app->name)
		->send();
	}
}
