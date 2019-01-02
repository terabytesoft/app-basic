<?php

namespace app\basic\controllers;

use app\basic\forms\ContactForm;
use app\basic\forms\LoginForm;
use app\basic\forms\PasswordResetRequestForm;
use app\basic\forms\ResetPasswordForm;
use app\basic\forms\SignupForm;
use app\basic\models\UserModels;
use yii\captcha\CaptchaAction;
use yii\exceptions\InvalidArgumentException;
use yii\base\Model;
use yii\mail\MailerInterface;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\ErrorAction;
use yii\web\Response;
use yii\web\filters\AccessControl;
use yii\web\filters\VerbFilter;

/**
 * SiteController is the controller Web Application Basic.
 **/
class SiteController extends Controller
{
    private $_User;

	/**
     * behaviors
     *
	 * @return array behaviors config.
	 **/
	public function behaviors()
	{
		return [
			'access' => [
				'__class' => AccessControl::class,
				'only' => ['logout'],
				'rules' => [
					[
						'actions' => ['logout'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'__class' => VerbFilter::class,
				'actions' => [
					'logout' => ['POST'],
				],
			],
		];
	}

	/**
     * actions
     *
	 * @return array actions config.
	 **/
	public function actions()
	{
		return [
			'error' => [
				'__class' => ErrorAction::class,
			],
			'captcha' => [
				'__class' => CaptchaAction::class,
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}

	/**
     * actionIndex
	 * Displays homepage.
	 *
	 * @return string
	 **/
	public function actionIndex()
	{
		return $this->render('index');
	}

	/**
     * actionLogin
	 * Login action.
	 *
	 * @return Response|string
	 **/
	public function actionLogin()
	{
		if (!$this->app->user->isGuest) {
			return $this->goHome();
		}

		$model = new LoginForm();

		if ($model->load($this->app->request->post()) && $model->validate()) {
            $this->login($model);
			return $this->goBack();
		}

		$model->password = '';

		return $this->render('login', [
			'model' => $model,
		]);
	}

	/**
     * actionLogout
	 * Logout action.
	 *
	 * @return Response
	 **/
	public function actionLogout()
	{
		$this->app->user->logout();

		return $this->goHome();
	}

	/**
     * actionContact
	 * Displays contact page.
	 *
	 * @return Response|string
	 **/
	public function actionContact()
	{
        $model = new ContactForm();

		if ($model->load($this->app->request->post()) && $model->validate()) {
            $this->sendContact($this->app->params['adminEmail'], $this->app->mailer, $model);
			$this->app->session->setFlash('contactFormSubmitted');
			return $this->refresh();
		}

		return $this->render('contact', [
			'model' => $model,
		]);
	}

	/**
     * actionAbout
	 * Displays about page.
	 *
	 * @return string
	 **/
	public function actionAbout()
	{
		return $this->render('about');
	}

	/**
     * actionSignup
	 * Signs user up.
	 *
	 * @return mixed
	 **/
	public function actionSignup()
	{
		$model = new SignupForm();

		if ($model->load($this->app->request->post())) {
			if ($this->_User = $model->signup()) {
				if ($this->app->getUser()->login($this->_User)) {
					return $this->goHome();
				}
			}
		}

		return $this->render('signup', [
			'model' => $model,
		]);
	}

	/**
     * actionRequestPasswordReset
	 * Requests password reset.
	 *
	 * @return mixed
	 **/
	public function actionRequestPasswordReset()
	{
		$model = new PasswordResetRequestForm();

		if ($model->load($this->app->request->post()) && $model->validate()) {
			if ($this->sendResetPassword($this->app->mailer, $model)) {
				$this->app->session->setFlash(
                    'success',
                    $this->app->t('basic', 'Check your email for further instructions.')
                );
				return $this->goHome();
			}
			$this->app->session->setFlash(
                'error',
                $this->app->t('basic', 'Sorry, we are unable to reset password for the provided email address.')
            );
		}

		return $this->render('requestPasswordResetToken', [
			'model' => $model,
		]);
	}

	/**
     * actionResetPassword
	 * Resets password.
	 *
	 * @param string $token
	 * @return mixed
	 * @throws BadRequestHttpException
	 **/
	public function actionResetPassword($token)
	{
        try {
			$model = new ResetPasswordForm();
		} catch (InvalidArgumentException $e) {
			throw new BadRequestHttpException($e->getMessage());
		}

        $user = new UserModels();
        $tokenExpire = $this->app->params['user.passwordResetTokenExpire'];

		if (empty($token) || !is_string($token)) {
			$this->app->session->setFlash('danger', $this->app->t('basic', 'Password reset token cannot be blank.'));
			return $this->goHome();
		}
          
		if (!$user->findByPasswordResetToken($token, $tokenExpire)) {
			$this->app->session->setFlash('danger', $this->app->t('basic', 'Wrong password reset token.'));
			return $this->goHome();
		}

		if ($model->load($this->app->request->post()) && $model->validate() && $model->resetPassword($token, $tokenExpire)) {
			$this->app->session->setFlash('success', $this->app->t('basic', 'New password saved.'));
			return $this->goHome();
		}

		return $this->render('resetPassword', [
			'model' => $model,
		]);
    }

	/**
     * login
	 * Logs in a user using the provided username and password.
     *
     * @param Model $model.
	 * @return bool whether the user is logged in successfully.
	 **/
	public function login(Model $model)
	{
		return $this->app->user->login($model->getUser(), $model->rememberMe ? 3600 * 24 * 30 : 0);
	}

    /**
     * sendContactForm
	 * Sends an email to the specified email address using the information collected by this model.
     *
	 * @param string $email the target email address.
     * @param MailerInterface $mailer.
     * @param Model $model.
	 * @return bool whether the model passes validation.
	 **/
	public function sendContact(string $email, MailerInterface $mailer, Model $model)
	{
		$mailer->compose()
		    ->setTo($email)
			->setFrom([$model->email => $model->name])
			->setSubject($model->subject)
			->setTextBody($model->body)
			->send();
    }
    
	/**
     * sendResetPassword
	 * Sends an email with a link, for resetting the password.
     *
     * @param MailerInterface $mailer.
     * @param Model $model.
	 * @return bool whether the email was send.
	 **/
	public function sendResetPassword(MailerInterface $mailer, Model $model)
	{
        $this->_User = new UserModels();

		$this->_User = $this->_User->findOne([
			'status' => $this->_User::STATUS_ACTIVE,
			'email' => $model->email,
		]);

		if (!$this->_User) {
			return false;
		}

		if (!$this->_User->isPasswordResetTokenValid(
            $this->_User->password_reset_token,
            $this->app->params['user.passwordResetTokenExpire']
        )) {
			$this->_User->generatePasswordResetToken();
			if (!$this->_User->save()) {
				return false;
			}
		}

        return $mailer->compose(
			['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
			['user' => $this->_User]
		)
		->setFrom([$this->app->params['adminEmail'] => $this->app->name . ' robot'])
		->setTo($model->email)
		->setSubject('Password reset for ' . $this->app->name)
		->send();
	}
}
