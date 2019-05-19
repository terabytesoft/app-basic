<?php

namespace AppBasic;

use DMS\PHPUnitExtensions\ArraySubset\Assert;
use TerabyteSoft\App\Basic\Forms\ContactForm;

class ContactFormTest extends \Codeception\Test\Unit
{
    private $_model;
    private $_rules;

    public function testContactFormRules()
    {
        // test rules form model.
        $this->_model = new ContactForm();
        $this->_rules = [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
        ];
        Assert::AssertArraySubset($this->_model->rules(), $this->_rules, true);
    }
}
