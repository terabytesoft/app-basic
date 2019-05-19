<?php

namespace AppBasic;

use AppBasic\AcceptanceTester;
use yii\helpers\Yii;

class ContactCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/site/contact');
    }

    public function contactPageTest(AcceptanceTester $I)
    {
        $I->wantTo('ensure that contact page works.');
        $I->see(Yii::t('basic', 'Contact'), 'h1');
    }

    public function contactSubmitFormEmptyDataTest(AcceptanceTester $I)
    {
        $I->amGoingTo('contact submit form with empty data.');
        $I->click('contact-button');
        $I->expectTo('see validations errors.');
        $I->see(Yii::t('basic', 'Name cannot be blank.'), '.invalid-feedback');
        $I->see(Yii::t('basic', 'Email cannot be blank.'), '.invalid-feedback');
        $I->see(Yii::t('basic', 'Subject cannot be blank.'), '.invalid-feedback');
        $I->see(Yii::t('basic', 'Body cannot be blank.'), '.invalid-feedback');
    }

    public function contactSubmitFormEmailWrongDataTest(AcceptanceTester $I)
    {
        $I->amGoingTo('contact submit form with email wrong.');
        $I->fillField('#contactform-name', 'tester');
        $I->fillField('#contactform-email', 'tester@example');
        $I->fillField('#contactform-subject', 'test subject');
        $I->fillField('#contactform-body', 'test content');
        $I->fillField('#contactform-verifycode', 'testme');
        $I->click('contact-button');
        $I->expectTo('Email is not a valid email address.');
        $I->see(Yii::t('basic', 'Email is not a valid email address.'), '.invalid-feedback');
    }

    public function contactSubmitFormSuccessDataTest(AcceptanceTester $I)
    {
        $I->amGoingTo('contact submit form with success data.');
        $I->fillField('#contactform-name', 'tester');
        $I->fillField('#contactform-email', 'tester@example.com');
        $I->fillField('#contactform-subject', 'test subject');
        $I->fillField('#contactform-body', 'test content');
        $I->fillField('#contactform-verifycode', 'testme');
        $I->click('contact-button');
        $I->expectTo('success.');
        $I->dontSeeElement('#contact-form');
        $I->see(Yii::t('basic', 'Thank you for contacting us. We will respond to you as soon as possible.'));
    }
}
