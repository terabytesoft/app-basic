<?php

namespace TerabyteSoft\App\Basic\Forms;

use yii\base\Model;

/**
 * ContactForm.
 *
 * Model behind the contact form web application basic
 **/
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;

    /**
     * rules.
     *
     * @return array the validation rules
     **/
    public function rules(): array
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            //['verifyCode', \Yiisoft\Yii\Captcha\CaptchaValidator::class],
        ];
    }
}
