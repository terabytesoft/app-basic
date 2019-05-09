<?php

namespace TerabyteSoft\App\Basic\Controllers;

use TerabyteSoft\App\Basic\Forms\ContactForm;
use yii\base\Model;
use Yiisoft\Yii\Captcha\CaptchaAction;
use yii\web\Controller;
use yii\web\ErrorAction;
use yii\web\filters\AccessControl;
use yii\web\filters\VerbFilter;
use yii\web\Response;

/**
 * SiteController.
 *
 * Controller web application basic
 **/
class SiteController extends Controller
{
    /**
     * actions.
     *
     * @return array actions config
     **/
    public function actions(): array
    {
        return [
            'error' => [
                '__class' => ErrorAction::class,
                'view' => '@TerabyteSoft/App/Basic/Views/Site/Error.php'
             ],
            'captcha' => [
                '__class'         => CaptchaAction::class,
                'fixedVerifyCode' => 'testme',
            ],
        ];
    }

    /**
     * actionIndex.
     *
     * displays homepage
     *
     * @return string
     **/
    public function actionIndex(): string
    {
        return $this->render('Index');
    }

    /**
     * actionAbout.
     *
     * displays about page
     *
     * @return string
     **/
    public function actionAbout(): string
    {
        return $this->render('About');
    }

    /**
     * actionContact.
     *
     * displays contact page
     *
     * @return response|string
     **/
    public function actionContact()
    {
        $model = new ContactForm();

        if ($model->load($this->getApp()->request->post()) && $model->validate()) {
            $this->sendContact($this->getApp()->params['adminEmail'], $model);
            $this->getApp()->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }

        return $this->render('Contact', [
            'model' => $model,
        ]);
    }

    /**
     * sendContactForm.
     *
     * sends an email to the specified email address using the information collected by this model
     *
     * @param string $email the target email address
     * @param Model  $model
     *
     * @return bool whether the model passes validation
     **/
    public function sendContact(string $email, Model $model): void
    {
        $this->getApp()->mailer->compose()
            ->setTo($email)
            ->setFrom([$model->email => $model->name])
            ->setSubject($model->subject)
            ->setTextBody($model->body)
            ->send();
    }
}
