<?php

return [
    'app' => [
        'basePath'            => dirname(__DIR__).'/src',
        'controllerNamespace' => 'TerabyteSoft\App\Basic\Controllers',
        'id' => $params['app.basic.id'],
        'name' => $params['app.basic.name'],
    ],
    'cache' => [
        '__class' => Yiisoft\Cache\Cache::class,
        'handler' => [
            '__class'   => Yiisoft\Cache\FileCache::class,
            'keyPrefix' => 'AppBasic'
        ],
    ],
    'file-rotator' => [
        '__class' => Yiisoft\Log\FileRotator::class,
        '__construct()' => [
            10
        ]
    ],
    'logger' => [
        '__class' => Yiisoft\Log\Logger::class,
        '__construct()' => [
            'setTargets' => [
                ['__class' => Yiisoft\Log\FileTarget::class]
            ],
        ],
    ],
    'mailer' => [
        '__class'          => Yiisoft\Yii\SwiftMailer\Mailer::class,
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
