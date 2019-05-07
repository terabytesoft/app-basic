<?php

use DMS\PHPUnitExtensions\ArraySubset\Assert;
use TerabyteSoft\App\Basic\Forms\ContactForm;

class ContactFormTestCest extends \Codeception\Test\Unit
{
    private $_Model;
    private $_Rules;

    public function testContactFormRules()
    {
        // test rules form model.
        $this->_Model = new ContactForm();
        $this->_Rules = [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
        ];
        Assert::AssertArraySubset($this->_Model->rules(), $this->_Rules, true);
    }
}
