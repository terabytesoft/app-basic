<?php

namespace AppBasic;

use AppBasic\AcceptanceTester;
use yii\helpers\Yii;

class AboutCest
{
    private $_translator;

    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/site/about');
    }

    public function aboutPageTest(AcceptanceTester $I)
    {
        $I->wantTo('ensure that about page works.');
        $I->expectTo('see page about.');
        $I->see(Yii::t('basic', 'About'), 'h1');
    }
}
