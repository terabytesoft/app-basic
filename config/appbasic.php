<?php

use yii\helpers\Yii;

return [
    //app basic options
    'app.basic.autor' => '©'.date('Y').'. '.Yii::t('AppBasic', 'TerabyteSoft SA - Wilmer Arambula.'),
    'app.basic.error.view.pathmap' => '@TerabyteSoft/App/Basic/Views/Site/Error.php',
    'app.basic.captcha.fixedVerifyCode' => 'TestMe',
    'app.basic.email' => 'admin@appbasic.com',
    'app.basic.id' => 'AppBasic',
    'app.basic.name' => 'My Project Basic',
    'app.basic.layout' => 'Main.php',
    'app.basic.menu.isguest' => [
        [
            'label' => Yii::t('AppBasic', 'About'),
            'url' => ['/site/about']
        ],
        [
            'label' => Yii::t('AppBasic', 'Contact'),
            'url' => ['/site/contact']
        ],
    ],
    'app.basic.menu.logged' => [
    ],
    'app.basic.theme.pathmap.layout' => '@TerabyteSoft/App/Basic/Views/Layouts',
    'app.basic.theme.pathmap.site' => '@TerabyteSoft/App/Basic/Views/Site',
    'app.basic.translator.basePath' => '@TerabyteSoft/App/Basic/Messages',
    'app.basic.translator.sourceLanguage' => 'en',
];
