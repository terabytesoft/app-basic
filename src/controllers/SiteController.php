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
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\ErrorAction;
use yii\web\Response;
use yii\web\filters\AccessControl;
use yii\web\filters\VerbFilter;

class SiteController extends Controller
{
	/**
	 * {@inheritdoc}
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
	 * {@inheritdoc}
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
	 * Displays homepage.
	 *
	 * @return string
	 **/
	public function actionIndex()
	{
		return $this->render('index');
	}

	/**
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

		if ($model->load($this->app->request->post()) && $model->login()) {
			return $this->goBack();
		}

		$model->password = '';

		return $this->render('login', [
			'model' => $model,
		]);
	}

	/**
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
	 * Displays contact page.
	 *
	 * @return Response|string
	 **/
	public function actionContact()
	{
		$model = new ContactForm();

		if ($model->load($this->app->request->post()) && $model->contact($this->app->params['adminEmail'], $this->app->get('mailer'))) {
			$this->app->session->setFlash('contactFormSubmitted');

			return $this->refresh();
		}

		return $this->render('contact', [
			'model' => $model,
		]);
	}

	/**
	 * Displays about page.
	 *
	 * @return string
	 **/
	public function actionAbout()
	{
		return $this->render('about');
	}

	/**
	 * Signs user up.
	 *
	 * @return mixed
	 **/
	public function actionSignup()
	{
		$model = new SignupForm();

		if ($model->load($this->app->request->post())) {
			if ($user = $model->signup()) {
				if ($this->app->getUser()->login($user)) {
					return $this->goHome();
				}
			}
		}

		return $this->render('signup', [
			'model' => $model,
		]);
	}

	/**
	 * Requests password reset.
	 *
	 * @return mixed
	 **/
	public function actionRequestPasswordReset()
	{
		$model = new PasswordResetRequestForm();

		if ($model->load($this->app->request->post()) && $model->validate()) {
			if ($model->sendEmail($this->app->get('mailer'))) {
				$this->app->session->setFlash('success', $this->app->t('basic', 'Check your email for further instructions.'));
				return $this->goHome();
			}
			$this->app->session->setFlash('error', $this->app->t('basic', 'Sorry, we are unable to reset password for the provided email address.'));
		}

		return $this->render('requestPasswordResetToken', [
			'model' => $model,
		]);
	}

	/**
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
    
		if (empty($token) || !is_string($token)) {
			$this->app->session->setFlash('danger', $this->app->t('basic', 'Password reset token cannot be blank.'));
			return $this->goHome();
		}
   
		if (!$user->findByPasswordResetToken($token)) {
			$this->app->session->setFlash('danger', $this->app->t('basic', 'Wrong password reset token.'));
			return $this->goHome();
		}

		if ($model->load($this->app->request->post()) && $model->validate() && $model->resetPassword()) {
			$this->app->session->setFlash('success', $this->app->t('basic', 'New password saved.'));
			return $this->goHome();
		}

		return $this->render('resetPassword', [
			'model' => $model,
		]);
	}
}
