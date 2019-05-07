<?php

use yii\helpers\Yii;

class AboutCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/site/about');
    }
    
    public function aboutPageTest(AcceptanceTester $I)
    {
        $I->wantTo('ensure that about page works.');
        $I->see(Yii::t('basic', 'About'), 'h1');
    }
}
