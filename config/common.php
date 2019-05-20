<?php

return [
    'app' => [
        'basePath'            => dirname(__DIR__).'/src',
        'controllerNamespace' => 'TerabyteSoft\App\Basic\Controllers',
        'id' => $params['app.basic.id'],
        'name' => $params['app.basic.name'],
    ],
    'mailer' => [
        '__class'          => Yiisoft\Yii\SwiftMailer\Mailer::class,
        'fileTransportPath' => '@public/@runtime/mail',
        'useFileTransport' => $params['mailer.useFileTransport'],
    ],
    'translator' => [
        'translations' => [
            'AppBasic' => [
                'basePath'       => $params['app.basic.translator.basePath'],
                '__class'        => yii\i18n\PhpMessageSource::class,
                'sourceLanguage' => $params['app.basic.translator.sourceLanguage'],
            ],
        ],
    ],
    'theme' => [
        'pathMap' => [
            '@app/views/layouts' => $params['app.basic.theme.pathmap.layout'],
            '@app/views/site'    => $params['app.basic.theme.pathmap.site'],
        ],
    ],
];
